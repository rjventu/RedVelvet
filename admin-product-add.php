<!doctype html>
<html lang="en">

<!-- Head -->
<?php include("head-tags.php")?>
  <title>Red Velvet KH - Add Product</title>
</head>
  
<body>

<!-- Admin Panel Header -->
<?php include("admin-header.php")?>

<section class="signup-wrapper">
    <div class="container-md product-add-container p-5">
      <div class="row mb-4">
        <div class="col">
          <h2 class="text-center">Add Product</h2>
        </div>
      </div>
      <div class="row">
        <form class="container product-add-form" action="includes/product-add.inc.php" method="post">
          <div class="row">
            <div class="col">
              <div class="form-group mb-5">
                <div class="form-label">Product Name</div>
                <input type="text" id="prod_name" name="prod_name" placeholder="Choco Chip" required>
              </div>
              <div class="form-group mb-5">
                <div class="form-label">Category</div>
                <select class="custom-select" name="cat_name" id="cat_name" required>
                  <option value="" selected>Choose a category</option>
                  <option value="Signature Cakes">Signature Cakes</option>
                  <option value="Cake Delights">Cake Delights</option>
                  <option value="Cheesecakes">Cheesecakes</option>
                  <option value="Pastries">Pastries</option>
                  <option value="Cupcakes">Cupcakes</option>
                  <option value="Cookies">Cookies</option>
                  <option value="Bars">Bars</option>
                </select>
              </div>
            </div>
            <div class="col">
              <div class="form-group mb-5">
                <div class="form-label">Price</div>
                <input type="number" id="prod_price" name="prod_price" min="0" max="100" step="0.01" placeholder="1.00" required>
              </div>
              <div class="form-group mb-5">
                <div class="form-label">Image</div>
                <input type="file" class="upload-image" id="prod_image" name="prod_image" data-browse-on-zone-click="true" data-show-preview="true" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <div class="form-label">Description</div>
                <textarea class="form-control" id="prod_description" name="prod_description" rows="3"></textarea>
              </div>
            </div>
          </div>
          <div class="row mt-4 mb-1">
            <div class="col d-flex justify-content-center">
              <input type="submit" name="submit" value="ADD PRODUCT" class="btn px-3 py-1" style="width:auto">
            </div>
          </div>
          <div class="row">
            <div class="col d-flex justify-content-center">
              <a class="mt-3" href="admin-panel.php" style="color:gray;">Cancel</a>
            </div>
          </div>
        </form>
      </div>
    </div>
</section>

</body>

</html>

