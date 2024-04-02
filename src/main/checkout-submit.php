<?php

include("../admin/classes/Database.class.php");
include("../admin/classes/Order.class.php");
include("../admin/classes/OrderCon.class.php"); 
include("classes/Item.class.php");
include("classes/ItemCon.class.php");

if(isset($_POST["submit"])){

  date_default_timezone_set('Asia/Phnom_Penh');
  
  $cart_array = json_decode($_POST['cartArray'], true);
  $order_name = $_POST["name"];
  $order_email = $_POST["email"];
  $order_contact = $_POST["contact"];
  $order_add = $_POST["address"];
  $order_date = $_POST["date"];
  $order_pay = $_POST["payment"];

  $order = new OrderController(null, $order_name, $order_email, $order_contact, $order_add, $order_date, $order_pay);
  $order_id = (int)$order->addOrder();

  foreach ($cart_array as $item){
    $item_id = $item["id"];
    $item_name = $item["name"];
    $item_price = $item["price"];
    $item_variety = $item["variety"];
    $item_qty = $item["item"];

    $itemCon = new ItemController($item_id, $item_name, $item_price, $item_variety, $item_qty, $order_id);
    $itemCon->addItem();
  }

}
?>
<!doctype html>
<html lang="en">

<!-- Head -->
<?php include("head-tags.php")?>
  <title>Red Velvet KH - Thank you!</title>
</head>
  
<body>

<!-- Header -->
<?php include("header.php")?>

<section class="order-receipt d-flex justify-content-center align-items-center">
  <div class="container ty-wrapper">
    <div class="row">
      <div class="col" style="text-align: center">
        <h2>Order Received</h2>
        <br>
        <h3>Your order number is:</h3>
        <br>
        <h2><?php echo $order_id?></h2>
        <br>
        <p>Our representatives will reach out soon.</p>
        <p>Thank you for your purchase!</p>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col d-flex justify-content-center">
        <a class="btn" href="index.php">Back to Home</a>
      </div>
    </div>
  </div>  
</section>

</body>

<!-- Footer -->
<?php include('footer.php') ?>

<!-- Inquiry Button -->
<?php include('inquiry.php') ?>

<script>
let cart = JSON.parse(localStorage.getItem("data")) || [];

function clearCart(){
  cart = [];
  localStorage.setItem("data", JSON.stringify(cart));
};

clearCart();
</script>

</html>

