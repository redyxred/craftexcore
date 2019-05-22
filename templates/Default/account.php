<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title><? echo $_CONF['title']; ?></title>
	<link rel="stylesheet" href="<? echo $dir; ?>/css/style.css?v=16">
</head>
<body>
	<div class="content-box">

		<div class="header">Личный кабинет</div>

		<div class="sub-header">
			<ul class="sub-menu">
<? if (User::getData("group") == 5) { ?>
				<li><a href="/admin">Админ-панель</a></li>
<? } ?>
				<li><a href="/account">Профиль</a></li>
				<li><a href="/account/shop">Магазин</a></li>
				<li><a href="/account/refer">Приглашения</a></li>
				<li><a href="/account/jobs">Работы</a></li>
				<li><a href="/account/settings">Настройки</a></li>
				<li><a href="/account/pay">Пополнить</a></li>
				<li><a href="/account/logout">Выйти </a></li>
			</ul>
		</div>
<? if ($_GET['section'] == "profile") { ?>
		<div class="left-box">
			<img src="/skin2D.php?side=front&login=<? echo User::getData('login'); ?>" alt="">
		</div>
		<div class="right-box">
			<div class="text">Добро пожаловать в свой личный кабинет, <b><? echo User::getData('login'); ?></b>! Здесь Вы можете посмотреть свою статистику, разблокировать разные игровые возможности, а так же материально помочь проекту. </div>
			<ul class="list-info">
				<li>Дата регистрации: </li>
				<li class="text-info"><? echo User::getRegDate(); ?></li></br>
				<li>Статус: </li>
				<li class="text-info"><a href="/buy" class="hover" data-title="Нажмите, чтобы купить статус"><? echo User::getGroup('name'); ?></a></li></br>
				<li>Время в игре: </li>
				<li class="text-info">0 д. 0 ч. 0 м.</li></br>
				<li>Игровой баланс: </li>
				<li class="text-info"><a href="/account/pay" class="hover" data-title="Нажмите, чтобы пополнить баланс"><? echo User::getData('balance'); ?> руб.</a></li></br>
			</ul>
			<hr>
			<div class="text">Так же вы можете перейти в <a href="/account/shop">онлайн-магазин</a> блоков (в разработке), <a href="/account/refer">пригласить</a> друга или устроиться на <a href="/account/jobs">работу.</a></div>
		</div>
<? } else if ($_GET['section'] == "shop") { ?>
		<!-- SHOP -->
		<div class="section-box">
			<div class="header">Магазин предметов<input type="search" class="search-block" placeholder="Поиск по названию"></div>
			<div class="header-text">Ваш баланс <span class="balance"><? echo User::getData('balance'); ?></span> руб.</div>
			
			<div class="information-block">
				<div class="title">Информация</div>
				<div class="text">Для того, чтобы получить на сервере купленные предметы введите команду - <b>/cart all</b></div>
			</div>

			<div class="section-row" onload="getBlocks();" id="section">
				<div id="preloader">
					<i></i>
				</div>
			</div>
			<div class="footer">
				<button class="bascket">Корзина</button>
				<button class="history">История</button>
			</div>
		</div>
<? } else if ($_GET['section'] == "refer") { ?>
		<!-- REFER -->
		<div class="section-box">
			<h2>Данный раздел находится в разработке...</h2>
		</div>
<? } else if ($_GET['section'] == "jobs") { ?>
		<!-- JOBS -->
		<div class="section-box">
			<h2>Данный раздел находится в разработке...</h2>
		</div>
<? } else if ($_GET['section'] == "settings") { ?>
		<!-- SETTINGS -->
		<div class="section-box">
			<div class="header">Настройки профиля <img class="profile-avatar" src="/skin2D.php?show=head&login=<? echo User::getData("login"); ?>" alt=""></div>
			<div class="header-text">Здесь вы можете поменять пароль, электронную почту и др.</div>
			<form class="form-edit-profile" method="post">
				<label for="edit-email">Адрес электронной почты<br>
					<input id="edit-email" type="text" name="email" placeholder="<? echo User::getData("email"); ?>">
				</label>
				<label for="edit-password">Новый пароль<br>
					<input id="edit-password" type="password" name="password" placeholder="Придумайте пароль">
				</label><br><br>
				<label for="edit-skype">Логин в <a target="_blank" href="http://skype.com/">Skype</a><br>
					<input id="edit-skype" type="text" name="skype" placeholder="<? echo User::getData("skype"); ?>">
				</label>
				<label for="edit-discord">Имя пользователя в <a target="_blank" href="http://discord.com/">Discord</a><br>
					<input id="edit-discord" type="text" name="discord" placeholder="@<? echo User::getData("discord"); ?>">
				</label>
				<a href="/account/delete" class="a-delete">Временно заморозить аккаунт</a>
				<button type="button" class="save-profile-edit">Сохранить</button>
			</form>
		</div>
<? } else if ($_GET['section'] == "pay") { ?>
		<!-- PAY -->
		<div class="section-box">
			<h2>Данный раздел находится в разработке...</h2>
		</div>
<? } ?>

	</div>

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="<? echo $dir; ?>/js/engine.js?v=7"></script>
</body>
</html>