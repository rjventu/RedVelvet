<!doctype html>
<html lang="en">

<!-- Head -->
<?php include("head-tags.php")?>
  <title>Red Velvet KH - Admin Login</title>
</head>
  
<body>

<header>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
      <a class="navbar-brand" href="index.php">
        <img src="assets/logo.png" width="250" height="50" alt="">
        </a>
  </nav>
</header>

  <section class="login-wrapper">
    <div class="login-form">
        <h2>Welcome back, Admin!</h2>
        <form class="login-details">
            <div>
                <input type="email" id="email" name="email" placeholder="Email">
            </div>
            <div>
            <input type="password" id="password" name="password" placeholder="Password">
            </div>
        </form>
        <div class="login-links">
            <input type="submit" value="LOGIN" class="btn">
            <a href="index.php">Go back</a>
        </div>
      </div>
  </section>

</body>

</html>

