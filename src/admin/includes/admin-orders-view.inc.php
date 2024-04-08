<?php
session_start();

if(!isset($_SESSION["adminid"])){
  header("location: admin-login.php");
}
else
{
  $success_msg = $error_msg = "";

  include("classes/Database.class.php");
  include("classes/Order.class.php");
  include("classes/OrderCon.class.php"); 
  include("../main/classes/Item.class.php");
  include("../main/classes/ItemCon.class.php"); 

  if($_SERVER['REQUEST_METHOD'] == 'GET')
  {

    if (!isset($_GET["id"])){
      header('location: admin-panel.php');
      exit();
    }

    $order_id = $_GET["id"];
    $order = new OrderController();
    $result = $order->getRecord($order_id);
    $row = $result->fetch(PDO::FETCH_ASSOC);

    $order_name = $row["order_name"];
    $order_email = $row["order_email"];
    $order_contact = $row["order_contact"];
    $order_add = $row["order_add"];
    $order_date = $row["order_date"];
    $order_pay = $row["order_pay"];
    $order_time = $row["order_time"];
    $order_status = $row["order_status"];

    $item = new ItemController(null,null,null,null,null,$order_id);
    $item_result = $item->getTable();
  }
  else
  {
    // gets values from table
    $order_id = $_POST["order_id"];
    $order = new OrderController();
    $result = $order->getRecord($order_id);
    $row = $result->fetch(PDO::FETCH_ASSOC);

    $order_name = $row["order_name"];
    $order_email = $row["order_email"];
    $order_contact = $row["order_contact"];
    $order_add = $row["order_add"];
    $order_time = $row["order_time"];

    $item = new ItemController(null,null,null,null,null,$order_id);
    $item_result = $item->getTable();

    // gets values from form
    $order_date = $_POST["order_date"];
    $order_pay = $_POST["order_pay"];
    $order_status = $_POST["order_status"];
    
    $order_change = new OrderController($order_id, null, null, null, null, $order_date, $order_pay);
    $order_change->setStatus($order_status);
    $order_change->editOrder();

    $success_msg = "Order edited successfully!";
  }
}