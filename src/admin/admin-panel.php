<?php
session_start();

if(!isset($_SESSION["adminid"])){

  header("location: admin-login.php");

}
else
{

  include("classes/Database.class.php");
  include("classes/Product.class.php");
  include("classes/ProductCon.class.php");

  $cat_name = "";

  function deleteFile($prod_image_file_old){
      
    $fileDestination = '../../assets/uploads/'.$prod_image_file_old;
    $realFileDestination = realpath($fileDestination);

    if(is_writable($realFileDestination)){
      if(file_exists($realFileDestination)){
        unlink($realFileDestination);
      }
    }
  }

  if (isset($_GET['id'])) {
    $prod_id = $_GET['id'];

    $product = new ProductController($prod_id);
    $result = $product->getRecord($prod_id);

    $row = $result->fetch(PDO::FETCH_ASSOC);
    $prod_image_file_old = $row["prod_image_file"];

    deleteFile($prod_image_file_old);

    $error_msg = $product->removeRecord();
    
    if (empty($error_msg)) {
      echo '<script>alert("Deleted Successfully!")</script>';
    }else{
      echo '<script>alert('.$error_msg.')</script>';
    }
  }

  $product = new ProductController();
  if(isset($_POST["submit"]))
  {
    // gets filtered table
    $cat_name = $_POST["cat_name"];
    
    if(empty($cat_name)){
      $result = $product->getTable();
    }else{
      $result = $product->getCatTable($cat_name);
    }
  }
  else{
    // gets normal table
    $result = $product->getTable();
  }
}
?>

<!doctype html>
<html lang="en">

<!-- Head -->
<?php include("..\main\head-tags.php")?>
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

</body>

<script>
  $(document).ready(function() {
    $('#admin-panel-table').DataTable();
  });
</script>

</html>

