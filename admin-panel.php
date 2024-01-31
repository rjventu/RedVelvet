<?php
session_start();

include("classes/Database.class.php");
include("classes/Product.class.php");
include("classes/ProductCon.class.php");

$cat_name = "";

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
else
{
  // gets normal table
  $result = $product->getTable();
}
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
          <form method="POST" action="admin-panel.php">
            <div class="input-group align-items-center">
              <select class="custom-select" name="cat_name" id="cat_name">
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
                <th scope="col">Image file</th>
                <th scope="col">Description</th>
                <th scope="col" style="width:20%">Action</th>
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
                    <td>$row[prod_image]</td>
                    <td>$row[prod_description]</td>
                    <td>
                    <a class='btn-submit' href='admin-product-edit.php?id=$row[prod_id]'>Edit</a>
                    <a class='btn-submit' href='includes/product-delete.inc.php?id=$row[prod_id]'
                      onclick="."return confirm('Are you sure you would like to delete this product?');".";
                      >Delete</a>
                    </td>
                  </tr>
                  ";
                }
              ?>
              <?php
                // while($row = $result->fetch(PDO::FETCH_ASSOC)){
                //   echo'
                //   <tr>
                //     <td>$row[prod_id]</td>
                //     <td>'.$product->getCatName($row["cat_id"]).'</td>
                //     <td>$row[prod_name]</td>
                //     <td>$row[prod_price]</td>
                //     <td>$row[prod_image]</td>
                //     <td>$row[prod_description]</td>
                //     <td>
                //     <a class="btn-submit" href="admin-product-edit.php?id=$row[prod_id]">Edit</a>
                //     <a class="btn-submit" href="includes/product-delete.inc.php?id=$row[prod_id]"
                //       onclick="return confirm("Are you sure you would like to delete this record?");";
                //         >Delete</a>
                //     </td>
                //   </tr>
                //   ';
                // }
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

