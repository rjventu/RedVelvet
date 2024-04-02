<?php
class ItemController extends Item{
  private $item_id;
  private $item_name;
  private $item_price;
  private $item_variety;
  private $item_qty;
  private $order_id;
  
  public function __construct($item_id=null, $item_name=null, $item_price=null, $item_variety=null, $item_qty=null, $order_id=null){
    $this->item_id = $item_id;
    $this->item_name = $item_name;
    $this->item_price = $item_price;
    $this->item_variety = $item_variety;
    $this->item_qty = $item_qty;
    $this->order_id = $order_id;
  }

  public function getTable(){
    $result = $this->readItemTable($this->order_id);
    return $result;
  }

  public function addItem(){
    return $this->createItem($this->item_id, $this->item_name, $this->item_price, $this->item_variety, $this->item_qty, $this->order_id);
  }

}