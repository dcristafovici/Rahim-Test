
<?php
$host = 'localhost'; // адрес сервера 
$database = 'rahim'; // имя базы данных
$user = 'mysql'; // имя пользователя
$password = 'mysql'; // пароль
$mysql = new mysqli($host,  $user, $password, $database);

$catID = $_GET['cat'];
$catID = (int)$catID;

$sqlCat = "SELECT * FROM category WHERE id = $catID";
$sqlEdit = "SELECT * FROM product WHERE category_id = $catID";
$result = $mysql->query($sqlEdit);
$resultCat = $mysql->query($sqlCat);
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
  <h1><?php while($rowcat = $resultCat->fetch_assoc()): ?><?php echo $rowcat['name']?><?php endwhile; ?></h1>


  <div class="product-items">
 
    <?php while($row = $result->fetch_assoc()): ?>

      <div class="product-item">
        <div class="prod-photo">
          <img src="<?php echo $row['image']?>" alt="">  
        </div>
        <div class="prod-content">
        <div class="prod-name"><?php echo $row['name']?></div>
        <div class="prod-description"><?php echo $row['description']?></div>
        <div class="prod-category"><?php echo $row['category_id']?></div>
        <a class="btn btn-primary" href="/edit.php?prod=<?php echo $row['id']?>" role="button">Редактировать</a>
        </div>
      </div>

    <?php endwhile; ?>

  </div>

</div>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>