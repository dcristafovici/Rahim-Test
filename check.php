
<?php
define ('SITE_ROOT', 'C:\OSPanel\domains\rahim/');
$host = 'localhost'; // адрес сервера 
$database = 'rahim'; // имя базы данных
$user = 'mysql'; // имя пользователя
$password = 'mysql'; // пароль
$mysql = new mysqli($host,  $user, $password, $database);

$post = $_POST;

$name = $_POST['name'];
$text = $_POST['text'];
$fulltext = $_POST['fulltext'];
$image = $_POST['userfile'];
$category = $_POST['category'];
$status = $_POST['status'];
$stat;


$uploaddir = SITE_ROOT.'/uploads/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
  
}

if($status){
  $stat = true;
}
else{
  $stat = false;
}

$mysql->query("INSERT INTO `product` (`name`, `description`, `description_full`, `image`, `category_id`, `status`) VALUES ('$name', '$text', '$fulltext', '$uploadfile', '$category' ,'$stat') ");

?>