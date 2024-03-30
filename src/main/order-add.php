
<?php
include("../admin/classes/Database.class.php");
include("../admin/classes/Product.class.php");
include("../admin/classes/ProductCon.class.php"); 

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  //get values from form
  $prod_id = $_POST["prod_id"];

  if(isset($_POST["others"])){
    $others = $_POST["others"];
  }else{
    $others = "none";
  }

  //get record details from database
  $product = new ProductController();
  $result = $product->getRecord($prod_id);
  $row = $result->fetch(PDO::FETCH_ASSOC);
  $prod_name = $row["prod_name"];
  $prod_price = $row["prod_price"];

  // echoes js script to add product to cart
  echo '
  <script>
    let cart = JSON.parse(localStorage.getItem("data")) || [];

    var id = Number(' . json_encode($prod_id, JSON_HEX_TAG) . ');
    var others = ' . json_encode($others, JSON_HEX_TAG) . ';
    var prod_name = ' . json_encode($prod_name, JSON_HEX_TAG) . ';
    var prod_price = parseFloat(' . json_encode($prod_price, JSON_HEX_TAG) . ');

    function increment(newID, newVar, newName, newPrice){
      var search = cart.find((x) => x.id === newID && x.variety === newVar);
    
      if (search === undefined) {
        cart.push({
          id: newID,
          name: newName,
          price: newPrice,
          variety: newVar,
          item: 1,
        });
      } else {
        search.item += 1;
      }
      localStorage.setItem("data", JSON.stringify(cart));
    };

    increment(id, others, prod_name, prod_price);
    window.location.replace("order.php");
  </script>
  ';
}
