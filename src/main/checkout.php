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
  <div class="order-receipt p-5 mt-5 mb-5">
    <div class="row">
      <div class="col d-flex justify-content-center mt-4 mb-3" id="rc-table-label">
        <h2>Finalize Order</h2>
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
          <div class="row">
              <div class="col">
                <hr>
              </div>
            </div>
        </div>
      </div>
    </div>
    <div class="row pl-3">
      <div class="col">
        <!-- customer details form -->
        <div class="check-form-wrapper">
          <form action="checkout-submit.php" method="post" class="rc-forms">
            <input type="text" id="cartArray" name="cartArray"  value="" hidden>
            <div>
              <label for="name">Name:</label>
              <input type="text" id="name" name="name" required><br>
            </div>
            <div>
              <label for="email">Email:</label>
              <input type="email" id="email" name="email" required><br>  
            </div>
            <div>
              <label for="contact">Contact:</label>
              <input type="tel" id="contact" name="contact" required><br>
            </div>  
            <div>
              <label for="address">Delivery Address:</label>
              <input type="text" id="address" name="address" required><br>
            </div>
            <div>
              <label for="date">Delivery Date:</label>
              <input type="date" id="delDate" name="date" min="" value="" required><br>
            </div>
            <div>
              <label for="payment">Payment method:</label>
              <select id="payment" name="payment" required>
                <option value="1" selected>ABA Pay</option>
                <option value="2">Cash</option>
              </select><br>
            </div>
            <p>
                *Please note that deliveries should be at least 2 days after the current date.
            </p>
            <div class="rc-links">
              <a href="javascript:history.go(-1)">Go back</a>
              <input class="btn" type="submit" name="submit" id="submit" value="Submit Order">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

</body>

<!-- Footer -->
<?php include('footer.php') ?>

<!-- JS script -->
<script src="checkout.js"></script>

</html>

