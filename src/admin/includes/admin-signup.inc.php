<?php 
session_start();

if(!isset($_SESSION["adminid"])){
  header("location: admin-login.php");
}
else
{
  $success_msg = $error_msg = "";

  if(isset($_POST["submit"]))
  {
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $passRepeat = $_POST["passRepeat"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];

    include("classes/Database.class.php");
    include("classes/Signup.class.php");
    include("classes/SignupCon.class.php");

    $signup = new SignupController($email, $pass, $passRepeat, $fname, $lname);
    $error_msg = $signup->signupAdmin();

    if(empty($error_msg)){
      $success_msg = "Account created successfully!";
    }
  }
}
