<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title><? echo $_CONF['title']; ?></title>
	<link rel="stylesheet" href="<? echo $dir; ?>/css/style.css?v=13">
</head>
<body>
	<div class="content-box">

		<div class="header">Личный кабинет</div>
	<div class="left-box">
			<img src="/skin2D.php?side=front&login=<? echo Profile::getProfile('login'); ?>" alt="">
		</div>
		<div class="right-box">
			<div class="text">Добро пожаловать в свой личный кабинет, <b><? echo Profile::getProfile('login'); ?></b>! Здесь Вы можете посмотреть свою статистику, разблокировать разные игровые возможности, а так же материально помочь проекту. </div>
			<ul class="list-info">
				<li>Дата регистрации: </li>
				<li class="text-info"><? echo Profile::getRegProfile(); ?></li></br>
				<li>Статус: </li>
				<li class="text-info"><a href="/buy" class="hover" data-title="Нажмите, чтобы купить статус"><? echo Profile::getProfileGroup('name'); ?></a></li></br>
				<li>Время в игре: </li>
				<li class="text-info">0 д. 0 ч. 0 м.</li></br>
				<li>Игровой баланс: </li>
				<li class="text-info"><a href="/account/pay" class="hover" data-title="Нажмите, чтобы пополнить баланс"><? echo User::getData('balance'); ?> руб.</a></li></br>
			</ul>
		</div>
	</div>

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="<? echo $dir; ?>/js/engine.js?v=6"></script>
</body>
</html>