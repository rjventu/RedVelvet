<?php
session_start();

if(!isset($_SESSION["adminid"])){
  header("location: admin-login.php");
}
else
{
  include("classes/Database.class.php");
  include("classes/Order.class.php");
  include("classes/OrderCon.class.php");

  $order = new OrderController();
  $result = $order->getTable();
}
