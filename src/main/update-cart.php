<?php

include("../admin/classes/Database.class.php");
include("../admin/classes/Product.class.php");
include("../admin/classes/ProductCon.class.php"); 

if($_SERVER['REQUEST_METHOD'] == 'POST')
  {

    //get record details from database
    $prod_id = $_POST["prod_id"];
    $product = new ProductController();
    $result = $product->getRecord($prod_id);
    $row = $result->fetch(PDO::FETCH_ASSOC);

    $prod_name = $row["prod_name"];
    $prod_price = $row["prod_price"];
    $prod_description = $row["prod_description"];
    $prod_image_file = $row["prod_image_file"];
    $bestseller = $row["bestseller"];
    $cat_name = $product->getCatName($row["cat_id"]);
  }
?>

<html>
<script>

let basket = JSON.parse(localStorage.getItem("data")) || [];

let id = <?=$prod_id?>;

let increment = (id) => {
  let selectedItem = id;
  let search = basket.find((x) => x.id === selectedItem.id);

  if (search === undefined) {
    basket.push({
      id: selectedItem.id,
      item: 1,
    });
  } else {
    search.item += 1;
  }

  console.log(basket);
  localStorage.setItem("data", JSON.stringify(basket));
};

let decrement = (id) => {
  let selectedItem = id;
  let search = basket.find((x) => x.id === selectedItem.id);

  if (search === undefined) return;
  else if (search.item === 0) return;
  else {
    search.item -= 1;
  }

  basket = basket.filter((x) => x.item !== 0);
  console.log(basket);
  localStorage.setItem("data", JSON.stringify(basket));
};

</script>
</html>