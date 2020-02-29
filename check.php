
<?php
$host = 'localhost'; // адрес сервера 
$database = 'rahim'; // имя базы данных
$user = 'mysql'; // имя пользователя
$password = 'mysql'; // пароль
$mysql = new mysqli($host,  $user, $password, $database);

$post = $_GET;

$name = $_GET['name'];
$text = $_GET['text'];
$fulltext = $_GET['fulltext'];
$image = $_GET['image'];
$category = $_GET['category'];


$mysql->query("INSERT INTO `product` (`name`, `description`, `description_full`, `image`, `category_id`) VALUES ('$name', '$text', '$fulltext', '$image', '$category') ");

?>