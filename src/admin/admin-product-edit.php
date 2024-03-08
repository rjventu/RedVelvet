<?php
session_start();

if(!isset($_SESSION["adminid"])){
  header("location: admin-login.php");
}
else
{
  $success_msg = $error_msg = "";

  include("classes/Database.class.php");
  include("classes/Product.class.php");
  include("classes/ProductCon.class.php"); 

  function deleteFile($prod_image_file_old){
      
    $fileDestination = '../../assets/uploads/'.$prod_image_file_old;
    $realFileDestination = realpath($fileDestination);

    if(is_writable($realFileDestination)){
      if(file_exists($realFileDestination)){
        unlink($realFileDestination);
      }
    }
  }

  function prepareFile($fileName, $fileTmpName, $fileSize, $fileError){
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allow = array('jpg', 'jpeg', 'png');
    if (in_array($fileActualExt, $allow)) {
      if($fileError === 0){
        if($fileSize < 50000000){

          $fileNameNew = uniqid('', true).".".$fileActualExt;
          $fileDestination = '../../assets/uploads/'.$fileNameNew;

          
          return array($fileName, $fileNameNew, $fileDestination, "");
        }else{
          return array("","","","Error: File size must be below 50mb.");
        }
      }else{
        return array("","","","Error: There was an error in uploading your file.");
      }
    }else{
      return array("","","","Error: Valid file types are jpg, jpeg, and png.");
    }

  }

  if($_SERVER['REQUEST_METHOD'] == 'GET')
  {

    if (!isset($_GET["id"])){
      header('location: admin-panel.php');
      exit();
    }

    $prod_id = $_GET["id"];
    $product = new ProductController();
    $result = $product->getRecord($prod_id);
    $row = $result->fetch(PDO::FETCH_ASSOC);

    $prod_name = $row["prod_name"];
    $prod_price = $row["prod_price"];
    $prod_description = $row["prod_description"];
    $prod_image_old = $row["prod_image"];
    $prod_image_file_old = $row["prod_image_file"];
    $bestseller = $row["bestseller"];
    $cat_name = $product->getCatName($row["cat_id"]);
  }
  else
  {
    $success_msg = $error_msg = "";

    // gets values from form
    $prod_id = $_POST["prod_id"];
    $prod_name = $_POST["prod_name"];
    $prod_price = $_POST["prod_price"];
    $prod_description = $_POST["prod_description"];
    $bestseller = $_POST["bestseller"];
    $cat_name = $_POST["cat_name"];
    
    // fetches old filename from the database
    $product = new ProductController();
    $result = $product->getRecord($prod_id);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $prod_image_file_old = $row["prod_image_file"];
    
    // gets values for file input
    $file = $_FILES["prod_image"];
    $fileName = $_FILES['prod_image']['name'];
    $fileTmpName = $_FILES['prod_image']['tmp_name'];
    $fileSize = $_FILES['prod_image']['size'];
    $fileError = $_FILES['prod_image']['error'];

    // runs if there is no uploaded file
    if($fileError === 4)
    {
      $product = new ProductController($prod_id, $prod_name, $prod_price, $prod_description, null, null, $bestseller, $cat_name);
      $error_msg = $product->editProductNoImg();

      if(empty($error_msg)){
        $success_msg = "Product edited successfully!";
      }
    }
    else // runs if there is an uploaded file
    {
      list($prod_image_new, $prod_image_file_new, $fileDestination, $error_msg) = prepareFile($fileName, $fileTmpName, $fileSize, $fileError);

      if(empty($error_msg)){
        $product = new ProductController($prod_id, $prod_name, $prod_price, $prod_description, $prod_image_new, $prod_image_file_new, $bestseller, $cat_name);
        $error_msg = $product->editProduct();
        
        if(empty($error_msg)){
          if($fileError === 0){
            move_uploaded_file($fileTmpName, $fileDestination);
            deleteFile($prod_image_file_old);
          }
          $success_msg = "Product edited successfully!";
        }
      }
    }

  }

}
?>

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

              <div class="form-check form-check-inline mb-5">
                <input class="form-check-input" type="checkbox" id="bestseller" name="bestseller" value="Y" 
                  <?=$bestseller == 'Y' ? 'checked' : '';?>>
                <label class="form-check-label" for="bestseller">Bestseller</label>
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

