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

  if(isset($_POST["submit"]))
  {
    $success_msg = $error_msg = "";

    //gets values from form
    $prod_name = $_POST["prod_name"];
    $prod_price = $_POST["prod_price"];
    $prod_description = $_POST["prod_description"];
    $bestseller = $_POST["bestseller"];
    $cat_name = $_POST["cat_name"];

    // gets values for file input
    $file = $_FILES['prod_image'];
    $fileName = $_FILES['prod_image']['name'];
    $fileTmpName = $_FILES['prod_image']['tmp_name'];
    $fileSize = $_FILES['prod_image']['size'];
    $fileError = $_FILES['prod_image']['error'];

    list($prod_image, $prod_image_file, $fileDestination, $error_msg) = prepareFile($fileName, $fileTmpName, $fileSize, $fileError);

    if(empty($error_msg)){
      $product = new ProductController(null, $prod_name, $prod_price, $prod_description, $prod_image, $prod_image_file, $bestseller, $cat_name);
      $error_msg = $product->addProduct();
  
      if(empty($error_msg)){
        move_uploaded_file($fileTmpName, $fileDestination);
        $success_msg = "Product added successfully!";
      }
    }

  }
}