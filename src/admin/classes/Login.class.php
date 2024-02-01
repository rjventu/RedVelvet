<?php

class Login extends Database{

  protected function getUser($email, $pass){
    $query = 'SELECT admin_password FROM admin WHERE admin_email = ?;';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($email))){
      $stmt = null;
      return "Error: Statement failed.";
    }

    if($stmt->rowCount() == 0){
      $stmt = null;
      return "Error: User not found.";
    }

    $passHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $checkPass = password_verify($pass, $passHashed[0]["admin_password"]);

    if(!$checkPass){
      $stmt = null;
      return "Error: Incorrect password.";
    }elseif($checkPass){
      $query = 'SELECT * FROM admin WHERE admin_email = ? AND admin_password = ?;';
      $stmt = $this->connect()->prepare($query);

      if(!$stmt->execute(array($email, $passHashed[0]["admin_password"]))){
        $stmt = null;
        return "Error: Statement failed.";
      }

      if($stmt->rowCount() == 0){
        $stmt = null;
        return "Error: User not found.";
      }

      $admin = $stmt->fetchAll(PDO::FETCH_ASSOC);

      session_start();
      $_SESSION["adminid"] = $admin[0]["admin_id"];
      $_SESSION["adminfname"] = $admin[0]["admin_fname"];

      $stmt = null;
      return "";
    }
  }
}