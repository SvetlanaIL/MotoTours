<?php

require "db.php";
require "functions.php";


if ( isset($_GET['delete_id']) && isset($_SESSION['cart_list']) ) {
	foreach ($_SESSION['cart_list'] as $key => $value) {
		if ( $value['id'] == $_GET['delete_id'] ) {
			unset($_SESSION['cart_list'][$key]);
		}		
	}
}


if ( isset($_GET['tours_id']) && !empty($_GET['tours_id']) ) {

	$current_added_tour = get_tour_by_id($_GET['tours_id']);

	// ...
	if ( !empty($current_added_tour) ) {

		if ( !isset($_SESSION['cart_list'])) {
			$_SESSION['cart_list'][] = $current_added_tour;
		}
		$tour_check = false;
		if ( isset($_SESSION['cart_list']) ) {
			foreach ($_SESSION['cart_list'] as $value) {
				if ( $value['id'] == $current_added_tour['id'] ) {
					$tour_check = true;
				}
			}
		}
		if ( !$tour_check ) {
			$_SESSION['cart_list'][] = $current_added_tour;
		}
	} else {
		header("Location: 404.php");
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
		<main class="page__cart">
			<div class="main-screen__cart">
				<div class="main-screen__bg ibg">
					<img src="img/signup/signup__background.png">
					<div class="container">
						<div class="home-link"><a href="index.php"><i class="fas fa-home"></i>На главную</a></div>
						<h1 class="cart__title">Корзина</h1>
						<div class="container__cart-inner">
							<div class="cart__row">
							<? if ( isset($_SESSION['cart_list']) && count($_SESSION['cart_list']) !=0 ) : ?>
							<ul class="cart__inner">
								<? foreach( $_SESSION['cart_list'] as $value ) : ?>
									<li>
										<i class="fas fa-motorcycle"></i>
										<? echo $value['title']; ?> | 
										<? echo $value['price']; ?> $ | 
										<a href="cart.php?delete_id=<? echo $value['id'];?>"><i class="fas fa-trash-alt"></i></a>
									</li>
							<? endforeach; ?>
							</ul>
							<? else : ?>
								<p>
									Ваша корзина пуста
								</p>
							<?php endif; ?>
						</div>
						</div>
						<div class="cart__buttons">
							<div class="cart__buttons-continue"><a href="tours.php">Продолжить покупки</a><br></div>
							<div class="cart__buttons-checkout"><a href="order.php">Оформить заказ</a></div>
						</div>
						
					</div>
				</div>
			</div>
		</main>
	</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="js/script.js"></script>


</body>
</html>

