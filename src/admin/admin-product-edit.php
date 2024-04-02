<?php include("includes/admin-product-edit.inc.php");?>

<!doctype html>
<html lang="en">

<!-- Head -->
<?php include("..\main\head-tags.php")?>
  <title>Red Velvet KH - Edit Product</title>
</head>
  
<body>

<!-- Admin Panel Header -->
<?php include("admin-header.php")?>

<section class="signup-wrapper">
    <div class="container-md product-add-container p-5">
      <div class="row mb-4">
        <div class="col">
          <h2 class="text-center">Edit Product</h2>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col d-flex justify-content-center">
          <!-- Displays error/success message -->
          <?php  
            if(!empty($success_msg)){ 
            ?> 
            <span class="alert alert-success"><?php echo $success_msg; ?></span> 
            <?php  
            }
            if (!empty($error_msg)){
            ?> 
            <span class="alert alert-danger"><?php echo $error_msg; ?></span> 
            <?php  
            }
          ?>
        </div>
      </div>
      <!-- Form -->
      <div class="row">
        <form class="container product-add-form" action="admin-product-edit.php" method="post" enctype="multipart/form-data">

          <input type="number" name="prod_id" value="<?php echo $prod_id?>" readonly hidden>
          
          <div class="row">
            <div class="col">
              <div class="form-group mb-5">
                <div class="form-label">Product Name</div>
                <input type="text" id="prod_name" name="prod_name" value="<?php echo $prod_name; ?>" required>
              </div>
            </div>
            <div class="col">
              <div class="form-group mb-5">
                <div class="form-label">Price</div>
                <input type="number" id="prod_price" name="prod_price" min="0" max="100" step="0.01" value="<?php echo $prod_price; ?>" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group mb-3">
                <div class="form-label">Category</div>
                <select class="custom-select" name="cat_name" id="cat_name" required>
                  <option value="">Choose a category</option>
                  <option value="Signature Cakes"<?=$cat_name == 'Signature Cakes' ? ' selected="selected"' : '';?>>Signature Cakes</option>
                  <option value="Cake Delights"<?=$cat_name == 'Cake Delights' ? ' selected="selected"' : '';?>>Cake Delights</option>
                  <option value="Cheesecakes"<?=$cat_name == 'Cheesecakes' ? ' selected="selected"' : '';?>>Cheesecakes</option>
                  <option value="Pastries"<?=$cat_name == 'Pastries' ? ' selected="selected"' : '';?>>Pastries</option>
                  <option value="Cupcakes"<?=$cat_name == 'Cupcakes' ? ' selected="selected"' : '';?>>Cupcakes</option>
                  <option value="Cookies"<?=$cat_name == 'Cookies' ? ' selected="selected"' : '';?>>Cookies</option>
                  <option value="Bars"<?=$cat_name == 'Bars' ? ' selected="selected"' : '';?>>Bars</option>
                </select>
              </div>
            </div>
            <div class="col">
              <div class="form-group mb-3">
                <div class="form-label">Image</div>
                <div class="input-group">
                  <input type="file" class="upload-image w-100" id="prod_image" name="prod_image" data-browse-on-zone-click="true" data-show-preview="true">
                  <?php 
                    $product = new ProductController();
                    $result = $product->getRecord($prod_id);
                    $row = $result->fetch(PDO::FETCH_ASSOC);
                    $prod_image_old = $row["prod_image"];
                  ?>
                  <span><p>Uploaded File: <i><?php echo $prod_image_old?></i></p></span>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">

              <div class="form-group mb-4">
                <div class="form-label">Description</div>
                <textarea class="form-control" id="prod_description" name="prod_description" rows="3"><?php echo $prod_description; ?></textarea>
              </div>

              <div class="form-group mb-4">
                <div class="form-label">Is this product a Bestseller?</div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="bestsellerR1" name="bestseller" class="custom-control-input" value="Y" required <?=$bestseller == 'Y' ? 'checked' : '';?>>
                  <label class="custom-control-label" for="bestsellerR1">Yes</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="bestsellerR2" name="bestseller" class="custom-control-input" value="N" 
                  <?=$bestseller == 'N' ? 'checked' : '';?> >
                  <label class="custom-control-label" for="bestsellerR2">No</label>
                </div>
              </div>

              <div class="form-group">
                <div class="row d-flex justify-content-center">
                  <input type="submit" name="submit" value="EDIT PRODUCT" class="btn px-3 py-1" style="width:auto">
                </div> 
                
                <div class="row d-flex justify-content-center">
                  <a class="mt-3" href="admin-panel.php" style="color:gray;">Cancel</a>
                </div>  
              </div>

            </div>
          </div>
        </form>
      </div>
    </div>
</section>

</body>

</html>

