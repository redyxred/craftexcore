<?php
	define('ROOT', $_SERVER['DOCUMENT_ROOT']);

	require ROOT.'/core/core.php';
	require ROOT.'/core/classes/DB.class.php';
	require ROOT.'/core/classes/User.class.php';

	$email = trim($_POST['email']);
	$password = trim($_POST['password']);
	$skype = trim($_POST['skype']);
	$discord = trim($_POST['discord']);

	$email = htmlspecialchars($email);
	$password = htmlspecialchars($password);
	$skype = htmlspecialchars($skype);
	$discord = htmlspecialchars($discord);

	if (!empty($email) || !empty($password) || !empty($skype) || !empty($discord)) {
		DB::init();

		$email = empty($email) ? User::getData('email') : $email;
		$password = empty($password) ? User::getData('password') : md5($password);
		$skype = empty($skype) ? User::getData('skype') : $skype;
		$discord = empty($discord) ? User::getData('discord') : $discord;


		$stmt = DB::prepare('UPDATE users SET email = :email, password = :password, skype = :skype, discord = :discord WHERE uid = :uid');
		$stmt->bindParam(":email", $email);
		$stmt->bindParam(":password", $password);
		$stmt->bindParam(":skype", $skype);
		$stmt->bindParam(":discord", $discord);
		$stmt->bindParam(":uid", $_SESSION['uid']);

		$stmt->execute();

		if ($stmt) {
			exit(Core::getJsMessage(true, "Информация об аккаунте была изменена"));
		}
	} else {
		exit(Core::getJsMessage(false, "Пожалуйста, заполните все поля"));
	}
?>
