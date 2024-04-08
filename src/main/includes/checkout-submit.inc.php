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
  $order_pay_val = $order_pay == "1" ? "ABA Pay" : "Cash";

  $order = new OrderController(null, $order_name, $order_email, $order_contact, $order_add, $order_date, $order_pay);
  $order_id = (int)$order->addOrder();

  $message = 
    "NEW ORDER #" . $order_id .
    "<br/><br/>DETAILS<br/<br/>Customer name: " . $order_name .
    "<br/>Email: " . $order_email . 
    "<br/>Contact No.: " . $order_contact . 
    "<br/>Address: " . $order_add . 
    "<br/>Delivery Date: " . $order_date . 
    "<br/>Payment Method: " . $order_pay_val . "<br/><br/>"; 
  
  $ctr = 1;
  $total = 0;
  foreach ($cart_array as $item){
    $item_id = $item["id"];
    $item_name = $item["name"];
    $item_price = $item["price"];
    $item_variety = $item["variety"];
    $item_qty = $item["item"];

    $message = 
      $message . 
      "ITEM #" . $ctr .
      "<br/>ID: " . $item_id . 
      "<br/>Name: " . $item_name .
      "<br/>Variety: " . $item_variety .
      "<br/>Price: $" . $item_price .
      "<br/>Qty: " . $item_qty . 
      "<br/>Subtotal: $" . $item_price * $item_qty . "<br/><br/>";

    $total += $item_price * $item_qty;

    $itemCon = new ItemController($item_id, $item_name, $item_price, $item_variety, $item_qty, $order_id);
    $itemCon->addItem();
    $ctr += 1;
  }

  $message = $message . "Total Price: $" . $total;

  include("../../checkout-send.inc.php");
}
