<?php

include("../admin/classes/Database.class.php");
include("../admin/classes/Product.class.php");
include("../admin/classes/ProductCon.class.php"); 

$product = new ProductController();
$result = $product->getTable();

?>

<!doctype html>
<html lang="en">

<!-- Head -->
<?php include("head-tags.php")?>
    <title>Red Velvet KH - Menu</title>
</head>
  
<body>

<!-- Header -->
<?php include("header.php")?>

<section class="menu-banner">
    <div>
        <h1>Menu</h1>
    </div>
    <p>Please pre-order at least 2 days in advance.</p>
</section>

<section>
    <div class="container-fluid new-menu-lay">
        <div class="row justify-content-center">
            <div class="container">
                <div class="row justify-content-left">
                    <?php                            
                            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                                echo 
                                "
                                <div class='menu-card' style='margin-left: 0.9rem; margin-right: 0.9rem;'>
                                    <div class='image-container'>
                                        <a href='menu-sigcakes.php'>
                                            <img class='card-img' src='../../assets/uploads/" . $row["prod_image_file"] . "'>
                                            <div class='overlay overlay--blur'>
                                                <div class='overlay-content'>
                                                    <h2>" . $row["prod_name"] . "</h2>
                                                    <h3>" . $row["prod_price"] . "</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class='card-desc'>
                                        <h2>Signature Cakes</h2>
                                    </div>
                                </div>
                                ";
                            }  
                    ?>
                </div>  
            </div>
        </div>
    </div>
</section>


<!-- <section class="menu-lay">
    <div class="menu-card">
        <div class="image-container">
            <a href="menu-sigcakes.php">
                <img class="card-img" src="../../assets/food/menu-sigcake.avif">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h2>Signature Cakes</h2>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h2>Signature Cakes</h2>
        </div>
    </div>
    <div class="menu-card">
        <div class="image-container">
            <a href="menu-cakedel.php">
                <img class="card-img" src="../../assets/food/menu-delcake.avif">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h2>Cake Delights</h2>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h2>Cake Delights</h2>
        </div>
    </div>
    <div class="menu-card">
        <div class="image-container">
            <a href="menu-cheese.php">
                <img class="card-img" src="../../assets/food/menu-cheese.avif">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h2>Cheesecakes</h2>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h2>Cheesecakes</h2></a>
        </div>
    </div>
    <div class="menu-card">
        <div class="image-container">
            <a href="menu-pastries.php">
                <img class="card-img" src="../../assets/food/menu-pastries.avif">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h2>Pastries</h2>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h2>Pastries</h2>
        </div>
    </div>
    <div class="menu-card">
        <div class="image-container">
            <a href="menu-cupcakes.php">
                <img class="card-img" src="../../assets/food/menu-cupcakes.avif">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h2>Cupcakes</h2>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h2>Cupcakes</h2>
        </div>
    </div>
    <div class="menu-card">
        <div class="image-container">
            <a href="menu-cookies.php">
                <img class="card-img" src="../../assets/food/menu-cookies.avif">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h2>Cookies</h2>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h2>Cookies</h2>
        </div>
    </div>
    <div class="menu-card">
        <div class="image-container">
            <a href="menu-bars.php">
                <img class="card-img" src="../../assets/food/menu-bars.avif">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h2>Bars</h2>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h2>Bars</h2>
        </div>
    </div>
</section> -->

</body>

<!-- Footer -->
<?php include('footer.php') ?>

<!-- Inquiry Button -->
<?php include('inquiry.php') ?>


</html>

