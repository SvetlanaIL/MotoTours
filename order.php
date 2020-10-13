<?
session_start();

if ( isset($_SESSION['cart_list'])) {
	foreach ($_SESSION['cart_list'] as $value) {
	$arr[] = $value['price'];
	$res = array_sum($arr);
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<meta charset="utf-8">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

	<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto:wght@400;500;700&display=swap&family=Caveat:wght@700&display=swap" rel="stylesheet">

</head>
<body>
	<div class="wrapper">
		<main class="page__order">
			<div class="container">
				<div class="tours__home-link"><a href="index.php"><i class="fas fa-home"></i>На главную</a></div>
				<h1 class="order__title">Оформление заказа</h1>
				<form action="mail.php" class="order__form" method="POST">
					<div class="order-left-section">
						<div class="left-section__inner">
							<h3>Контактная информация</h3>
							<p>
								<p>Имя</p>
								<input type="text" name="name" class="left-section__input" required autofocus>
							</p>
							<p>
								<p>Фамилия</p>
								<input type="text" name="surname" class="left-section__input" required>
							</p>
							<p>
								<p>Контактный телефон</p>
								<input type="tel" name="tel" class="left-section__input" required placeholder="+7 (900) 123-45-67" pattern="\+7\s?[\(]{0,1}9[0-9]{2}[\)]{0,1}\s?\d{3}[-]{0,1}\d{2}[-]{0,1}\d{2}">
							</p>
							<p>
							<p>Email</p>
								<input type="email" name="email" class="left-section__input" required>
							</p>

							<input type="SUBMIT" name="order__submit" class="left-section__submit" value="Оформить заказ">
						</div>
					</div>
					<div class="order-right-section">
						<div class="right-section__inner">
							<h3>Состав заказа:</h3>
							<? if ( isset($_SESSION['cart_list']) ) : ?>
								<ul>
								<? foreach( $_SESSION['cart_list'] as $value ) : ?>
									<li><? echo $value['title']; ?></li>
									<div class="right-section__price">Цена: <? echo $value['price'];?> $</div>
								<br>
								<? endforeach; ?>
								</ul>
								<div class="right-section__total"><b>Итого:</b> <? echo $res;?> $</div>
							<div class="right-section__button">
								<a href="cart.php"><i class="fas fa-pencil-alt"></i>Редактировать заказ</a>
							</div>
							<? endif; ?>
						</div>
					</div>
				</form>
			</div>
		</main>
	</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="js/script.js"></script>


</body>
</html>
