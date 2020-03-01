
<?php
$host = 'localhost'; // адрес сервера 
$database = 'rahim'; // имя базы данных
$user = 'mysql'; // имя пользователя
$password = 'mysql'; // пароль
$mysql = new mysqli($host,  $user, $password, $database);

$prodID = $_GET['prod'];
$prodID = (int)$prodID;


$sqlEdit = "SELECT * FROM product WHERE id = $prodID LIMIT 1";
$result = $mysql->query($sqlEdit);


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
<?php while($row = $result->fetch_assoc()): ?>
  <h1>Редактировать <?php echo $row['name']?></h1>

    <form  action='check.php' class="form">

      <div class="form-group">
        <input type="text" required name='name' value='<?php echo $row['name']?>' placeholder='Имя'>
      </div>
      <div class="form-group">
        <input type="text" name='text' value='<?php echo $row['description']?>'  required placeholder='Описание'>
      </div>
      <div class="form-group">
        <textarea name='fulltext' value='<?php echo $row['description_full']?>'  placeholder='Полное описание'></textarea>
      </div>
      <div class="form-group">
        <label for="">Изображения</label>
        <input type="file" name='image'>
      </div>

      <div class="form-group">

        <select name='category'>
        <?php while($row = $result->fetch_assoc()): ?>
            <option value=<?php echo $row['id']?>><?php echo $row['name']?></option>
          <?php endwhile; ?>
        
        </select>

      </div>

      <div class="form-group">
        <button>
          <span>Редактировать</span>
        </button>
      </div>

    </form>
  <?php endwhile; ?>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>