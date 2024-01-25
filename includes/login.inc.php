<?php

if(isset($_POST["submit"]))
{
  $email = $_POST["email"];
  $pass = $_POST["pass"];

  include("../classes/Database.class.php");
  include("../classes/Login.class.php");
  include("../classes/LoginCon.class.php");

  $login = new LoginController($email, $pass);
  $login->loginAdmin();

  header("location: ../admin-panel.php");
}

?>