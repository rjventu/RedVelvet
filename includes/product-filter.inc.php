<?php

if(isset($_POST["submit"]))
{
  include("../classes/Database.class.php");
  include("../classes/Product.class.php");
  include("../classes/ProductCon.class.php");

  $cat_name = $_POST["cat_name"];

  $product = new ProductController();
  $result = $product->getCatTable($cat_name);
  echo "<meta http-equiv='refresh' content='0'>";
}