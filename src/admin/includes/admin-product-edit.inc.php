<?php
session_start();

if(!isset($_SESSION["adminid"])){
  header("location: admin-login.php");
}
else
{
  $success_msg = $error_msg = "";

  include("classes/Database.class.php");
  include("classes/Product.class.php");
  include("classes/ProductCon.class.php"); 

  function deleteFile($prod_image_file_old){
      
    $fileDestination = '../../assets/uploads/'.$prod_image_file_old;
    $realFileDestination = realpath($fileDestination);

    if(is_writable($realFileDestination)){
      if(file_exists($realFileDestination)){
        unlink($realFileDestination);
      }
    }
  }

  function prepareFile($fileName, $fileTmpName, $fileSize, $fileError){
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allow = array('jpg', 'jpeg', 'png');
    if (in_array($fileActualExt, $allow)) {
      if($fileError === 0){
        if($fileSize < 50000000){

          $fileNameNew = uniqid('', true).".".$fileActualExt;
          $fileDestination = '../../assets/uploads/'.$fileNameNew;

          
          return array($fileName, $fileNameNew, $fileDestination, "");
        }else{
          return array("","","","Error: File size must be below 50mb.");
        }
      }else{
        return array("","","","Error: There was an error in uploading your file.");
      }
    }else{
      return array("","","","Error: Valid file types are jpg, jpeg, and png.");
    }

  }

  if($_SERVER['REQUEST_METHOD'] == 'GET')
  {

    if (!isset($_GET["id"])){
      header('location: admin-panel.php');
      exit();
    }

    $prod_id = $_GET["id"];
    $product = new ProductController();
    $result = $product->getRecord($prod_id);
    $row = $result->fetch(PDO::FETCH_ASSOC);

    $prod_name = $row["prod_name"];
    $prod_price = $row["prod_price"];
    $prod_description = $row["prod_description"];
    $prod_image_old = $row["prod_image"];
    $prod_image_file_old = $row["prod_image_file"];
    $bestseller = $row["bestseller"];
    $cat_name = $product->getCatName($row["cat_id"]);
  }
  else
  {
    $success_msg = $error_msg = "";

    // gets values from form
    $prod_id = $_POST["prod_id"];
    $prod_name = $_POST["prod_name"];
    $prod_price = $_POST["prod_price"];
    $prod_description = $_POST["prod_description"];
    $bestseller = $_POST["bestseller"];
    $cat_name = $_POST["cat_name"];
    
    // fetches old filename from the database
    $product = new ProductController();
    $result = $product->getRecord($prod_id);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $prod_image_file_old = $row["prod_image_file"];
    
    // gets values for file input
    $file = $_FILES["prod_image"];
    $fileName = $_FILES['prod_image']['name'];
    $fileTmpName = $_FILES['prod_image']['tmp_name'];
    $fileSize = $_FILES['prod_image']['size'];
    $fileError = $_FILES['prod_image']['error'];

    // runs if there is no uploaded file
    if($fileError === 4)
    {
      $product = new ProductController($prod_id, $prod_name, $prod_price, $prod_description, null, null, $bestseller, $cat_name);
      $error_msg = $product->editProductNoImg();

      if(empty($error_msg)){
        $success_msg = "Product edited successfully!";
      }
    }
    else // runs if there is an uploaded file
    {
      list($prod_image_new, $prod_image_file_new, $fileDestination, $error_msg) = prepareFile($fileName, $fileTmpName, $fileSize, $fileError);

      if(empty($error_msg)){
        $product = new ProductController($prod_id, $prod_name, $prod_price, $prod_description, $prod_image_new, $prod_image_file_new, $bestseller, $cat_name);
        $error_msg = $product->editProduct();
        
        if(empty($error_msg)){
          if($fileError === 0){
            move_uploaded_file($fileTmpName, $fileDestination);
            deleteFile($prod_image_file_old);
          }
          $success_msg = "Product edited successfully!";
        }
      }
    }
  }
}
