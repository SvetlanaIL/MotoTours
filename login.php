<?

require "db.php";


//Если форма отправлена
if (isset($_POST['login__submit'])) {
	
	//Создаем массив ошибок
	$errorArr = array();

	//Проверяем инпуты на пустоту
	if(empty($_POST['login'])) $errorArr[] = 'Введите логин!';
	if(empty($_POST['password'])) $errorArr[] = 'Введите пароль!';

	if(empty($errorArr)) {
		//Пишем имя пользователя и почту из формы в переменные для удобства работы
		$login = $_POST['login'];
		$password = $_POST['password'];

		//Формируем запрос
		$query = "SELECT * FROM users WHERE login='$login' AND password='$password'";
		$sendQuery = mysqli_query($link, $query);
		$result = mysqli_fetch_assoc($sendQuery);

		if(($result['login'] != $login) && ($result['password'] != $password)) {
			echo '<div class="signup__errors">Вы ввели неверные имя пользователя или пароль!</div>';
		} else {
			$_SESSION['login'] = $result['login'];
			echo '<div class="signup__success">Вы успешно авторизованы!<br><div class="signup__final-text">В течение 3 сек. Вы будете перенаправлены на главную страницу!</div></div>';
			header('refresh: 3; url=index.php');
		}
	} else {
		echo '<div class="signup__errors">'.array_shift($errorArr).'</div>';
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
		<main class="page__login">
			<div class="main-screen__login">
				<div class="main-screen__bg ibg">
					<img src="img/signup/signup__background.png">
					<div class="container__login">
						<div class="home-link"><a href="index.php"><i class="fas fa-home"></i>На главную</a></div>
						<div class="login__row">
							<form action="login.php" class="login__form" method="POST">
								<label for="login" class="login__login">Логин</label>
								<input type="text" name="login" id="login" class="login__login-input" value="<?=$_POST['login'];?>">
								<label for="password" class="login__password">Пароль<br></label>
								<input type="password" name="password" id="pasword" class="login__password-input" value="<?=$_POST['password'];?>">
								<input type="SUBMIT" name="login__submit" class="login__submit" value="Вход">
							</form>
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