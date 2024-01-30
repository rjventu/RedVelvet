<?php

class Product extends Database{
  protected function readProductTable(){
    $query = 'SELECT * FROM product';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute()){
      $stmt = null;
      header("location: ../index.php?error=stmtfailed");
      exit();
    }

    return $stmt;
  }
  protected function readCatTable($cat_name){

    $cat_id = $this->readCatId($cat_name);

    $query = 'SELECT * FROM product WHERE cat_id = ?;';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($cat_id))){
      $stmt = null;
      header("location: ../index.php?error=stmtfailed");
      exit();
    }

    return $stmt;
  }

  protected function readProductRecord($prod_id){

    $query = 'SELECT * FROM product WHERE prod_id = ?;';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($prod_id))){
      $stmt = null;
      header("location: ../index.php?error=stmtfailed");
      exit();
    }

    return $stmt;
  }

  protected function createProduct($prod_name, $prod_price, $prod_description, $prod_image, $prod_image_file, $cat_name){

    $cat_id = $this->readCatId($cat_name);

    $query = 'INSERT INTO product (prod_name, prod_price, prod_description, prod_image, prod_image_file, cat_id) VALUES (?, ?, ?, ?, ?, ?);';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($prod_name, $prod_price, $prod_description, $prod_image, $prod_image_file, $cat_id))){
      $stmt = null;
      return "Error: Statement failed!";
    }
    $stmt = null;
    return "";
  }

  protected function updateProduct($prod_name, $prod_price, $prod_description, $prod_image, $prod_image_file, $cat_name, $prod_id){

    $cat_id = $this->readCatId($cat_name);

    $query = 'UPDATE product SET prod_name = ?, prod_price = ?, prod_description = ?, prod_image = ?, prod_image_file = ?, cat_id = ? WHERE prod_id = ?;';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($prod_name, $prod_price, $prod_description, $prod_image, $prod_image_file, $cat_id, $prod_id))){
      $stmt = null;
      header("location: ../index.php?error=stmtfailed");
      exit();
    }
    $stmt = null;
  }

  private function readCatId($cat_name){
    $query = 'SELECT cat_id FROM category WHERE cat_name = ?;';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($cat_name))){
      $stmt = null;
      header("location: ../index.php?error=stmtfailed");
      exit();
    }

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      return $row["cat_id"];
    }
  }

  protected function readCatName($cat_id){
    $query = 'SELECT cat_name FROM category WHERE cat_id = ?;';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($cat_id))){
      $stmt = null;
      header("location: ../index.php?error=stmtfailed");
      exit();
    }

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      return $row["cat_name"];
    }
  }
}