<?php

$success_msg = $error_msg = "";

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
  }
  else
  {
    $success_msg = $error_msg = "";

    // gets values from form
    
  }

?>

<!doctype html>
<html lang="en">

<!-- Head -->
<?php include("head-tags.php")?>
  <title>Red Velvet KH - Signature Cakes</title>
</head>
  
<body>

<!-- Header -->
<?php include("header.php")?>

<!-- Product Description -->
<section>
  <div class="container product-description-container">
    <div class="row m-5">
      <div class="col-md-6 m-0 pl-5 pt-5 pb-5 pr-0">
        <img src="../../assets/uploads/<?=$prod_image_file?>" alt="Product Image" width="100%" height="500px" style="object-fit: cover">
      </div>
      <div class="col flex-column d-flex p-5 justify-content-between">
        <div class="row">
          <div class="col">
            
            <!-- details -->
            <h2><?=$prod_name?></h2>
            <h3><?=$bestseller == 'Y' ? 'Bestseller!' : '';?></h3>
            <br/>
            <p><?=$prod_description?></p>
            <br/>

            <!-- add to cart form -->
            <form action="cart-add.php" method="post" enctype="multipart/form-data">
              
              <?php
                if ($cat_name == "Cupcakes"){
                  ?>
                  <div class="form-group mb-4">
                    <div class="form-label mb-0">Choose a cake base</div>
                    <select class="custom-select" name="others" id="others" required>
                      <?php 
                      if ($prod_name == "Cupcakes w/ Yema Custard Frosting"){
                        ?>
                        <option value="Yema">Yema</option>
                        <?php
                      }else{
                        ?>
                        <option value="Vanilla">Vanilla</option>
                        <option value="Chocolate">Chocolate</option>
                        <option value="Red Velvet">Red Velvet</option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="row">
                    <div class="col d-inline-flex align-items-center">
                      <h3 style="font-style: normal; font-weight: var(--fweight-heading);">
                      $<?=$prod_price?></h3>
                    </div>
                    <div class="col d-inline-flex justify-content-end">
                      <input type="submit" name="submit" value="+ CART" class="btn px-3 py-1" style="width:auto">
                    </div>
                  </div>
                  <?php
                }elseif ($cat_name == "Cheesecakes"){
                  ?>
                  <div class="form-group mb-4">
                    <div class="form-label mb-0">Choose size</div>
                    <select class="custom-select" name="others" id="others" required>
                      <option value="15">6 inches ($15.00)</option>
                      <option value="8">8 inches ($25.00)</option>
                    </select>
                  </div>
                  <div class="row">
                    <div class="col d-flex align-items-center">
                      <h3 style="font-style: normal; font-weight: var(--fweight-heading);">
                      $<?=(int)$prod_price?> / $25</h3>
                    </div>
                    <div class="col d-flex justify-content-end">
                      <input type="submit" name="submit" value="+ CART" class="btn px-3 py-1" style="width:auto">
                    </div>
                  </div>
                  <?php
                }else{
                  ?>
                  <div class="row">
                    <div class="col d-flex align-items-center">
                      <h3 style="font-style: normal; font-weight: var(--fweight-heading);">
                      $<?=$prod_price?></h3>
                    </div>
                    <div class="col d-flex justify-content-end">
                      <input type="submit" name="submit" value="+ CART" class="btn px-3 py-1" style="width:auto">
                    </div>
                  </div>
                  <?php
                }
              ?>
            </form>
          
          </div>
        </div>
        <div class="row">
          <div class="col d-flex justify-content-end rc-links">
            <a href="javascript:history.go(-1)">Go back</a>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

</body>

<!-- Footer -->
<?php include('footer.php') ?>

<!-- Inquiry Button -->
<?php include('inquiry.php') ?>


</html>

