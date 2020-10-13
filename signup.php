<?

require "db.php";



//Если форма отправлена
if (isset($_POST['signup__submit'])) {
	
	//Создаем массив ошибок
	$errorArr = array();

	//Проверяем инпуты на пустоту и валидность
	if(empty($_POST['login'])) $errorArr[] = 'Введите логин!';
	if(empty($_POST['name'])) $errorArr[] = 'Введите имя!';
	if(empty($_POST['surname'])) $errorArr[] = 'Введите фамилию!';
	if(empty($_POST['tel'])) $errorArr[] = 'Введите телефон!';
	if(empty($_POST['country'])) $errorArr[] = 'Введите страну!';
	if(empty($_POST['city'])) $errorArr[] = 'Введите город!';
	if(empty($_POST['email'])) $errorArr[] = 'Введите Email!';
	if(empty($_POST['password'])) $errorArr[] = 'Введите пароль!';
	if ($_POST['password-confirm'] != $_POST['password']) $errorArr[] = 'Повторный пароль введен неверно!';

	if(empty($errorArr)) {
		//Пишем имя пользователя и почту из формы в переменные для удобства работы
		$login = $_POST['login'];
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$tel = $_POST['tel'];
		$country = $_POST['country'];
		$city = $_POST['city'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		// Пробуем получить юзера с таким логином
		$query = "SELECT * FROM users WHERE login='$login'";
		$sendQuery = mysqli_query($link, $query);
		$result = mysqli_fetch_assoc($sendQuery);

		if($result['login'] == $login) {
			echo '<div class="signup__errors">Пользователем с таким логином уже существует!</div>';
		} else {
			//Создаем и отправляем запрос в БД
			$query = "INSERT INTO users SET login='$login', name ='$name', surname ='$surname', tel ='$tel', country ='$country', city ='$city', email ='$email', password='$password'";
			$sendQuery = mysqli_query($link, $query) or die(mysqli_error($link));
			
			//Формируем запрос для сессии
			$query = "SELECT * FROM users WHERE login='$login' AND password='$password'";
			$sendQuery = mysqli_query($link, $query);
			$result = mysqli_fetch_assoc($sendQuery);

			$_SESSION['login'] = $result['login'];

			echo '<div class="signup__success">Вы успешно зарегистрированы!<br><div class="signup__final-text">В течение 3 сек. Вы будете перенаправлены на главную страницу!</div></div>';
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
		<main class="page__signup">
			<div class="container__signup">
				<div class="home-link"><a href="index.php"><i class="fas fa-home"></i>На главную</a></div>
				<h1 class="signup__title">Регистрация</h1>
				<div class="signup__row">
					<form action="signup.php" class="signup__form" method="POST">
						<label for="login" class="signup__login">Логин</label>
						<input type="text" name="login" id="login" class="signup__login-input" value="<?=$_POST['login'];?>">
						<label for="name" class="login__name">Имя</label>
						<input type="text" name="name" id="name" class="login__name-input" value="<?=$_POST['name'];?>">
						<label for="surname" class="login__surname">Фамилия</label>
						<input type="text" name="surname" id="surname" class="login__surname-input" value="<?=$_POST['surname'];?>">
						<label for="tel" class="login__tel">Контактный телефон</label>
						<input type="tel" name="tel" id="tel" class="login__tel-input" required placeholder="+7 (900) 123-45-67" pattern="\+7\s?[\(]{0,1}9[0-9]{2}[\)]{0,1}\s?\d{3}[-]{0,1}\d{2}[-]{0,1}\d{2}" value="<?=$_POST['tel'];?>">
						<label for="country" class="login__country">Страна проживания</label>
						<input type="text" name="country" id="country" class="login__country-input" value="<?=$_POST['country'];?>">
						<label for="city" class="login__city">Город</label>
						<input type="text" name="city" id="city" class="login__city-input" value="<?=$_POST['city'];?>">
						<label for="email" class="signup__email">Email</label>
						<input type="email" name="email" id="email" class="signup__email-input" value="<?=$_POST['email'];?>">
						<label for="password" class="signup__password">Пароль</label>
						<input type="password" name="password" id="pasword" class="signup__password-input" value="<?=$_POST['password'];?>">
						<label for="password-confirm" class="signup__password-confirm">Повторите пароль</label>
						<input type="password" name="password-confirm" id="password-confirm" class="signup__password-confirm-input" value="<?=$_POST['password-confirm'];?>">
						<input type="SUBMIT" name="signup__submit" class="signup__submit" value="Зарегистрироваться">
					</form>
				</div>
			</div>
		</main>
	</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="js/script.js"></script>


</body>
</html>