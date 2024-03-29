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
    <!-- <div class="order-receipt">
        <div id="label">
          <h2> This is your cart </h2>
        </div>


        <table class="receipt-table">
          <tr class="rc-table-title">
            <td>Item</td>
            <td>Qty</td>
            <td>Subtotal</td>
          </tr>
          <tr>
            <td colspan="3"><hr></td>
          </tr>
          <div id="table-items">
            <div class="rc-table-item">
              <tr>
                <td>Item1 asfsfsfsdfgdfgdfgsdfgdfgsdfgdsfgdsfdfg</td>
                <td>
                  <i class="bi bi-dash-lg"></i>
                  <div class="quantity">0</div>
                  <i class="bi bi-plus-lg"></i>
                </td>
                <td>$50</td>
              </tr>
            </div>
          </div>
          <tr>
            <td colspan="3"><hr></td>
          </tr>
          <tr>
            <td colspan="1"></td>
            <td class="rc-table-total">Total</td>
            <td class="rc-table-total" id="rc-table-total"></td>
          </tr>
        </table>
        <div class="rc-links">
          <a href="javascript:history.go(-1)">Go back</a>
          <a class="btn" href="checkout.php">Checkout</a>
        </div>
    </div> -->




    <div class="container checkout-container p-5 mt-5 mb-5">
      <div class="row">
        <div class="col d-flex justify-content-center mt-4 mb-5" id="rc-table-label">
          <h2>This is your cart</h2>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <table class="table receipt-table" id="receipt-table">

            <thead>
              <tr class="rc-table-title d-flex">
                <th class="col-6">Item</th>
                <th class="col-3" style="text-align: center">Qty</th>
                <th class="col-3" style="text-align: right">Subtotal</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td colspan="3"><hr></td>
              </tr>
              <div id="rc-table-item">
                
                <!-- cart items go here -->
                <tr class="d-flex">
                  <td class="col-6">test item</td>
                  <td class="col-3">
                    <i class="bi bi-dash-lg mr-3"></i>
                    <span class="quantity"> 0 </span>
                    <i class="bi bi-plus-lg ml-3"></i>
                  </td>
                  <td class="col-3">$ 120</td>
                </tr>

              </div>
              <tr>
                <td colspan="3"><hr></td>
              </tr>
              <tr class="d-flex">
                <td class="col-6"></td>
                <td class="col-3 rc-table-total">Total:</td>
                <td class="col-3 rc-table-total" id="rc-table-total">$ 1000</td>
              </tr>
            </tbody>
          </table>
          <div class="row" id="empty-cart-message" style="display:none">
            <div class="col mt-5 mb-5">
              <h3 style="text-align: center; font-size: 25px">
                Add more items to checkout!
              </h3>
            </div>
          </div>
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

<script>
let basket = JSON.parse(localStorage.getItem("data")) || [];
let ShoppingCart = document.getElementById("rc-table-item");
let label = document.getElementById("rc-table-label");
let totalLabel = document.getElementById("rc-table-total");
let checkoutLabel = document.getElementById("rc-table-checkout");
let receiptTable = document.getElementById("receipt-table");
let emptyLabel = document.getElementById("empty-cart-message");

function generateCartItems(){
  if (basket.length !== 0) {
    return (ShoppingCart.innerHTML = basket
      .map((x) => {
        return `
        <tr class="d-flex">
          <td class="col-6">${x.name} ${(x.variety === null) ? "" : x.variety}</td>
          <td class="col-3">
            <i onclick="decrement(${x.id})" class="bi bi-dash-lg mr-3"></i>
            <span class="quantity"> ${x.item} </span>
            <i onclick="increment(${x.id})" class="bi bi-plus-lg ml-3"></i>
          </td>
          <td class="col-3">$ ${x.price * x.item}</td>
        </tr>
        `;
      })
      .join(""));
  } else {

    label.innerHTML = "<h2>Cart is Empty</h2>";
    checkoutLabel.style.display = 'none';
    receiptTable.style.display = 'none';
    emptyLabel.style.display = "block";
  }
};


// checkoutLabel.style.display = `block`;
//     receiptTable.style.display = `block`;
//     emptyLabel.style.display = "block";

function getTotalAmount(){
  if (basket.length !== 0) {
    var totalAmount = basket
      .map((x) => {
        let { id, item, price } = x;
        return price * item;
      })
      .reduce((x, y) => x + y, 0);

    return (totalLabel.innerHTML = `$ ${totalAmount}`);
  } else return;
};

getTotalAmount()

function increment(id){
  let selectedItem = id;
  let search = basket.find((x) => x.id === selectedItem);

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

  generateCartItems();
  getTotalAmount();
  console.log(basket);
  localStorage.setItem("data", JSON.stringify(basket));
};

function removeItem(id){
  basket = basket.filter((x) => x.id !== id);
  generateCartItems();
  getTotalAmount()
  localStorage.setItem("data", JSON.stringify(basket));
};

function decrement(id){
  let selectedItem = id;
  let search = basket.find((x) => x.id === selectedItem);

  console.log(search.name);
  if (search === undefined) return;
  else if (search.item === 0) return;
  else {
    search.item -= 1;
    if(search.item === 0){
      removeItem(id);
    }
  }

  generateCartItems();
  getTotalAmount()
  console.log(basket);
  localStorage.setItem("data", JSON.stringify(basket));
};

function clearCart(){
  basket = [];
  // generateCartItems();
  // calculation();
  localStorage.setItem("data", JSON.stringify(basket));
};

// clearCart();
generateCartItems();

</script>

<?php
include("../admin/classes/Database.class.php");
include("../admin/classes/Product.class.php");
include("../admin/classes/ProductCon.class.php"); 

$others = null;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  //get values from form
  $prod_id = $_POST["prod_id"];

  if(isset($_POST["others"])){
    $others = $_POST["others"];
  }
  //get record details from database
  $product = new ProductController();
  $result = $product->getRecord($prod_id);
  $row = $result->fetch(PDO::FETCH_ASSOC);

  $prod_name = $row["prod_name"];
  $prod_price = $row["prod_price"];

  echo '
  <script>
    let id = Number(' . json_encode($prod_id, JSON_HEX_TAG) . ');
    let prod_name = ' . json_encode($prod_name, JSON_HEX_TAG) . ';
    let prod_price = parseFloat(' . json_encode($prod_price, JSON_HEX_TAG) . ');
    let others = ' . json_encode($others, JSON_HEX_TAG) . ';
    increment(id);
    label.innerHTML = `<h2>This is your cart</h2>`;
  </script>
  ';
}
?>

</html>

