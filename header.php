<?
session_start();
?>
<header class="header lock-padding">
	<div class="container">
		<div class="header__row">
			<div class="header__logo">
				<img src="img/header/logo.png">
			</div>
			<nav class="header__menu">
					<ul class="menu__list">
						<li><a href="#yak1" class="menu__link">Маршруты</a></li>
						<li><a href="#yak2" class="menu__link">Проводники</a></li>
						<li><a href="#yak3" class="menu__link">Отзывы</a></li>
						<li><a href="#yak4" class="menu__link">Контакты</a></li>
					</ul>
			</nav>
			<div class="header__registration">
				<? if(isset($_SESSION['login'])) { ?>
					<div class="registration__auth">
						<div>Добро пожаловать, <? echo $_SESSION['login']?>!</div>
				 		<a href="logout.php" class="menu__link-auth">Выйти</a>
				 		<a href="personal.php" class="menu__link-auth">Личный кабинет</a>
					</div>
				 	
				<?} else { ?>
					<a href="signup.php" class="menu__link-right">Регистрация</a>
					<a href="login.php" class="menu__link-right">Авторизация</a>
				<? } ?>
			</div>
		</div>
	</div>
	<div class="header__text">
		<h2>2500 туров по более чем 100 направлениям и 36-летний <br>опыт путешествий на мотоциклах!</h2>
	</div>

</header>

