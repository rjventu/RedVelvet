<?php
include("../admin/classes/Database.class.php");
include("../admin/classes/Product.class.php");
include("../admin/classes/ProductCon.class.php"); 

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  //get values from form
  $prod_id = $_POST["prod_id"];

  if(isset($_POST["others"])){
    $others = $_POST["others"];
  }else{
    $others = "none";
  }

  //get record details from database
  $product = new ProductController();
  $result = $product->getRecord($prod_id);
  $row = $result->fetch(PDO::FETCH_ASSOC);
  $prod_name = $row["prod_name"];
  $prod_price = $row["prod_price"];
}