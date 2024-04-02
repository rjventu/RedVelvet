<?php 
$success_msg = $error_msg = "";

if(isset($_POST["submit"]))
{
  $email = $_POST["email"];
  $pass = $_POST["pass"];

  include("classes/Database.class.php");
  include("classes/Login.class.php");
  include("classes/LoginCon.class.php");

  $login = new LoginController($email, $pass);
  $error_msg = $login->loginAdmin();

  if(empty($error_msg)){
    header("location: admin-panel.php");
  }
}