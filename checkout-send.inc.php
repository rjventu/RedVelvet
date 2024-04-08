<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$name = $order_name;
$email = $order_email;
$subject = "ORDER ID: " . $order_id;
$messageNew = $message;

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
}
