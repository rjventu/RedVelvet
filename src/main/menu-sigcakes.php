<?php

include("../admin/classes/Database.class.php");
include("../admin/classes/Product.class.php");
include("../admin/classes/ProductCon.class.php"); 

$product = new ProductController();
$result = $product->getCatTable("Signature Cakes");

?>

<!doctype html>
<html lang="en">

<!-- Head -->
<?php include("head-tags.php")?>
    <title>Red Velvet KH - Signature Cakes</title>
</head>
  
<body>

<!-- Header -->
<?php include("header.php")?>

<section class="menu-banner">
    <div>
        <h1>Signature</h1><span>cakes</span>
    </div>
    <p>8" | good for 8-12 people</p>
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
            <a data-toggle="modal" data-target="#redvelcreamcakeModalCenter">
                <img class="card-img" src="../../assets/food/redvelcreamcake.jpg">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h4>Bestseller!</h4>
                        <h2>Red Velvet Cream</h2>
                        <h3>$20</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h4>Bestseller!</h4>
            <h2>Red Velvet Cream</h2>
            <h3>$20</h3>
        </div>
    </div>
    <div class="menu-card">
        <div class="image-container">
            <a data-toggle="modal" data-target="#blackforestcakeModalCenter">
                <img class="card-img" src="../../assets/food/blackforestcake.jpg">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h4>Bestseller!</h4>
                        <h2>Black Forest</h2>
                        <h3>$20</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h4>Bestseller!</h4>
            <h2>Black Forest</h2>
            <h3>$20</h3>
        </div>
    </div>
    <div class="menu-card">
        <div class="image-container">
            <a data-toggle="modal" data-target="#chocooreocakeModalCenter">
                <img class="card-img" src="../../assets/food/chocooreocake.jpg">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h2>Choco Oreo</h2>
                        <h3>$20</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h2>Choco Oreo</h2>
            <h3>$20</h3>
        </div>
    </div>
    <div class="menu-card">
        <div class="image-container">
            <a data-toggle="modal" data-target="#purpvelcreamcakeModalCenter">
                <img class="card-img" src="../../assets/food/purpvelcream.jpg">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h2>Purple Velvet Cream</h2>
                        <h3>$20</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h2>Purple Velvet Cream</h2>
            <h3>$20</h3>
        </div>
    </div>
    <div class="menu-card">
        <div class="image-container">
            <a data-toggle="modal" data-target="#treslechescakeModalCenter">
                <img class="card-img" src="../../assets/food/treslechescake.jpg">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h4>Bestseller!</h4>
                        <h2>Tres Leches with Cashew Nuts</h2>
                        <h3>$20</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h4>Bestseller!</h4>
            <h2>Tres Leches with Cashew Nuts</h2>
            <h3>$20</h3>
        </div>
    </div>
    <div class="menu-card">
        <div class="image-container">
            <a data-toggle="modal" data-target="#chocodecModalCenter">
                <img class="card-img" src="../../assets/food/chocodec.jpg">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h4>Bestseller!</h4>
                        <h2>Choco Decadence</h2>
                        <h3>$25</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h4>Bestseller!</h4>
            <h2>Choco Decadence</h2>
            <h3>$25</h3>
        </div>
    </div>
    <div class="menu-card">
        <div class="image-container">
            <a data-toggle="modal" data-target="#chocvanfruitcakeModalCenter">
                <img class="card-img" src="../../assets/food/chocovanwfruits.jpg">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h2>Choco Vanilla with Fruits</h2>
                        <h3>$20</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h2>Choco Vanilla with Fruits</h2>
            <h3>$20</h3>
        </div>
    </div>
    <div class="menu-card">
        <div class="image-container">
            <a data-toggle="modal" data-target="#yemawithcheesecakeModalCenter">
                <img class="card-img" src="../../assets/food/yemacakewcheese.jpg">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h4>Bestseller!</h4>
                        <h2>Yema Cake with Cheese</h2>
                        <h3>$20</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h4>Bestseller!</h4>
            <h2>Yema Cake with Cheese</h2>
            <h3>$20</h3>
        </div>
    </div>
    
