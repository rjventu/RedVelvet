<?php include("includes/admin-signup.inc.php");?>

<!doctype html>
<html lang="en">

<!-- Head -->
<?php include("..\main\head-tags.php")?>
  <title>Red Velvet KH - Admin Signup</title>
</head>
  
<body>

<!-- Admin Panel Header -->
<?php include("admin-header.php")?>

<section class="signup-wrapper">
  <div class="signup-form">
    <div class="container">
      <div class="row mb-4">
        <div class="col">
          <h2 class="text-center">Create New <br/>Admin Account</h2>
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
      <div class="row">
        <form class="container" action="admin-signup.php" method="post">
          <div class="row mb-4">
            <div class="col d-flex justify-content-center">
              <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col d-flex justify-content-center">
              <input type="password" id="password" name="pass" placeholder="Password" required>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col d-flex justify-content-center">
                <input type="password" id="password" name="passRepeat" placeholder="Repeat Password" required>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col d-flex justify-content-center">
              <input type="text" id="fname" name="fname" placeholder="First Name" required>
            </div>
          </div>
          <div class="row mb-5">
            <div class="col d-flex justify-content-center">
              <input type="text" id="lname" name="lname" placeholder="Last Name" required>
            </div>
          </div>
          <div class="row mb-1">
            <div class="col d-flex justify-content-center">
              <input type="submit" name="submit" value="CREATE ACCOUNT" class="btn">
            </div>
          </div>
          <div class="row">
            <div class="col d-flex justify-content-center">
              <a class="mt-3" href="admin-panel.php" style="color:gray;">Go back</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

</body>

</html>

