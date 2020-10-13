<?

$to = "lustra4ka@gmail.com";
$tema = "Новый заказ";
$message = "Имя: ".$_POST['name']."<br>";
$message = "Фамилия: ".$_POST['surname']."<br>";
$message .= "Контактный телефон: ".$_POST['tel']."<br>";
$message .= "Email: ".$_POST['email']."<br>";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
mail($to, $tema, $message, $headers);

header('Location: order-success.php');

?>