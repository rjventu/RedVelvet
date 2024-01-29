<?php 

if(isset($_POST["submit"]))
{
  $prod_name = $_POST["prod_name"];
  $prod_price = $_POST["prod_price"];
  $prod_description = $_POST["prod_description"];
  $prod_image = $_POST["prod_image"];
  $cat_name = $_POST["cat_name"];

  include("../classes/Database.class.php");
  include("../classes/Product.class.php");
  include("../classes/ProductCon.class.php");

  $product = new ProductController($prod_name, $prod_price, $prod_description, $prod_image, $cat_name);
  $product->addProduct();

}

