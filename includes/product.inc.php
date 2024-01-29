<?php 
if(isset($_POST["submit"]))
{
  // gets filtered table
  include("../classes/Database.class.php");
  include("../classes/Product.class.php");
  include("../classes/ProductCon.class.php");

  $cat_name = $_POST["cat_name"];

  $product = new ProductController();
  $result = $product->getCatTable($cat_name);
  header("location: ../admin-panel.php");
}
else
{
  // gets normal table
  include("classes/Database.class.php");
  include("classes/Product.class.php");
  include("classes/ProductCon.class.php");
    
  $product = new ProductController();
  $result = $product->getTable();
}
