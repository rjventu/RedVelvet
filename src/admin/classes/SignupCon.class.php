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
      return "Error: Please complete all fields.";
    }
    if($this->invalidName()){
      return "Error: Invalid name! Valid characters include A-Z and a-z.";
    }
    if($this->invalidEmail()){
      return "Error: Please input a valid email address.";
    }
    if($this->noMatch()){
      return "Error: Your passwords are not matching.";
    }
    if($this->userExists()){
      return "Error: This email already has a registered account.";
    }

    return $this->setUser($this->email, $this->pass, $this->fname, $this->lname);
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
    if(!preg_match("/^[a-zA-Z]$/",$this->fname) || !preg_match("/^[a-zA-Z]$/",$this->lname)){
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