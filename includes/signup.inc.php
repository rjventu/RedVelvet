<?php

if(isset($_POST["submit"]))
{
  $email = $_POST["email"];
  $pass = $_POST["pass"];
  $passRepeat = $_POST["passRepeat"];
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];

  include("../classes/Database.class.php");
  include("../classes/Signup.class.php");
  include("../classes/SignupCon.class.php");

  $signup = new SignupController($email, $pass, $passRepeat, $fname, $lname);
  $signup->signupAdmin();

  header("location: ../index.php?error=none");

}
