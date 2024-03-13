<?php

include("../admin/classes/Database.class.php");
include("../admin/classes/Product.class.php");
include("../admin/classes/ProductCon.class.php"); 

$product = new ProductController();
$result = $product->getCatTable("Cookies");

?>

<!doctype html>
<html lang="en">

<!-- Head -->
<?php include("head-tags.php")?>
    <title>Red Velvet KH - Cookies</title>
</head>
  
<body>

<!-- Header -->
<?php include("header.php")?>
    
<section class="menu-banner">
    <div>
        <h1>Cookies</h1>
    </div>
    <p>8 large pcs per order</p>
</section>

<section>
    <div class="container-fluid new-menu-lay">
        <div class="row justify-content-center">
            <div class="container">
                <div class="row justify-content-around ml-5 mr-5 pl-5 pr-5">
                    <?php                            
                            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                                
                                $bestseller = $row["bestseller"];

                                echo "
                                <div class='menu-card'>
                                    <div class='image-container'>
                                        <a href='menu-view.php?id=" . $row["prod_id"] . "'>
                                            <img class='card-img' src='../../assets/uploads/" . $row["prod_image_file"] . "'>
                                            <div class='overlay overlay--blur'>
                                                <div class='overlay-content'>"; 
                                                    echo $bestseller == 'Y' ? '<h4>Bestseller!</h4>' : '';
                                                    echo "
                                                    <h2>" . $row["prod_name"] . "</h2>
                                                    <h3>$" . $row["prod_price"] . "</h3>
                                                </div>
                                            </div>
                                        </a>
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
            <a data-toggle="modal" data-target="#cookiesdoublechocoModalCenter">
                <img class="card-img" src="../../assets/food/cookies-doublechoco.jpg">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h4>Bestseller!</h4>
                        <h2>Double Choco</h2>
                        <h3>$6</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h4>Bestseller!</h4>
            <h2>Double Choco</h2>
            <h3>$6</h3>
        </div>
    </div>
    <div class="menu-card">
        <div class="image-container">
            <a data-toggle="modal" data-target="#cookiesclassicModalCenter">
                <img class="card-img" src="../../assets/food/cookies-classicchocochip.jpg">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h4>Bestseller!</h4>
                        <h2>Classic Choco Chip</h2>
                        <h3>$6</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h4>Bestseller!</h4>
            <h2>Classic Choco Chip</h2>
            <h3>$6</h3>
        </div>
    </div>
    <div class="menu-card">
        <div class="image-container">
            <a data-toggle="modal" data-target="#cookiesfilledModalCenter">
                <img class="card-img" src="../../assets/food/cookies-filled.jpg">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h2>Cream Cheese-Filled</h2>
                        <h3>$6</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h2>Cream Cheese-Filled</h2>
            <h3>$6</h3>
        </div>
    </div>
    <div class="menu-card">
        <div class="image-container">
            <a data-toggle="modal" data-target="#cookiesredvelModalCenter">
                <img class="card-img" src="../../assets/food/cookies-redvel.jpg">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h2>Red Velvet Choco Chip</h2>
                        <h3>$6</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h2>Red Velvet Choco Chip</h2>
            <h3>$6</h3>
        </div>
    </div>
</section> -->

</body>

<!-- Footer -->
<?php include('footer.php') ?>

<!-- Inquiry Button -->
<?php include('inquiry.php') ?>

<!-- Menu Modal -->
<!-- <div class="modal fade" id="cookiesdoublechocoModalCenter" tabindex="-1" role="dialog" aria-labelledby="cookiesdoublechocoModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog mw-100 w-50 modal-dialog-centered" role="document">
        <div class="modal-content d-flex flex-row" id="menu-modal">
            <img src="../../assets/food/cookies-doublechoco.jpg">
            <div class="itm-modal-right">
                <div class="itm-desc">
                    <h2>Double Choco</h2>
                    <h4>Bestseller!</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.  
                    </p> 
                </div>
                <div class="price-cart">
                    <h3>$6</h3>
                    <a class="btn" href="#" role="button">+ CART</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="cookiesclassicModalCenter" tabindex="-1" role="dialog" aria-labelledby="cookiesclassicModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog mw-100 w-50 modal-dialog-centered" role="document">
        <div class="modal-content d-flex flex-row" id="menu-modal">
            <img src="../../assets/food/cookies-classicchocochip.jpg">
            <div class="itm-modal-right">
                <div class="itm-desc">
                    <h2>Classic Choco Chip</h2>
                    <h4>Bestseller!</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.  
                    </p> 
                </div>
                <div class="price-cart">
                    <h3>$6</h3>
                    <a class="btn" href="#" role="button">+ CART</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="cookiesfilledModalCenter" tabindex="-1" role="dialog" aria-labelledby="cookiesfilledModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog mw-100 w-50 modal-dialog-centered" role="document">
        <div class="modal-content d-flex flex-row" id="menu-modal">
            <img src="../../assets/food/cookies-filled.jpg">
            <div class="itm-modal-right">
                <div class="itm-desc">
                    <h2>Cream Cheese-Filled</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.  
                    </p> 
                </div>
                <div class="price-cart">
                    <h3>$6</h3>
                    <a class="btn" href="#" role="button">+ CART</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="cookiesredvelModalCenter" tabindex="-1" role="dialog" aria-labelledby="cookiesfilledModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog mw-100 w-50 modal-dialog-centered" role="document">
        <div class="modal-content d-flex flex-row" id="menu-modal">
            <img src="../../assets/food/cookies-redvel.jpg">
            <div class="itm-modal-right">
                <div class="itm-desc">
                    <h2>Red Velvet Choco Chip</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.  
                    </p> 
                </div>
                <div class="price-cart">
                    <h3>$6</h3>
                    <a class="btn" href="#" role="button">+ CART</a>
                </div>
            </div>
        </div>
    </div>
</div> -->

</html>

