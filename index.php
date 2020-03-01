
<?php
$host = 'localhost'; // адрес сервера 
$database = 'rahim'; // имя базы данных
$user = 'mysql'; // имя пользователя
$password = 'mysql'; // пароль
$mysql = new mysqli($host,  $user, $password, $database);


$sqlProd = "SELECT id, name, description, description_full, image, category_id, status  FROM product";
$sqlCat  = "SELECT * FROM category";

$resultCat = $mysql->query($sqlCat);
$result = $mysql->query($sqlProd);

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

<div class="container">

<h1>Полезные ссылки</h1>
<ul class='list-group'>
  <li class='list-group-item'>
    <a class="badge badge-primary"" href="add.php" role="button">Добавить продукт</a>
  </li>
  <li class='list-group-item'>
    <a class="badge badge-primary"" href="addcat.php" role="button">Добавить категорию</a>
  </li>
</ul>


<h1>Список категории</h1>

<ul class="list-group">
  <?php while($rowcat = $resultCat->fetch_assoc()): ?>
    <li class="list-group__item">
    <a href="/category.php?cat=<?php echo $rowcat['id']?>" class="badge badge-primary"><?php echo $rowcat['name']?></a></li>
  <?php endwhile; ?>
</ul>

<h1>Тут я буду выводить все продукты( аналог catalog.php)</h1>

<div class="product-items">



  
 
  <?php while($row = $result->fetch_assoc()): ?>
    <?php $status = (int)$row['status']; ?>
    <?php if($status == true): ?>
      <div class="product-item">
        <a href='product.php?prod=<?php echo $row['id']?>' class="prod-photo">
          <img src="<?php echo $row['image']?>" alt="">  
        </a>
        <div class="prod-content">
        <a href='product.php?prod=<?php echo $row['id']?>' class="prod-name"><?php echo $row['name']?></a>
        <div class="prod-description"><?php echo $row['description']?></div>
        <div class="prod-category"><?php echo $row['category_id']?></div>
        <a class="btn btn-primary" href="/edit.php?prod=<?php echo $row['id']?>" role="button">Редактировать</a>
        <a href='remove.php/?prod=<?php echo $row['id']?>' class="btn btn-danger">Удалить</a>
        </div>
      </div>
    <?php endif; ?>

  <?php endwhile; ?>

</div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>