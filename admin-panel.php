<?php
session_start();
?>

<!doctype html>
<html lang="en">

<!-- Head -->
<?php include("head-tags.php")?>
  <title>Red Velvet KH - Admin Login</title>
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
        <div class="col product-listing-cat d-flex align-items-center">
          <h4>Select Category:</h4>
        </div>
        <div class="col product-listing-cat d-flex justify-content-end">
          <div class="btn-submit" href="admin-product-add.php" role="button">Add New Product</div>
        </div>
      </div>
      <div class="row product-listing-table">
        <div class="col">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Category</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Creator</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                include("includes/product.inc.php");
                
                while($row = $result->fetchAll(PDO::FETCH_ASSOC)){
                  echo"
                    <tr>
                      <td>$row[prod_id]</td>
                      <td>$row[cat_id]</td>
                      <td>$row[prod_name]</td>
                      <td>$row[prod_price]</td>
                      <td>$row[admin_id]</td>
                      <td>
                        <a class='btn-submit' href='admin-product-edit.php?id=$row[prod_id]'>Edit</a>
                        <a class='btn-submit' href='admin-product-delete.php?=$row[prod_id]'>Delete</a>
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

