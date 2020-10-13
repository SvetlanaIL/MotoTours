<?

require "db.php";

if(isset($_SESSION['login'])) {
	$login = $_SESSION['login'];

	// echo $_SESSION['login'];
	$query = "SELECT * FROM users WHERE login='$login'";
	$sendQuery = mysqli_query($link, $query);
	$result = mysqli_fetch_assoc($sendQuery);

	// echo $result['login'].'<br>';
	// echo $result['name'].'<br>';
	// echo $result['surname'].'<br>';
	// echo $result['tel'].'<br>';
	// echo $result['country'].'<br>';
	// echo $result['city'].'<br>';
	// echo $result['email'].'<br>';
	// echo $result['password'];
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
		<main class="page__login">
			<div class="main-screen__login">
				<div class="main-screen__bg ibg">
					<img src="img/signup/signup__background.png">
					<div class="container">
						<div class="home-link"><a href="index.php"><i class="fas fa-home"></i>На главную</a></div>
						<div class="personal__title">Личный кабинет</div>
						<div class="personal__row">
							<h2 class="personal__title-info">Информация</h2>
							<div class="personal__inner">
								<div class="personal__login"><strong>Ваш логин: </strong><?echo $result['login']?></div>
								<div class="personal__name"><strong>Ваше имя: </strong><?echo $result['name']?></div>
								<div class="personal__surname"><strong>Ваша фамилия: </strong><?echo $result['surname']?></div>
								<div class="personal__tel"><strong>Контактный телефон: </strong><?echo $result['tel']?></div>
								<div class="personal__country"><strong>Страна: </strong><?echo $result['country']?></div>
								<div class="personal__city"><strong>Город: </strong><?echo $result['city']?></div>
								<div class="personal__email"><strong>Ваш email: </strong><?echo $result['email']?></div>
								<div class="personal__password"><strong>Пароль: </strong><?echo $result['password']?></div>
							</div>
							
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