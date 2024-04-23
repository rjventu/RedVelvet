<?php include("includes/admin-panel.inc.php");?>

<!doctype html>
<html lang="en">

<!-- Head -->
<?php include("../main/head-tags.php")?>
  <title>Red Velvet KH - Admin Panel</title>
</head>
  
<body>

<!-- Admin Panel Header -->
<?php include("admin-header.php")?>

<!-- Admin Panel Sidebar -->
<?php include("admin-sidebar.php")?>
    <div class="col-md-9 content">
      <div class="row mb-4">
        <div class="col">
          <h2>Product Listing</h2>
        </div>
      </div>
      <div class="row mb-4 product-listing-filter">
        <div class="col product-listing-cat">
          <form method="POST" action="admin-panel.php">
            <div class="input-group align-items-center">
              <select class="custom-select" name="cat_name" id="filter-dropdown">
                  <option value=""<?=$cat_name == '' ? ' selected="selected"' : '';?>>Show all categories</option>
                  <option value="Signature Cakes"<?=$cat_name == 'Signature Cakes' ? ' selected="selected"' : '';?>>Signature Cakes</option>
                  <option value="Cake Delights"<?=$cat_name == 'Cake Delights' ? ' selected="selected"' : '';?>>Cake Delights</option>
                  <option value="Cheesecakes"<?=$cat_name == 'Cheesecakes' ? ' selected="selected"' : '';?>>Cheesecakes</option>
                  <option value="Pastries"<?=$cat_name == 'Pastries' ? ' selected="selected"' : '';?>>Pastries</option>
                  <option value="Cupcakes"<?=$cat_name == 'Cupcakes' ? ' selected="selected"' : '';?>>Cupcakes</option>
                  <option value="Cookies"<?=$cat_name == 'Cookies' ? ' selected="selected"' : '';?>>Cookies</option>
                  <option value="Bars"<?=$cat_name == 'Bars' ? ' selected="selected"' : '';?>>Bars</option>
              </select>
              <div class="input-group-prepend">
                <input type="submit" name="submit" id="filter-btn" value="Filter" class="input-group-text btn px-3 py-1" style="width:auto">
              </div>
            </div>
          </form>
        </div>
        <div class="col d-flex justify-content-end">
          <a class="btn-submit" href="admin-product-add.php" id="add-product-btn">Add New Product</a>
        </div>
      </div>
      <div class="row product-listing-table mx-1 p-4">
        <div class="col">
          <table class="table" id="admin-panel-table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Category</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              
              <?php
                while($row = $result->fetch(PDO::FETCH_ASSOC)){
                  echo 
                  "<tr>
                    <td>" . $row["prod_id"] . "</td>
                    <td>" . $product->getCatName($row['cat_id']) . "</td>
                    <td>" . $row["prod_name"] . "</td>
                    <td>" . $row["prod_price"] . "</td>
                    <td>" . $row["prod_description"] . "</td>
                    <td class='d-flex flex-column text-center'>"?>
                        <a href='admin-product-edit.php?id=<?= $row["prod_id"] ?>' class="btn-submit">Edit</a>
                        <a href='admin-panel.php?id=<?= $row["prod_id"] ?>' class="btn-submit"
                          onclick="return confirm('Are you sure you want to delete this record?');"
                          >Delete</a>
                    <?php "</td>
                    </tr>";
                }
              ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>       
  </div>
</section>

<div class="container mobile-msg-wrapper text-center">
  <div class="row d-flex mobile-msg justify-content-center mt-5 p-5">
    <div class="col">
      <h2>The Admin Panel is best experienced on a larger screen.</h2>
      <p class="mt-5" style="font-size: 20px;">Please use a desktop or laptop to access this page. Thank you!</p>
    </div>
  </div>
  <div class="row d-flex justify-content-center mt-5">
    <div class="rc-admin-links">
      <a href="admin-logout.php"><i class="bi bi-box-arrow-left btn-lg"></i>Logout</a>
    </div>
  </div>
</div>

</body>

<script>
  $(document).ready(function() {
    $('#admin-panel-table').DataTable();
  });
</script>

</html>

