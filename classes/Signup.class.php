<?php

class Signup extends Database{

  protected function checkUser($email){
    $query = 'SELECT admin_email FROM admin WHERE admin_email = ?;';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($email))){
      $stmt = null;
      header("location: ../index.php?error=stmtfailed");
      exit();
    }

    if($stmt->rowCount() > 0){
      $stmt = null;
      return true;
    }else{
      $stmt = null;
      return false;
    }
  }

  protected function setUser($email, $pass, $fname, $lname){
    $query = 'INSERT INTO admin (admin_email, admin_password, admin_fname, admin_lname) VALUES (?, ?, ?, ?);';
    $stmt = $this->connect()->prepare($query);

    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

    if(!$stmt->execute(array($email, $hashedPass, $fname, $lname))){
      $stmt = null;
      header("location: ../index.php?error=stmtfailed");
      exit();
    }

    $stmt = null;
  }
}