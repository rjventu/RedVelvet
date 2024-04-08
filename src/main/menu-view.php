<?php include("includes/menu-view.inc.php")?>

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
    <div class="row m-5 d-flex">
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
            <form action="order-add.php" method="post" enctype="multipart/form-data">
              
              <?php
                if ($cat_name == "Cupcakes"){
                  ?>
                  <div class="form-group mb-4">
                    <div class="form-label mb-0">Choose a cake base</div>
                    <select class="custom-select" name="others" id="others" required>
                      <?php 
                      if ($prod_name == "Cupcakes w/ Yema Custard Frosting"){
                        ?>
                        <option value="Yema Base">Yema</option>
                        <?php
                      }else{
                        ?>
                        <option value="Vanilla Base">Vanilla</option>
                        <option value="Chocolate Base">Chocolate</option>
                        <option value="Red Velvet Base">Red Velvet</option>
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
                  <?php
                }else{
                  ?>
                  <div class="row">
                    <div class="col d-flex align-items-center">
                      <h3 style="font-style: normal; font-weight: var(--fweight-heading);">
                      $<?=$prod_price?></h3>
                    </div>
                  <?php
                }
              ?>
                <div class="col d-flex justify-content-end">
                  <input type="number" name="prod_id" value="<?php echo $prod_id?>" readonly hidden>
                  <input type="submit" name="submit" value="+ CART" class="btn px-3 py-1" style="width:auto">
                </div>
              </div>
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

</html>

