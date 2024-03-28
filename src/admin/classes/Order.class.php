<?php

class Order extends Database{
  protected function readOrderTable(){
    $query = 'SELECT * FROM orders';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute()){
      $stmt = null;
      header("location: ../index.php?error=stmtfailed");
      exit();
    }

    return $stmt;
  }
  
  protected function readOrderRecord($order_id){

    $query = 'SELECT * FROM orders WHERE order_id = ?;';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($order_id))){
      $stmt = null;
      header("location: ../index.php?error=stmtfailed");
      exit();
    }

    return $stmt;
  }

  protected function createOrder($order_name, $order_email, $order_contact, $order_add, $order_date, $order_pay, $order_time){

    $query = 'INSERT INTO orders (order_name, order_email, order_contact, order_add, order_date, order_pay, order_time) VALUES (?, ?, ?, ?, ?, ?, ?);';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($order_name, $order_email, $order_contact, $order_add, $order_date, $order_pay, $order_time))){
      $stmt = null;
      return "Error: Statement failed!";
    }
    $stmt = null;
    return "";
  }

}