<!doctype html>
<html lang="en">

<!-- Head -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- Custom styles -->
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/x-icon" href="assets/favicon.jpg">
    
    <!-- DataTables -->
    <link href=https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/css/dataTables.bootstrap4.min.css rel=stylesheet>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/jquery.dataTables.min.js></script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/dataTables.bootstrap4.min.js></script>

    <title>Red Velvet KH</title>
</head>
  
<body>

<!-- Header -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <a class="navbar-brand" href="src/main/home.php">
            <img src="assets/logo.png" width="250" height="50" alt="">
          </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ml-auto">
              <a class="nav-link" id="active" href="src/main/home.php">HOME</a>
            </li>
            <li class="nav-item ml-auto">
              <a class="nav-link" href="src/main/about.php">ABOUT US</a>
            </li>
            <li class="nav-item dropdown ml-auto ">
              <a class="nav-link dropdown-toggle" href="src/main/menu.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                MENU
              </a>
              <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="src/main/menu-sigcakes.php">SIGNATURE CAKES</a>
                <a class="dropdown-item" href="src/main/menu-cakedel.php">CAKE DELIGHTS</a>
                <a class="dropdown-item" href="src/main/menu-cheese.php">CHEESECAKES</a>
                <a class="dropdown-item" href="src/main/menu-pastries.php">PASTRIES</a>
                <a class="dropdown-item" href="src/main/menu-cupcakes.php">CUPCAKES</a>
                <a class="dropdown-item" href="src/main/menu-cookies.php">COOKIES</a>
                <a class="dropdown-item" href="src/main/menu-bars.php">BARS</a>
              </div>
            </li>
            <li class="nav-item ml-auto">
                <a class="nav-link" href="src/main/contact.php">CONTACT</a>
            </li>
            <li class="nav-item ml-auto">
                <a class="btn" href="src/main/order.php" role="button">ORDER</a>
            </li>
            
          </ul>
        </div>
    </nav>
</header>

<section class="ban">
    <article>
        <div>
            <h1>Gourmet <br>
                sweet <br>
                treats</h1>
            <p>
                Craving something sweet? <br>
                Check out our menu and order now!
            </p>
            <a class="btn" href="src/main/menu.php" role="button" id="problem-btn">MENU</a>
            <a class="btn" href="src/main/order.php" role="button">ORDER NOW</a>    
        </div>
    </article>
    <a data-toggle="modal" data-target="#bannertopModalCenter">
        <img src="assets/food/oreo brown.jpg">
    </a>
</section>
<section class="infosect">
    <img src="assets/logo2.png">
    <div class="intro">
        <p>
            Need a fix for your pastry addiction? Red Velvet's got you covered! Started in 2015
            to provide delicious homemade sweets, cakes, and pastries to the city of Phnom
            Penh. What once started as a hobby has now become a successful business that
            slowly grew into the popular bakery it is today.
        </p>
        <a class="btn" href="src/main/about.php" role="button">LEARN MORE</a>
    </div>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="assets/food/car1.jpg" alt="First slide">
          </div>
          <div class="carousel-item">
            <img src="assets/food/car2.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img src="assets/food/car3.jpg" alt="Third slide">
          </div>
          <div class="carousel-item">
            <img src="assets/food/car4.jpg" alt="Third slide">
          </div>
          <div class="carousel-item">
            <img src="assets/food/car5.jpg" alt="Third slide">
          </div>
        </div>
      </div>
</section>
<section class="recban">
    <article class="reccol">
        <a data-toggle="modal" data-target="#redvelModalCenter">
            <img src="assets/food/redvelvet cheesecake bar.jpg">
        </a>
        <div class="itemdesc">
            <div class="itemhead">
                <h2>Red Velvet <br>
                    Cheesecake
                </h2>
                <h3>
                    $12 <br>
                    per box <br>
                    of 12
                </h3>
            </div>
            <p>
                Hungry for brownies and cheesecake? You can get
                both with our bestselling premium brownie bars now,
                a signature of Red Velvet.
            </p>
        </div>
    </article>
    <article class="reccol"  id="redcol">
        <div class="itemdesc">
            <div class="itemhead">
                <h2>Butterscrotch <br>
                    w/ cashew <br>
                    nuts/almonds
                </h2>
                <h3>
                    $8 <br>
                    per box <br>
                    of 12/16
                </h3>
            </div>
            <p>
                Want something light and delicious to snack on? Try
                our bestselling Butterscotch brownies with cashew
                nuts/almonds! It's a classic!
            </p>
        </div>
        <a data-toggle="modal" data-target="#butternutModalCenter">
            <img src="assets/food/butterscoth w nuts.jpg">
        </a>
    </article>
</section>
<section class="cards">
    <article class="card">
        <img src="assets/fast-charge.png">
        <h1>Quick 
            <br>& Easy</h1>
        <p>
            Just fill out the form, or contact us through
            Facebook. We'll deliver it, and you'll receive
            your order!
        </p>
    </article>
    <article class="card">
        <img id="homepic" src="assets/home.png">
        <h1 id="home">Home made!</h1>
        <p>
            Red Velvet is 100% homemade and baked
            with love and care. From our cakes to
            our bronwies to our loaves!
        </p>
    </article>
    <article class="card">
        <img src="assets/fast-delivery.png">
        <h1>Grab & Nham24</h1>
        <p>
            Don't worry, we provide delivery via
            Grab/Nham24 to your location, as long as
            it's in Phnom Penh!
        </p>
    </article>
</section>

</body>

<!-- Footer -->
<footer>
  <div class="footer-table">
      <table>
          <tr>
              <th>Address</th>
              <th>Operating Hours</th>
              <th>Follow Us</th>
          </tr>
          <tr>
              <td>#145 Ta Phon,</td>
              <td>All week</td>
              <td>
                  <img src="assets/social icons.png" usemap="#social-map" width="50px">
              </td>
          </tr>
          <tr>
              <td>12 BT St. 12351</td>
              <td>8 AM - 7 PM</td>
              <td><a href="src\admin\admin-login.php">Admin Login</a></td>
          </tr>
      </table>
  </div>
  <p>Copyright © 2023 Red Velvet KH 2015</p>
</footer>
<map name="social-map">
    <area shape="rect" coords="0,12,21,36" href="https://web.facebook.com/RedVelvetKH">
    <area shape="rect" coords="29,13,50,37" href="https://instagram.com/redvelvetkh?igshid=ZmZhODViOGI=">
</map>

</html>

