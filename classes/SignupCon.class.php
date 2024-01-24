<?php

class SignupController extends Signup{

  private $email;
  private $pass;
  private $passRepeat;
  private $fname;
  private $lname;

  public function __construct($email, $pass, $passRepeat, $fname, $lname){
    $this->email = $email;
    $this->pass = $pass;
    $this->passRepeat = $passRepeat;
    $this->fname = $fname;
    $this->lname = $lname;
  }

  public function signupAdmin(){
    if($this->emptyInput()){
      header("location: ../index.php?error=emptyinput");
      exit();
    }
    if($this->invalidName()){
      header("location: ../index.php?error=invalidname");
      exit();
    }
    if($this->invalidEmail()){
      header("location: ../index.php?error=invalidemail");
      exit();
    }
    if($this->noMatch()){
      header("location: ../index.php?error=nomatch");
      exit();
    }
    if($this->userExists()){
      header("location: ../index.php?error=userexists");
      exit();
    }

    $this->setUser($this->email, $this->pass, $this->fname, $this->lname);
  }

  // Error Handlers

  private function emptyInput(){
    if(empty($this->email) || empty($this->pass) || empty($this->passRepeat) || empty($this->fname) || empty($this->lname)){
      return true;
    }else{
      return false;
    }
  }

  private function invalidName(){
    if(preg_match("/^[a-zA-Z]/",$this->fname) || preg_match("/^[a-zA-Z]/",$this->lname)){ // not working!!! debug
      return true;
    }else{
      return false;
    }
  }

  private function invalidEmail(){
    if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
      return true;
    }else{
      return false;
    }
  }
  
  private function noMatch(){
    if($this->pass !== $this->passRepeat){
      return true;
    }else{
      return false;
    }
  }

  private function userExists(){
    if($this->checkUser($this->email)){
      return true;
    }else{
      return false;
    }
  }

}

?>