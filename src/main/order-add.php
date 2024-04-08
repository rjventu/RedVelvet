<?php include("includes/order-add.inc.php");?>

<script>
  let cart = JSON.parse(localStorage.getItem("data")) || [];

  var id = Number(<?=json_encode($prod_id, JSON_HEX_TAG)?>);
  var others = <?=json_encode($others, JSON_HEX_TAG)?>;
  var prod_name = <?=json_encode($prod_name, JSON_HEX_TAG)?>;
  var prod_price = parseFloat(<?=json_encode($prod_price, JSON_HEX_TAG)?>);

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
