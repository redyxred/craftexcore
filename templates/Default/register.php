<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title><? echo $_CONF['title']; ?></title>
	<link rel="stylesheet" href="<? echo $dir; ?>/css/style.css?v=5">
</head>
<body>
	<div id="content">
		<a href="/" class="logo"></a>
		<div class="alert">
			<div class="title">Регистрация игрового аккаунта</div>
			<div class="text">Для того, чтобы играть на наших серверах, Вы должны пройти процедуру регистрации аккаунта</div>
		</div>

		<form class="form-register" method="post">
			<input type="text" name="login" placeholder="Придумайте логин..."></br>
			<input type="password" name="password" placeholder="Придумайте пароль...">
			<input type="password" name="r_password" placeholder="Повторите пароль...">
			<button type="button" class="register">Создать аккаунт</button><br><br>
			<a href="/account/login" class="link">Уже зарегистрированы?</a>
		</form>
	</div>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="<? echo $dir; ?>/js/engine.js?v=1"></script>
</body>
</html>
