<!doctype html>
<html lang="en">

<!-- Head -->
<?php include("head-tags.php")?>
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
    <div class="row mb-2">
      <form class="container" action="includes/login.inc.php" method="post">
        <div class="row mb-5">
          <div class="col d-flex justify-content-center my-3">
            <input type="email" id="email" name="email" placeholder="Email">
          </div>
          <div class="col d-flex justify-content-center my-3">
            <input type="password" id="password" name="pass" placeholder="Password">
          </div>
        </div>
        <div class="row mb-1">
          <div class="col d-flex justify-content-center">
            <input type="submit" name="submit" value="LOGIN" class="btn">
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
</section>

</body>

</html>

