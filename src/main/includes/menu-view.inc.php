<?php

include("../admin/classes/Database.class.php");
include("../admin/classes/Product.class.php");
include("../admin/classes/ProductCon.class.php"); 

if($_SERVER['REQUEST_METHOD'] == 'GET')
{
  if (!isset($_GET["id"])){
    header('location: index.php');
    exit();
  }
  
  //get record details from database
  $prod_id = $_GET["id"];
  $product = new ProductController();
  $result = $product->getRecord($prod_id);
  $row = $result->fetch(PDO::FETCH_ASSOC);

  $prod_name = $row["prod_name"];
  $prod_price = $row["prod_price"];
  $prod_description = $row["prod_description"];
  $prod_image_file = $row["prod_image_file"];
  $bestseller = $row["bestseller"];
  $cat_name = $product->getCatName($row["cat_id"]);
  $others = null;
}
