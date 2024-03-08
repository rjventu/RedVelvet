<?php

include("../admin/classes/Database.class.php");
include("../admin/classes/Product.class.php");
include("../admin/classes/ProductCon.class.php"); 

$product = new ProductController();
$result = $product->getCatTable("Cake Delights");

?>

<!doctype html>
<html lang="en">

<!-- Head -->
<?php include("head-tags.php")?>
    <title>Red Velvet KH - Cake Delights</title>
</head>
  
<body>

<!-- Header -->
<?php include("header.php")?>

<section class="menu-banner">
    <div>
        <h1>Cake</h1><span>delights</span>
    </div>
    <p>6" | good for 6-10 people</p>
</section>

<section>
    <div class="container-fluid new-menu-lay">
        <div class="row justify-content-center">
            <div class="container">
                <div class="row justify-content-left">
                    <?php                            
                            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                                
                                $bestseller = $row["bestseller"];

                                echo "
                                <div class='menu-card' style='margin-left: 0.9rem; margin-right: 0.9rem;'>
                                    <div class='image-container'>
                                        <a href='menu-view.php?id=" . $row["prod_id"] . "'>
                                            <img class='card-img' src='../../assets/uploads/" . $row["prod_image_file"] . "'>
                                            <div class='overlay overlay--blur'>
                                                <div class='overlay-content'>"; 
                                                    echo $bestseller == 'Y' ? '<h4>Bestseller!</h4>' : '';
                                                    echo "
                                                    <h2>" . $row["prod_name"] . "</h2>
                                                    <h3>" . $row["prod_price"] . "</h3>
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
            <a data-toggle="modal" data-target="#delyemacakeModalCenter">
                <img class="card-img" src="../../assets/food/del-yemacake.jpg">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h4>Bestseller!</h4>
                        <h2>Yema Cake with Cheese</h2>
                        <h3>$14</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h4>Bestseller!</h4>
            <h2>Yema Cake with Cheese</h2>
            <h3>$14</h3>
        </div>
    </div>
    <div class="menu-card">
        <div class="image-container">
            <a data-toggle="modal" data-target="#delredvelcreamModalCenter">
                <img class="card-img" src="../../assets/food/del-redvelcream.jpg">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h4>Bestseller!</h4>
                        <h2>Red Velvet Cream</h2>
                        <h3>$14</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h4>Bestseller!</h4>
            <h2>Red Velvet Cream</h2>
            <h3>$14</h3>
        </div>
    </div>
    <div class="menu-card">
        <div class="image-container">
            <a data-toggle="modal" data-target="#delchocomochaModalCenter">
                <img class="card-img" src="../../assets/food/del-chocomocha.jpg">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h4>Bestseller!</h4>
                        <h2>Choco Mocha</h2>
                        <h3>$14</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h4>Bestseller!</h4>
            <h2>Choco Mocha</h2>
            <h3>$14</h3>
        </div>
    </div>
    <div class="menu-card">
        <div class="image-container">
            <a data-toggle="modal" data-target="#delchocooreoModalCenter">
                <img class="card-img" src="../../assets/food/del-chocooreo.jpg">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h2>Choco Oreo</h2>
                        <h3>$14</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h2>Choco Oreo</h2>
            <h3>$14</h3>
        </div>
    </div>
    <div class="menu-card">
        <div class="image-container">
            <a data-toggle="modal" data-target="#treslechescakeModalCenter">
                <img class="card-img" src="../../assets/food/treslechescake.jpg">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h2>Tres Leches with Cashew Nuts</h2>
                        <h3>$14</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h2>Tres Leches with Cashew Nuts</h2>
            <h3>$14</h3>
        </div>
    </div>
    <div class="menu-card">
        <div class="image-container">
            <a data-toggle="modal" data-target="#delpurpvelModalCenter">
                <img class="card-img" src="../../assets/food/del-purpvelcream.jpg">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h2>Purple Velvet Cream</h2>
                        <h3>$14</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h2>Purple Velvet Cream</h2>
            <h3>$14</h3>
        </div>
    </div>
    <div class="menu-card">
        <div class="image-container">
            <a data-toggle="modal" data-target="#chocvanfruitcakeModalCenter">
                <img class="card-img" src="../../assets/food/chocovanwfruits.jpg">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h2>Choco Vanilla with Fruits</h2>
                        <h3>$14</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h2>Choco Vanilla with Fruits</h2>
            <h3>$14</h3>
        </div>
    </div>
