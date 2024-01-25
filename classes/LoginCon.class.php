<?php

class LoginController extends Login{

  private $email;
  private $pass;

  public function __construct($email, $pass){
    $this->email = $email;
    $this->pass = $pass;
  }

  public function loginAdmin(){
    if($this->emptyInput()){
      header("location: ../index.php?error=emptyinput");
      exit();
    }
    $this->getUser($this->email, $this->pass);
  }

  // Error Handlers

  private function emptyInput(){
    if(isset($this->email) && isset($this->pass)){
      return false;
    }else{
      return true;
    }
  }

}

?>