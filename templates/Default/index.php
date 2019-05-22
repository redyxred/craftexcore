<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><? echo $_CONF['title']; ?></title>
    <link rel="stylesheet" href="<? echo $dir; ?>/css/pages.css?v=1">
  </head>
  <body>
	<div class="container">

		<div class="logotype"><img src="/templates/Default/images/logotype.png">CRAFTEX</div>

		<div class="nav-header">
			<ul class="nav-menu">
				<li><a href="">Главная</a></li>
				<li><a href="/forum">Форум</a></li>
				<li><a href="/servers">Сервера</a></li>
				<li><a href="/account">Аккаунт</a></li>
			</ul>
		</div>

		<div class="start-game">
			<div class="title">Приветствую, странник!</div>
			<div class="text">Путишествуешь в поисках проект и до сих пор не смог найти идеального? Не печалься, идеального не существует, зато существует наш - отличный проект Craftex.su.<br> Скорее жми на кнопку <b>"Начать играть"</b>, бери кирку и начни творить!</div>
			<a href="/start" class="start-game-button">Начать играть</a>
		</div>
	
		<div class="content-box">
			<div class="news-box">
				<img src="/templates/Default/images/background.jpg" alt="">
				<div class="title-news">
					Открытие сервера Industrial 1.7.10
					<span class="date-news">сегодня в 15:00</span>
				</div>
			</div>
			<div class="news-box">
				<img src="/templates/Default/images/background_3.jpg" alt="">
				<div class="title-news">
					Онлайн-магазин блоков открылся
					<span class="date-news">вчера в 11:23</span>
				</div>
			</div>
		</div>
		
		<div class="footer">
			2018 &copy; craftex.su Все права защищены.
		</div>

	</div>
  </body>
</html>
