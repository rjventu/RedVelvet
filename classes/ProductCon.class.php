<?php

class ProductController extends Product{
  private $prod_id;
  private $prod_name;
  private $prod_price;
  private $prod_description;
  private $prod_image;
  private $prod_image_file;
  private $cat_name;
  
  public function __construct($prod_name=null, $prod_price=null, $prod_description=null, $prod_image=null, $prod_image_file=null, $cat_name=null){
    // $this->prod_id = $prod_id;
    $this->prod_name = $prod_name;
    $this->prod_price = $prod_price;
    $this->prod_description = $prod_description;
    $this->prod_image = $prod_image;
    $this->prod_image_file = $prod_image_file;
    $this->cat_name = $cat_name;
  }

  public function getTable(){
    $result = $this->readProductTable();
    return $result;
  }

  public function getCatTable($cat_name){
    $result = $this->readCatTable($cat_name);
    return $result;
  }

  public function getRecord($prod_id){
    $result = $this->readProductRecord($prod_id);
    return $result;
  }

  public function addProduct(){
    if($this->invalidName()){
      return "Error: Invalid name! Valid characters include A-Z and a-z.";
    }else{
      $this->createProduct($this->prod_name, $this->prod_price, $this->prod_description, $this->prod_image, $this->prod_image_file, $this->cat_name);
    }
  }

  public function editProduct(){
    if($this->emptyInput()){
      header("location: ../index.php?error=emptyinput");
      exit();
    }
    if($this->invalidName()){
      header("location: ../index.php?error=invalidname");
      exit();
    }
    $this->updateProduct($this->prod_name, $this->prod_price, $this->prod_description, $this->prod_image, $this->prod_image_file, $this->cat_name, $this->prod_id);
  }

  public function getCatName($cat_id){
    $cat_name = $this->readCatName($cat_id);
    return $cat_name;
  }

  // error handlers

  private function emptyInput(){
    if(empty($this->prod_name) || empty($this->prod_price) || empty($this->prod_image) || empty($this->cat_name)){
      return true;
    }else{
      return false;
    }
  }

  private function invalidName(){
    if(!preg_match("/[a-zA-Z]$/",$this->prod_name)){
      return true;
    }else{
      return false;
    }
  }
}