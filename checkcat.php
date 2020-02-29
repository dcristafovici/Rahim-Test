
<?php
$host = 'localhost'; // адрес сервера 
$database = 'rahim'; // имя базы данных
$user = 'mysql'; // имя пользователя
$password = 'mysql'; // пароль
$mysql = new mysqli($host,  $user, $password, $database);

$post = $_GET;

$name = $_GET['name'];


$mysql->query("INSERT INTO `category` (`name`) VALUES ('$name') ");

?>