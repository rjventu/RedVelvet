<!doctype html>
<html lang="en">

<!-- Head -->
<?php include("head-tags.php")?>
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
          <h2 class="text-center">Create An Admin Account</h2>
        </div>
      </div>
      <div class="row">
        <form class="container" action="includes/signup.inc.php" method="post">
          <div class="row mb-4">
            <div class="col d-flex justify-content-center">
              <input type="email" id="email" name="email" placeholder="Email">
            </div>
          </div>
          <div class="row mb-4">
            <div class="col d-flex justify-content-center">
              <input type="password" id="password" name="pass" placeholder="Password">
            </div>
          </div>
          <div class="row mb-4">
            <div class="col d-flex justify-content-center">
                <input type="password" id="password" name="passRepeat" placeholder="Repeat Password">
            </div>
          </div>
          <div class="row mb-4">
            <div class="col d-flex justify-content-center">
              <input type="text" id="fname" name="fname" placeholder="First Name">
            </div>
          </div>
          <div class="row mb-5">
            <div class="col d-flex justify-content-center">
              <input type="text" id="lname" name="lname" placeholder="Last Name">
            </div>
          </div>
          <div class="row mb-1">
            <div class="col d-flex justify-content-center">
              <input type="submit" name="submit" value="CREATE ACCOUNT" class="btn">
            </div>
          </div>
          <div class="row">
            <div class="col d-flex justify-content-center">
              <a class="mt-3" href="index.php" style="color:gray;">Go back</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

</body>

</html>

