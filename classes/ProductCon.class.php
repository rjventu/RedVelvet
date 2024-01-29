<?php

class ProductController extends Product{
  private $prod_id;
  private $prod_name;
  private $prod_price;
  private $prod_description;
  private $prod_image;
  private $cat_name;
  
  public function __construct($prod_name=null, $prod_price=null, $prod_description=null, $prod_image=null, $cat_name=null){
    $this->prod_name = $prod_name;
    $this->prod_price = $prod_price;
    $this->prod_description = $prod_description;
    $this->prod_image = $prod_image;
    $this->cat_name = $cat_name;
  }

  public function getTable(){
    $result = $this->readProduct();
    return $result;
  }

  public function getCatTable($cat_name){
    $result = $this->readCat($cat_name);
    return $result;
  }

  public function addProduct(){
    if($this->emptyInput()){
      header("location: ../index.php?error=emptyinput");
      exit();
    }
    if($this->invalidName()){
      header("location: ../index.php?error=invalidname");
      exit();
    }

    $this->createProduct($this->prod_name, $this->prod_price, $this->prod_description, $this->prod_image, $this->cat_name);
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
    if(preg_match("/^[a-zA-Z]$/",$this->prod_name)){
      return true;
    }else{
      return false;
    }
  }
}