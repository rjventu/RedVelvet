<?php
class Database{

  protected function connect(){
    try {
      $username = "root";
      $password = "";
      $dbh = new PDO('mysql:host=localhost;dbname=redvelvet',$username,$password);
      return $dbh;
    } 
    catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
  }
}
