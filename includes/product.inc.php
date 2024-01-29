<?php 

include("../classes/Database.class.php");
include("../classes/Product.class.php");
include("../classes/ProductCon.class.php");

$product = new ProductController();
$result = $product->getTable();


