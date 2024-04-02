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

  protected function createOrder($order_name, $order_email, $order_contact, $order_add, $order_date, $order_pay){

    $query = '
    INSERT INTO orders (order_name, order_email, order_contact, order_add, order_date, order_pay) VALUES (?, ?, ?, ?, ?, ?);
    ';

    $dbh = $this->connect();
    $stmt = $dbh->prepare($query);

    $dbh->beginTransaction();
    if(!$stmt->execute(array($order_name, $order_email, $order_contact, $order_add, $order_date, $order_pay))){
      $stmt = null;
      return "Error: Statement failed!";
    }
    $id = $dbh->lastInsertId();
    $dbh->commit();

    return $id;
  }

  protected function updateOrder($order_date, $order_pay, $order_status, $order_id){
    
    $query = 'UPDATE orders SET order_date = ?, order_pay = ?, order_status = ? WHERE order_id = ?;';

    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($order_date, $order_pay, $order_status, $order_id))){
      $stmt = null;
      return "Error: Statement failed!";
    }
  }
}