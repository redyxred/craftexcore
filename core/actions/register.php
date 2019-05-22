<?php
  define('ROOT', $_SERVER['DOCUMENT_ROOT']);

  require ROOT.'/core/core.php';
  require ROOT.'/core/classes/DB.class.php';
  require ROOT.'/core/classes/User.class.php';

  $login = trim($_POST['login']);
  $password = trim($_POST['password']);
  $r_password = trim($_POST['r_password']);

  $login = htmlspecialchars($login);
  $password = md5(htmlspecialchars($password));
  $r_password = md5(htmlspecialchars($r_password));

  if (!empty($login) && !empty($password) && !empty($r_password)) {
    if ($password == $r_password) {
      DB::init();

      $stmt = DB::prepare('SELECT * FROM users WHERE login = :login');
      $stmt->bindParam(":login", $login);
      $stmt->execute();
      $res_login = $stmt->fetch(PDO::FETCH_LAZY);
      if ($res_login['login'] != $login) {
        $now = time();
        $reg_date = date("Y-m-d H:i:s", $now);

        $addUser = DB::prepare('INSERT INTO users SET login = :login, password = :password, reg_date = :reg_date');
        $addUser->bindParam(":login", $login);
        $addUser->bindParam(":password", $password);
        $addUser->bindParam(":reg_date", $reg_date);
        $addUser->execute();

        if ($addUser) {
          $addRefer = DB::prepare('INSERT INTO refers SET code = :code, uid = :uid');
          $addRefer->bindParam(":code", md5("redyx"));
          $addRefer->bindParam(":uid", 1);
          $addRefer->execute();

          if ($addRefer) {
            User::setSession($res_login['uid']);
            exit(Core::getJsMessage(true, "Вы успешно зарегистрировались. <a href='/login'>Войти в аккаунт</a>"));
          }
        } else {
          exit(Core::getJsMessage(false, "Произошла ошибка. Повторите попытку позже..."));
        }
      } else {
        exit(Core::getJsMessage(false, "Такой логин придумали до Вас. Проявите фантазию :)"));
      }
    } else {
      exit(Core::getJsMessage(false, "Введённые Вами пароли не совпадают"));
    }
  } else {
    exit(Core::getJsMessage(false, "Пожалуйста, заполните все поля"));
  }
?>
