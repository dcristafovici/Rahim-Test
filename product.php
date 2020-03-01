
<?php
$host = 'localhost'; // адрес сервера 
$database = 'rahim'; // имя базы данных
$user = 'mysql'; // имя пользователя
$password = 'mysql'; // пароль
$mysql = new mysqli($host,  $user, $password, $database);

$prodID = $_GET['prod'];
$prodID = (int)$prodID;

$sqlProd = "SELECT * FROM product WHERE id = $prodID LIMIT 1";
$sqlCat  = "SELECT * FROM category";

$resultCat = $mysql->query($sqlCat);
$result = $mysql->query($sqlProd);

?>
<style>

.device-item{
  width: 800px;
  border: 1px solid gray;
  padding: 20px;
}
.device-item img{
  max-width: 100%;
}
.device-item__name{
  font-size: 20px;
  font-weight: bold;
  margin-bottom: 25px
}
.device-item__text{
  font-size: 18px;
  margin-bottom: 20px;
}

</style>

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


<div class="container">
<?php while($row = $result->fetch_assoc()): ?>

<div class="device-item">

  <div class="device-item__photo">
    <img src="<?php echo $row['image']?>" alt="">
  </div>
  <div class="device-item__name"><?php echo $row['name']?></div>
  <div class="device-item__text"><?php echo $row['description']?></div>
  <div class="device-item__fulltext"><?php echo $row['description_full']?></div>
  <div class="device-item__catg"><?php echo $row['category_id']?></div>
</div>

<?endwhile; ?>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>