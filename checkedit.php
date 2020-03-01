
<?php
$host = 'localhost'; // адрес сервера 
$database = 'rahim'; // имя базы данных
$user = 'mysql'; // имя пользователя
$password = 'mysql'; // пароль
$mysql = new mysqli($host,  $user, $password, $database);


$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parse = parse_url($url);

$post = $_POST;

$name = $_POST['name'];
$text = $_POST['text'];
$fulltext = $_POST['fulltext'];
$image = $_POST['userfile'];
$category = $_POST['category'];
$status = $_POST['status'];
$stat;

$prodID = $_GET['prod'];
$prodID = (int)$prodID;


$uploaddir =  $_SERVER['DOCUMENT_ROOT'].'/uploads/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
  
}

if($status){
  $stat = true;
}
else{
  $stat = false;
}


$mysql->query("UPDATE product SET name='$name', description='$text', description_full='$fulltext', status='$stat' WHERE id=$prodID ");
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel='stylesheet' href='css/main.css'>
</head>
<body>
<style>
  .product-remove{
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  } 
  .product-remove h1{
    margin-bottom: 30px
  }
  .container{
    text-align: center
  }
  </style>

<div class="container">
  <h1>Продукт обновлен</h1>
  <a class="btn btn-primary" href="http://<?php echo $parse['host']?>" role="button">НА главную</a>

</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>