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

?>

<!doctype html>
<html lang="en">

<!-- Head -->
<?php include("..\main\head-tags.php")?>
  <title>Red Velvet KH - Admin Login</title>
</head>
  
<body>

<!-- Admin Panel Header -->
<?php include("admin-header.php")?>


<section class="login-wrapper d-flex align-items-center">
  <div class="login-form col-md-5 p-5">
    <div class="row">
      <div class="col">
        <h2 class="text-center my-5">Welcome back, Admin!</h2>
      </div>
    </div>
    <div class="row mb-4">
        <div class="col d-flex justify-content-center">
          <!-- Displays error/success message -->
          <?php  
            if(!empty($success_msg)){ 
            ?> 
            <span class="alert alert-success"><?php echo $success_msg; ?></span> 
            <?php  
            }
            if (!empty($error_msg)){
            ?> 
            <span class="alert alert-danger"><?php echo $error_msg; ?></span> 
            <?php  
            }
          ?>
        </div>
      </div>
    <div class="row mb-2">
      <form class="container" action="admin-login.php" method="post">
        <div class="row mb-5">
          <div class="col d-flex justify-content-center my-3">
            <input type="email" id="email" name="email" placeholder="Email" required>
          </div>
          <div class="col d-flex justify-content-center my-3">
            <input type="password" id="password" name="pass" placeholder="Password" required>
          </div>
        </div>
        <div class="row mb-1">
          <div class="col d-flex justify-content-center">
            <input type="submit" name="submit" value="LOGIN" class="btn">
          </div>
        </div>
        <div class="row">
          <div class="col d-flex justify-content-center">
            <a class="mt-3" href="..\main\index.php" style="color:gray;">Go back</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

</body>

</html>

