<?php

class ProductController extends Product{
  private $cat_name;

  public function __construct($cat_name = none){
    $this->cat_name = $cat_name;
  }

  public function getTable(){
    $result = $this->getProducts();
    return $result;
  }
}