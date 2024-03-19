<?php

class OrderController extends Order{
  private $order_id;
  private $order_name;
  private $order_email;
  private $order_contact;
  private $order_add;
  private $order_date;
  private $order_pay;
  private $order_time;
  
  public function __construct($order_id=null, $order_name=null, $order_email=null, $order_contact=null, $order_add=null, $order_date=null, $order_pay=null, $order_time=null){
    $this->order_id = $order_id;
    $this->order_name = $order_name;
    $this->order_email = $order_email;
    $this->order_contact = $order_contact;
    $this->order_add = $order_add;
    $this->order_date = $order_date;
    $this->order_pay = $order_pay;
    $this->order_time = $order_time;
  }

  public function getTable(){
    $result = $this->readOrderTable();
    return $result;
  }

  public function getRecord($order_id){
    $result = $this->readOrderRecord($order_id);
    return $result;
  }

  public function addOrder(){
    if($this->invalidName()){
      return "Error: Invalid name! Valid characters include A-Z and a-z.";
    }else{
      return $this->createOrder($this->order_name, $this->order_email, $this->order_contact, $this->order_add, $this->order_date, $this->order_pay, $this->order_time);
    }
  }

  // error handlers

  private function emptyInput(){
    if(empty($this->prod_name) || empty($this->prod_price) || empty($this->cat_name)){
      return true;
    }else{
      return false;
    }
  }

  private function invalidName(){
    if(!preg_match("/[a-zA-Z]$/",$this->order_name)){
      return true;
    }else{
      return false;
    }
  }
}