<?

require_once "db.php";

$query = "SELECT * FROM products";
$req = mysqli_query($link, $query);
$data_from_db = [];

while ($result = mysqli_fetch_assoc($req)) {
	$data_from_db[] = $result;
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
		<main class="page__tours">
			<div class="main-screen__tours">
				<?if (isset($_SESSION['cart_list'])) {?>
							<div class="basket">
								<div class="basket__icon"><a href="cart.php"><i class="fas fa-shopping-basket"></i></a></div>
								<div class="basket__text">В корзине: <? echo count($_SESSION['cart_list'])?> шт.</div>
							</div>
						<?}?>
					<div class="container">
						<div class="tours__home-link"><a href="index.php"><i class="fas fa-home"></i>На главную</a></div>
						<div class="title-text">Наши маршруты</div>
						<div class="three-block__row">
							<? foreach($data_from_db as $tours_item): ?>
							<div class="three-block__column">
								<div class="three-block__item">
									<div class="three-block__image">
										<img src="<? echo $tours_item['img']?>" alt="">
									</div>
									<div class="three-block__text">
										<h3><? echo $tours_item['title']?></h3>
										<ul>
											<li><b>Маршрут:</b> <? echo $tours_item['trip']?></li>
											<li><b>Длительность:</b> <? echo $tours_item['duration']?></li>
											<li><b>Даты проведения:</b> <? echo $tours_item['dates']?></li>
											<li><b>Цена: </b><? echo $tours_item['price']?>$</li>
										</ul>
									</div>
									<div class="three-block__button"><a href="cart.php?tours_id=<? echo $tours_item['id']?>"  >Заказать</a></div>
								</div>
							</div>
							<? endforeach;?>
						</div>
					</div>
				</div>
			</main>
		</div>


<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="js/script.js"></script>


</body>
</html>






