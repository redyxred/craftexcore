<?php 
	define('ROOT', $_SERVER['DOCUMENT_ROOT']);

	require ROOT.'/core/core.php';
	require ROOT.'/core/classes/DB.class.php';
	require ROOT.'/core/classes/User.class.php';

	$login = trim($_POST['login']);
	$password = trim($_POST['password']);

	$login = htmlspecialchars($login);
	$password = md5(htmlspecialchars($password));

	if (!empty($login) && !empty($password)) {
		DB::init();

		$stmt = DB::prepare('SELECT * FROM users WHERE login = :login');
		$stmt->bindParam(":login", $login);
		$stmt->execute();

		$res = $stmt->fetch(PDO::FETCH_LAZY);
		if ($res == true && $res['password'] == $password) {
			User::setSession($res['uid']);
			exit(Core::getJsMessage(true, "Вы успешно вошли в аккаунт. Перенаправление..."));
		} else {
			exit(Core::getJsMessage(false, "Логин или пароль введены неверно"));
		}
	} else {
		exit(Core::getJsMessage(false, "Пожалуйста, заполните все поля"));
	}
?>