<?php

if(isset($_POST["submit"])){

  $prod_image = $_POST['$prod_image'];
  echo''.$prod_image.'';
}
?>

<html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="test.php" method="POST">
    <label for="prod_image">Upload image</label>
    <input type="file" name="file">
    <button type="submit" name="submit">Upload</button>
  </form>
</body>
</html>
</html>

