<!doctype html>
<html lang="en">

<!-- Head -->
<?php include("head-tags.php")?>
    <title>Red Velvet KH</title>
</head>
  
<body>

<!-- Header -->
<?php include("header.php")?>

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
            <a class="btn" href="menu.php" role="button" id="problem-btn">MENU</a>
            <a class="btn" href="order.php" role="button">ORDER NOW</a>    
        </div>
    </article>
    <a data-toggle="modal" data-target="#bannertopModalCenter">
        <img src="../../assets/food/oreo brown.jpg">
    </a>
</section>
<section class="infosect">
    <img src="../../assets/logo2.png">
    <div class="intro">
        <p>
            Need a fix for your pastry addiction? Red Velvet's got you covered! Started in 2015
            to provide delicious homemade sweets, cakes, and pastries to the city of Phnom
            Penh. What once started as a hobby has now become a successful business that
            slowly grew into the popular bakery it is today.
        </p>
        <a class="btn" href="about.php" role="button">LEARN MORE</a>
    </div>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../../assets/food/car1.jpg" alt="First slide">
          </div>
          <div class="carousel-item">
            <img src="../../assets/food/car2.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img src="../../assets/food/car3.jpg" alt="Third slide">
          </div>
          <div class="carousel-item">
            <img src="../../assets/food/car4.jpg" alt="Third slide">
          </div>
          <div class="carousel-item">
            <img src="../../assets/food/car5.jpg" alt="Third slide">
          </div>
        </div>
      </div>
</section>
<section class="recban">
    <article class="reccol">
        <a data-toggle="modal" data-target="#redvelModalCenter">
            <img src="../../assets/food/redvelvet cheesecake bar.jpg">
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
            <img src="../../assets/food/butterscoth w nuts.jpg">
        </a>
    </article>
</section>
<section class="cards">
    <article class="card">
        <img src="../../assets/fast-charge.png">
        <h1>Quick 
            <br>& Easy</h1>
        <p>
            Just fill out the form, or contact us through
            Facebook. We'll deliver it, and you'll receive
            your order!
        </p>
    </article>
    <article class="card">
        <img id="homepic" src="../../assets/home.png">
        <h1 id="home">Home made!</h1>
        <p>
            Red Velvet is 100% homemade and baked
            with love and care. From our cakes to
            our bronwies to our loaves!
        </p>
    </article>
    <article class="card">
        <img src="../../assets/fast-delivery.png">
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
<?php include('footer.php') ?>

<!-- Inquiry Button -->
<?php include('inquiry.php') ?>

</html>

