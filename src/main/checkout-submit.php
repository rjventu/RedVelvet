<?php include("includes/checkout-submit.inc.php")?>

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
        <a class="btn" href="home.php">Back to Home</a>
      </div>
    </div>
  </div>
</section>

</body>

<!-- Footer -->
<?php include('footer.php') ?>

<script>
let cart = JSON.parse(localStorage.getItem("data")) || [];

function clearCart(){
  cart = [];
  localStorage.setItem("data", JSON.stringify(cart));
};

clearCart();
</script>

</html>

