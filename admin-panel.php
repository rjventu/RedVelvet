<?php
session_start();
include("includes/product.inc.php");
?>

<!doctype html>
<html lang="en">

<!-- Head -->
<?php include("head-tags.php")?>
  <title>Red Velvet KH - Admin Panel</title>
</head>
  
<body>

<!-- Admin Panel Header -->
<?php include("admin-header.php")?>


<section class="admin-panel-wrapper container">
  <div class="row my-5">
    <div class="col sidebar" style="background-color:green">text</div>
    <div class="col-md-9 content" style="">
      <div class="row mb-4">
        <div class="col">
          <h2>Product Listing</h2>
        </div>
      </div>
      <div class="row mb-4 product-listing-filter">
        <div class="col product-listing-cat">
          <form method="POST" action="includes/product.inc.php">
            <div class="input-group align-items-center">
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
              <div class="input-group-prepend">
                <input type="submit" name="submit" value="Filter" class="input-group-text btn-submit px-3 py-1" style="width:auto">
              </div>
            </div>
          </form>
        </div>
        <div class="col d-flex justify-content-end">
          <a class="btn-submit" href="admin-product-add.php" id="product-listing-add">Add New Product</a>
        </div>
      </div>
      <div class="row product-listing-table mx-1">
        <div class="col">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Category</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                while($row = $result->fetch(PDO::FETCH_ASSOC)){
                  echo"
                  <tr>
                    <td>$row[prod_id]</td>
                    <td>".$product->getCatName($row['cat_id'])."</td>
                    <td>$row[prod_name]</td>
                    <td>$$row[prod_price]</td>
                    <td>
                      <a class='btn-submit' href='admin-product-edit.php?id=$row[prod_id]'>Edit</a>
                      <a class='btn-submit' href='admin-product-delete.php?id=$row[prod_id]'>Delete</a>
                    </td>
                  </tr>
                  ";
                }
              ?>
            </tbody>
          </table>
        </div>
        
      </div>
    </div>
  </div>
</section>

</body>

</html>

