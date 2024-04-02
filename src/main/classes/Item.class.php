<?php

class Item extends Database{
  protected function readItemTable($order_id){
    $query = 'SELECT * FROM orders_items WHERE order_id = ?;';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute($order_id)){
      $stmt = null;
      header("location: ../index.php?error=stmtfailed");
      exit();
    }

    return $stmt;
  }
  
  protected function createItem($item_id, $item_name, $item_price, $item_variety, $item_qty, $order_id){

    $query = 'INSERT INTO orders_items (item_id, item_name, item_price, item_variety, item_qty, order_id) VALUES (?, ?, ?, ?, ?, ?);';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($item_id, $item_name, $item_price, $item_variety, $item_qty, $order_id))){
      $stmt = null;
      return "Error: Statement failed!";
    }
    $stmt = null;
    return "";
  }

}