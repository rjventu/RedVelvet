<!doctype html>
<html lang="en">

<!-- Head -->
<?php include("head-tags.php")?>
  <title>Red Velvet KH - Place your order!</title>
</head>

<body>

<!-- Header -->
<?php include("header.php")?>

  <section class="order">
    <div class="container rc-container p-5 mt-5 mb-5">
      <div class="row">
        <div class="col d-flex justify-content-center mt-4 mb-5" id="rc-table-label">
          <h2>My Cart</h2>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <!-- Cart Table -->
          <div class="rc-table" id="rc-table">
            <div class="rc-table-head">
              <div class="row d-flex ml-3 mr-3 rc-table-title">
                <div class="col-6 p-0">Item</div>
                <div class="col-3 p-0" style="text-align: center">Qty</div>
                <div class="col-3 p-0" style="text-align: right">Subtotal</div>
              </div>
              <div class="row">
                <div class="col">
                  <hr>
                </div>
              </div>
            </div>
            <div id="rc-table-list">
              <!-- cart contents go here -->
            </div>
            <div class="rc-table-foot" id="rc-table-total">
              <div class="row">
                <div class="col">
                  <hr>
                </div>
              </div>
              <div class="row d-flex ml-3 mr-3">
                <div class="col-6 p-0"></div>
                <div class="col-3 p-0" style="text-align: center">Total:</div>
                <div class="col-3 p-0" style="text-align: right" id="total-price"></div>
              </div>
            </div>
          </div>
          <!-- Empty Cart Message -->
          <div class="row empty-cart-message" id="empty-cart-message" style="display:none">
            <div class="col mb-5">
              <h3>Add more items to checkout!</h3>
            </div>
          </div>
          <!-- Links -->
          <div class="rc-links">
            <a href="javascript:history.go(-1)">Go back</a>
            <a class="btn" href="checkout.php" id="rc-table-checkout">Checkout</a>
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

<script src="cart.js"></script>

</html>

