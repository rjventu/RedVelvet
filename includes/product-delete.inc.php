<?php

include("../classes/Database.class.php");
include("../classes/Product.class.php");
include("../classes/ProductCon.class.php");

if (isset($_GET['id'])) {
  $prod_id = $_GET['id'];

  $product = new ProductController($prod_id);
  $error_msg = $product->removeRecord();
  
  if (empty($error_msg)) {
    echo '<script>alert("Deleted Successfully!")</script>';
    header("location: ../admin-panel.php");
  }else{
    echo '<script>alert('.$error_msg.')</script>';
    header("location: ../admin-panel.php");
  }
}