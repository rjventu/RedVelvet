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
    <div class="order-receipt">
        <h2> This is your cart </h2>
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
        </table>
        <div class="rc-links">
          <a href="javascript:history.go(-1)">Go back</a>
          <a class="btn" href="checkout.php">Checkout</a>
        </div>
    </div>
  </section>

</body>

<!-- Footer -->
<?php include('footer.php') ?>

<!-- Inquiry Button -->
<?php include('inquiry.php') ?>

</html>

