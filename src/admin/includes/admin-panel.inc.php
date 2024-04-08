<?php
session_start();

if(!isset($_SESSION["adminid"])){

  header("location: admin-login.php");

}
else
{

  include("classes/Database.class.php");
  include("classes/Product.class.php");
  include("classes/ProductCon.class.php");

  $cat_name = "";

  function deleteFile($prod_image_file_old){
      
    $fileDestination = '../../assets/uploads/'.$prod_image_file_old;
    $realFileDestination = realpath($fileDestination);

    if(is_writable($realFileDestination)){
      if(file_exists($realFileDestination)){
        unlink($realFileDestination);
      }
    }
  }

  if (isset($_GET['id'])) {
    $prod_id = $_GET['id'];

    $product = new ProductController($prod_id);
    $result = $product->getRecord($prod_id);

    $row = $result->fetch(PDO::FETCH_ASSOC);
    $prod_image_file_old = $row["prod_image_file"];

    deleteFile($prod_image_file_old);

    $error_msg = $product->removeRecord();
    
    if (empty($error_msg)) {
      echo '<script>alert("Deleted Successfully!")</script>';
    }else{
      echo '<script>alert('.$error_msg.')</script>';
    }
  }

  $product = new ProductController();
  if(isset($_POST["submit"]))
  {
    // gets filtered table
    $cat_name = $_POST["cat_name"];
    
    if(empty($cat_name)){
      $result = $product->getTable();
    }else{
      $result = $product->getCatTable($cat_name);
    }
  }
  else{
    // gets normal table
    $result = $product->getTable();
  }
}
