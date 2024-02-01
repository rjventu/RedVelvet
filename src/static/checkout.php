<!doctype html>
<html lang="en">

<!-- Head -->
<?php include("head-tags.php")?>
  <title>Red Velvet KH - Place your order!</title>
</head>
  
<body>

<!-- Header -->
<?php include("header.php")?>

  <div class="order-receipt">
      <h2>Your receipt</h2>
      <table class="receipt-table">
          <tr class="rc-table-title">
            <td>Item</td>
            <td>Qty</td>
            <td>Price</td>
          </tr>
          <tr>
            <td colspan="3"><hr></td>
          </tr>
          <tr class="rc-table-item">
            <td>Item1</td>
            <td>1</td>
            <td>$50</td>
          </tr>
          <tr class="rc-table-item">
            <td>Item1</td>
            <td>1</td>
            <td>$50</td>
          </tr>
          <tr class="rc-table-item">
            <td>Item1</td>
            <td>1</td>
            <td>$50</td>
          </tr>
          <tr>
            <td colspan="3"><hr></td>
          </tr>
          <tr>
            <td colspan="1"></td>
            <td class="rc-table-total">Total</td>
            <td class="rc-table-total">$150</td>
          </tr>
          <tr>
              <td colspan="3"><hr></td>
            </tr>
      </table>
      <div class="check-form-wrapper">
          <form action="/submit.php" method="post" class="rc-forms">
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
              <input type="datetime-local" id="date" name="date" required><br>
              </div>
              <div>
                  <label for="payment">Payment method:</label>
              <select id="payment" name="payment" required>
                  <option value="">Select a payment option</option>
                  <option value="ABA">ABA Pay</option>
                  <option value="cash">Cash</option>
              </select><br>
              </div>
          </form>
          <p>
              *Please note that deliveries should be at least 2 days after the current date.
          </p>
      </div>           
      <div class="rc-links">
        <a href="order.php">Go back</a>
        <input class="btn" type="submit" value="CONFIRM ORDER">
      </div>
  </div>

</body>

<!-- Footer -->
<?php include('footer.php') ?>

<!-- Inquiry Button -->
<?php include('inquiry.php') ?>

</html>

