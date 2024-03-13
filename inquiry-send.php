<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

function emptyInput(){
  if(isset($_POST['email']) && isset($_POST['name']) && isset($_POST['subject']) && isset($_POST['message'])){
    return false;
  }else{
    return true;
  }
}

function invalidEmail(){
  if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    return true;
  }else{
    return false;
  }
}

if(isset($_POST['send'])){

  if(emptyInput()){
    echo  "<script>alert('Error: Please complete all fields.');</script>";
    exit();
  }else if(invalidEmail()){
    echo  "<script>alert('Error: Please input a valid email address.');</script>";
    exit();
  }else{
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    $messageNew = "Sender name: " . $name . "<br/>Sender email address: " . $email . "<br/><br/>" . $message;
    
    $mail = new PHPMailer(true);
    
    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->Username = 'redvelvetkh.inq@gmail.com';
    $mail->Password = 'yiixoayxgesgjovh';
    
    $mail->setFrom('from@example.com');
    $mail->addAddress('redvelvetkh.inq@gmail.com');
    
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $messageNew;
        
    if(!$mail->send()){
      echo "<script>alert('Mail not sent: ". $mail->ErrorInfo . "');</script>";
    }else{
      echo
      "
      <script>
      alert('Message sent!');
      document.location.href = 'src/main/index.php';
      </script>
      ";
    }
  }
}