</section> -->

</body>

<!-- Footer -->
<?php include('footer.php') ?>

<!-- Inquiry Button -->
<?php include('inquiry.php') ?>

<!-- Menu Modal-->
<!-- <div class="modal fade" id="redvelcreamcakeModalCenter" tabindex="-1" role="dialog" aria-labelledby="redvelcreamcakeModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog mw-100 w-50 modal-dialog-centered" role="document">
        <div class="modal-content d-flex flex-row" id="menu-modal">
            <img src="../../assets/food/redvelcreamcake.jpg">
            <div class="itm-modal-right">
                <div class="itm-desc">
                    <h2>Red Velvet Cream</h2>
                    <h4>Bestseller!</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.  
                    </p> 
                </div>
                <div class="price-cart">
                    <h3>$20</h3>
                    <a class="btn" href="#" role="button">+ CART</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="blackforestcakeModalCenter" tabindex="-1" role="dialog" aria-labelledby="blackforestcakeModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog mw-100 w-50 modal-dialog-centered" role="document">
        <div class="modal-content d-flex flex-row" id="menu-modal">
            <img src="../../assets/food/blackforestcake.jpg">
            <div class="itm-modal-right">
                <div class="itm-desc">
                    <h2>Black Forest</h2>
                    <h4>Bestseller!</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.  
                    </p> 
                </div>
                <div class="price-cart">
                    <h3>$20</h3>
                    <a class="btn" href="#" role="button">+ CART</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="chocooreocakeModalCenter" tabindex="-1" role="dialog" aria-labelledby="chocooreocakeModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog mw-100 w-50 modal-dialog-centered" role="document">
        <div class="modal-content d-flex flex-row" id="menu-modal">
            <img src="../../assets/food/chocooreocake.jpg">
            <div class="itm-modal-right">
                <div class="itm-desc">
                    <h2>Choco Oreo</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.  
                    </p> 
                </div>
                <div class="price-cart">
                    <h3>$20</h3>
                    <a class="btn" href="#" role="button">+ CART</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="purpvelcreamcakeModalCenter" tabindex="-1" role="dialog" aria-labelledby="purpvelcreamcakeModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog mw-100 w-50 modal-dialog-centered" role="document">
        <div class="modal-content d-flex flex-row" id="menu-modal">
            <img src="../../assets/food/purpvelcream.jpg">
            <div class="itm-modal-right">
                <div class="itm-desc">
                    <h2>Purple Velvet Cream</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.  
                    </p> 
                </div>
                <div class="price-cart">
                    <h3>$20</h3>
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
                    <h4>Bestseller!</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.  
                    </p> 
                </div>
                <div class="price-cart">
                    <h3>$20</h3>
                    <a class="btn" href="#" role="button">+ CART</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="chocodecModalCenter" tabindex="-1" role="dialog" aria-labelledby="chocodecModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog mw-100 w-50 modal-dialog-centered" role="document">
        <div class="modal-content d-flex flex-row" id="menu-modal">
            <img src="../../assets/food/chocodec.jpg">
            <div class="itm-modal-right">
                <div class="itm-desc">
                    <h2>Choco Decadence</h2>
                    <h4>Bestseller!</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.  
                    </p> 
                </div>
                <div class="price-cart">
                    <h3>$25</h3>
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
                    <h3>$20</h3>
                    <a class="btn" href="#" role="button">+ CART</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="yemawithcheesecakeModalCenter" tabindex="-1" role="dialog" aria-labelledby="yemawithcheesecakeModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog mw-100 w-50 modal-dialog-centered" role="document">
        <div class="modal-content d-flex flex-row" id="menu-modal">
            <img src="../../assets/food/yemacakewcheese.jpg">
            <div class="itm-modal-right">
                <div class="itm-desc">
                    <h2>Yema Cake with Cheese</h2>
                    <h4>Bestseller!</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.  
                    </p> 
                </div>
                <div class="price-cart">
                    <h3>$20</h3>
                    <a class="btn" href="#" role="button">+ CART</a>
                </div>
            </div>
        </div>
    </div>
</div> -->

</html>

