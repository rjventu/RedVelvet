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

  if(isset($_POST["submit"]))
  {
    $success_msg = $error_msg = "";

    //gets values from form
    $prod_name = $_POST["prod_name"];
    $prod_price = $_POST["prod_price"];
    $prod_description = $_POST["prod_description"];
    $bestseller = $_POST["bestseller"];
    $cat_name = $_POST["cat_name"];

    // gets values for file input
    $file = $_FILES['prod_image'];
    $fileName = $_FILES['prod_image']['name'];
    $fileTmpName = $_FILES['prod_image']['tmp_name'];
    $fileSize = $_FILES['prod_image']['size'];
    $fileError = $_FILES['prod_image']['error'];

    list($prod_image, $prod_image_file, $fileDestination, $error_msg) = prepareFile($fileName, $fileTmpName, $fileSize, $fileError);

    if(empty($error_msg)){
      $product = new ProductController(null, $prod_name, $prod_price, $prod_description, $prod_image, $prod_image_file, $bestseller, $cat_name);
      $error_msg = $product->addProduct();
  
      if(empty($error_msg)){
        move_uploaded_file($fileTmpName, $fileDestination);
        $success_msg = "Product added successfully!";
      }
    }

  }
}
?>

<!doctype html>
<html lang="en">

<!-- Head -->
<?php include("..\main\head-tags.php")?>
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
        <form class="container product-add-form" action="admin-product-add.php" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col">
              <div class="form-group mb-5">
                <div class="form-label">Product Name*</div>
                <input type="text" id="prod_name" name="prod_name" placeholder="Choco Chip" required>
            </div>
            </div>
            <div class="col">
              <div class="form-group mb-5">
                <div class="form-label">Price*</div>
                <input type="number" id="prod_price" name="prod_price" min="0" max="100" step="0.01" placeholder="1.00" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group mb-5">
                <div class="form-label">Category*</div>
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
                <div class="form-label">Image*</div>
                <div class="input-group">
                  <input type="file" class="upload-image w-100" id="prod_image" name="prod_image" data-browse-on-zone-click="true" data-show-preview="true" required>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">

              <div class="form-group mb-4">
                <div class="form-label">Description</div>
                <textarea class="form-control" id="prod_description" name="prod_description" rows="3" placeholder="Type your description here"></textarea>
              </div>

              <div class="form-group mb-4">
                <div class="form-label">Is this product a Bestseller?</div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="bestsellerR1" name="bestseller" class="custom-control-input" value="Y" required>
                  <label class="custom-control-label" for="bestsellerR1">Yes</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="bestsellerR2" name="bestseller" class="custom-control-input" value="N">
                  <label class="custom-control-label" for="bestsellerR2">No</label>
                </div>
              </div>
                
              <div class="form-group">
                <div class="row d-flex justify-content-center">
                  <input type="submit" name="submit" value="ADD PRODUCT" class="btn px-3 py-1" style="width:auto">
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

