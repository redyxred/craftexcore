<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title><? echo $_CONF['title']; ?></title>
	<link rel="stylesheet" href="<? echo $dir; ?>/css/style.css?v=1">
</head>
<body>
	<div id="content">
		<a href="/" class="logo"></a>
		<div class="alert">
			<div class="title">Вход в личный кабинет</div>
			<div class="text">Авторизация позволит изменять Ваш профиль, а так же даёт доступ ко многим функциям</div>
		</div>

		<form class="form-login" method="post">
			<input type="text" name="login" placeholder="Ваш логин ..."><br>
			<input type="password" name="password" placeholder="Ваш пароль...">
			<button type="button" class="login">Войти в аккаунт</button><br><br>
			<a href="/account/register" class="link">Нужен аккаунт?</a> - <a href="/account/reset" class="link">Забыли пароль?</a>
		</form>

	</div>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="<? echo $dir; ?>/js/engine.js?v=4"></script>
</body>
</html>