<?php

class Login extends Database{

  protected function getUser($email, $pass){
    $query = 'SELECT admin_password FROM admin WHERE admin_email = ?;';
    $stmt = $this->connect()->prepare($query);

    if(!$stmt->execute(array($email))){
      $stmt = null;
      header("location: ../index.php?error=stmtfailed");
      exit();
    }

    if($stmt->rowCount() == 0){
      $stmt = null;
      header("location: ../index.php?error=usernotfound1");
      exit();
    }

    $passHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $checkPass = password_verify($pass, $passHashed[0]["admin_password"]);

    if(!$checkPass){
      $stmt = null;
      header("location: ../index.php?error=wrongpass");
      exit();
    }elseif($checkPass){
      $query = 'SELECT * FROM admin WHERE admin_email = ? AND admin_password = ?;';
      $stmt = $this->connect()->prepare($query);

      if(!$stmt->execute(array($email, $passHashed[0]["admin_password"]))){
        $stmt = null;
        header("location: ../index.php?error=stmtfailed");
        exit();
      }

      if($stmt->rowCount() == 0){
        $stmt = null;
        header("location: ../index.php?error=usernotfound2");
        exit();
      }

      $admin = $stmt->fetchAll(PDO::FETCH_ASSOC);

      session_start();
      $_SESSION["adminid"] = $admin[0]["admin_id"];
      $_SESSION["adminemail"] = $admin[0]["admin_email"];

      $stmt = null;
    }
  }
}
?>