</section> -->

</body>

<!-- Footer -->
<?php include('footer.php') ?>

<!-- Inquiry Button -->
<?php include('inquiry.php') ?>

<!-- Menu Modal -->
<div class="modal fade" id="delyemacakeModalCenter" tabindex="-1" role="dialog" aria-labelledby="delyemacakeModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog mw-100 w-50 modal-dialog-centered" role="document">
        <div class="modal-content d-flex flex-row" id="menu-modal">
            <img src="../../assets/food/del-yemacake.jpg">
            <div class="itm-modal-right">
                <div class="itm-desc">
                    <h2>Yema Cake with Cheese</h2>
                    <h4>Bestseller!</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.  
                    </p> 
                </div>
                <div class="price-cart">
                    <h3>$14</h3>
                    <a class="btn" href="#" role="button">+ CART</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="delredvelcreamModalCenter" tabindex="-1" role="dialog" aria-labelledby="delredvelcreamModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog mw-100 w-50 modal-dialog-centered" role="document">
        <div class="modal-content d-flex flex-row" id="menu-modal">
            <img src="../../assets/food/del-redvelcream.jpg">
            <div class="itm-modal-right">
                <div class="itm-desc">
                    <h2>Red Velvet Cream</h2>
                    <h4>Bestseller!</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.  
                    </p> 
                </div>
                <div class="price-cart">
                    <h3>$14</h3>
                    <a class="btn" href="#" role="button">+ CART</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="delchocomochaModalCenter" tabindex="-1" role="dialog" aria-labelledby="delchocomochaModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog mw-100 w-50 modal-dialog-centered" role="document">
        <div class="modal-content d-flex flex-row" id="menu-modal">
            <img src="../../assets/food/del-chocomocha.jpg">
            <div class="itm-modal-right">
                <div class="itm-desc">
                    <h2>Choco Mocha</h2>
                    <h4>Bestseller!</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.  
                    </p> 
                </div>
                <div class="price-cart">
                    <h3>$14</h3>
                    <a class="btn" href="#" role="button">+ CART</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="delchocooreoModalCenter" tabindex="-1" role="dialog" aria-labelledby="delchocooreoModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog mw-100 w-50 modal-dialog-centered" role="document">
        <div class="modal-content d-flex flex-row" id="menu-modal">
            <img src="../../assets/food/del-chocooreo.jpg">
            <div class="itm-modal-right">
                <div class="itm-desc">
                    <h2>Choco Oreo</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.  
                    </p> 
                </div>
                <div class="price-cart">
                    <h3>$14</h3>
                    <a class="btn" href="#" role="button">+ CART</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="treslechescakeModalCenter" tabindex="-1" role="dialog" aria-labelledby="treslechescakeModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog mw-100 w-50 modal-dialog-centered" role="document">
        <div class="modal-content d-flex flex-row" id="menu-modal">
            <img src="../../assets/food/treslechescake.jpg">
            <div class="itm-modal-right">
                <div class="itm-desc">
                    <h2>Tres Leches with Cashew Nuts</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.  
                    </p> 
                </div>
                <div class="price-cart">
                    <h3>$14</h3>
                    <a class="btn" href="#" role="button">+ CART</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="delpurpvelModalCenter" tabindex="-1" role="dialog" aria-labelledby="delpurpvelModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog mw-100 w-50 modal-dialog-centered" role="document">
        <div class="modal-content d-flex flex-row" id="menu-modal">
            <img src="../../assets/food/del-purpvelcream.jpg">
            <div class="itm-modal-right">
                <div class="itm-desc">
                    <h2>Purple Velvet Cream</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.  
                    </p> 
                </div>
                <div class="price-cart">
                    <h3>$14</h3>
                    <a class="btn" href="#" role="button">+ CART</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="chocvanfruitcakeModalCenter" tabindex="-1" role="dialog" aria-labelledby="chocvanfruitcakeModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog mw-100 w-50 modal-dialog-centered" role="document">
        <div class="modal-content d-flex flex-row" id="menu-modal">
            <img src="../../assets/food/chocovanwfruits.jpg">
            <div class="itm-modal-right">
                <div class="itm-desc">
                    <h2>Choco Vanilla with Fruits</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.  
                    </p> 
                </div>
                <div class="price-cart">
                    <h3>$14</h3>
                    <a class="btn" href="#" role="button">+ CART</a>
                </div>
            </div>
        </div>
    </div>
</div>

</html>

