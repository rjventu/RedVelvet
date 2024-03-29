<?php

include("../admin/classes/Database.class.php");
include("../admin/classes/Product.class.php");
include("../admin/classes/ProductCon.class.php"); 

if($_SERVER['REQUEST_METHOD'] == 'GET')
{
  if (!isset($_GET["id"])){
    header('location: index.php');
    exit();
  }
  
  //get record details from database
  $prod_id = $_GET["id"];
  $product = new ProductController();
  $result = $product->getRecord($prod_id);
  $row = $result->fetch(PDO::FETCH_ASSOC);

  $prod_name = $row["prod_name"];
  $prod_price = $row["prod_price"];
  $prod_description = $row["prod_description"];
  $prod_image_file = $row["prod_image_file"];
  $bestseller = $row["bestseller"];
  $cat_name = $product->getCatName($row["cat_id"]);
  $others = null;
}
?>

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
    <div class="row m-5">
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
            <form action="order.php" method="post" enctype="multipart/form-data">
              
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

<!-- Inquiry Button -->
<?php include('inquiry.php') ?>

<!-- <script>

let basket = JSON.parse(localStorage.getItem("data")) || [];

let id = Number(<?php echo json_encode($prod_id, JSON_HEX_TAG); ?>);
let prod_name = <?php echo json_encode($prod_name, JSON_HEX_TAG); ?>;
let prod_price = parseFloat(<?php echo json_encode($prod_price, JSON_HEX_TAG); ?>);
let others = <?php echo json_encode($others, JSON_HEX_TAG); ?>;

function addToCart() {
  increment(id, others);
}

let increment = (id, others) => {
  let selectedItem = id;
  let selectedItemVariety = others;
  let search = basket.find((x) => x.id === selectedItem && x.variety === selectedItemVariety);

  if (search === undefined) {
    basket.push({
      id: selectedItem,
      name: prod_name,
      price: prod_price,
      variety: others,
      item: 1,
    });
  } else {
    search.item += 1;
  }

  console.log(basket);
  localStorage.setItem("data", JSON.stringify(basket));
};

</script> -->

</html>

