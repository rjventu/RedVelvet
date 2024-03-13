<?php

include("../admin/classes/Database.class.php");
include("../admin/classes/Product.class.php");
include("../admin/classes/ProductCon.class.php"); 

$product = new ProductController();
$result = $product->getCatTable("Cheesecakes");

?>

<!doctype html>
<html lang="en">

<!-- Head -->
<?php include("head-tags.php")?>
    <title>Red Velvet KH - Cheesecakes</title>
</head>
  
<body>

<!-- Header -->
<?php include("header.php")?>

<section class="menu-banner">
    <div>
        <h1>Cheese</h1><span>cakes</span>
    </div>
    <p>6" | good for 6-10 people <br>
        8" | good for 8-12 people</p>
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
            <a data-toggle="modal" data-target="#cheeseblueModalCenter">
                <img class="card-img" src="../../assets/food/cheese-blueberry.jpg">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h4>Bestseller!</h4>
                        <h2>Blueberry Cheesecake</h2>
                        <h3>$15 | $25</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h4>Bestseller!</h4>
            <h2>Blueberry Cheesecake</h2>
            <h3>$15 | $25</h3>
        </div>
    </div>
    <div class="menu-card">
        <div class="image-container">
            <a data-toggle="modal" data-target="#cheeseoreoModalCenter">
                <img class="card-img" src="../../assets/food/cheese-oreo.jpg">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h4>Bestseller!</h4>
                        <h2>Oreo Cheesecake</h2>
                        <h3>$15 | $25</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h4>Bestseller!</h4>
            <h2>Oreo Cheesecake</h2>
            <h3>$15 | $25</h3>
        </div>
    </div>
    <div class="menu-card">
        <div class="image-container">
            <a data-toggle="modal" data-target="#cheesestrawModalCenter">
                <img class="card-img" src="../../assets/food/cheese-straw.jpg">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h2>Strawberry Cheesecake</h2>
                        <h3>$15 | $25</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h2>Strawberry Cheesecake</h2>
            <h3>$15 | $25</h3>
        </div>
    </div>
    <div class="menu-card">
        <div class="image-container">
            <a data-toggle="modal" data-target="#cheesenycModalCenter">
                <img class="card-img" src="../../assets/food/cheese-nyc.jpg">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h2>Classic New York</h2>
                        <h3>$14 | $22</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h2>Classic New York</h2>
            <h3>$14 | $22</h3>
        </div>
    </div>
</section> -->

</body>

<!-- Footer -->
<?php include('footer.php') ?>

<!-- Inquiry Button -->
<?php include('inquiry.php') ?>

<!-- Menu Modal -->
<!-- <div class="modal fade" id="cheeseblueModalCenter" tabindex="-1" role="dialog" aria-labelledby="cheeseblueModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog mw-100 w-50 modal-dialog-centered" role="document">
        <div class="modal-content d-flex flex-row" id="menu-modal">
            <img src="../../assets/food/cheese-blueberry.jpg">
            <div class="itm-modal-right">
                <div class="itm-desc">
                    <h2>Blueberry Cheesecake</h2>
                    <h4>Bestseller!</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.  
                    </p> 
                </div>
                <div class="price-cart">
                    <h3>$15<br/>$25</h3>
                    <a class="btn" href="#" role="button">+ CART</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="cheeseoreoModalCenter" tabindex="-1" role="dialog" aria-labelledby="cheeseoreoModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog mw-100 w-50 modal-dialog-centered" role="document">
        <div class="modal-content d-flex flex-row" id="menu-modal">
            <img src="../../assets/food/cheese-oreo.jpg">
            <div class="itm-modal-right">
                <div class="itm-desc">
                    <h2>Oreo Cheesecake</h2>
                    <h4>Bestseller!</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.  
                    </p> 
                </div>
                <div class="price-cart">
                    <h3>$15<br/>$25</h3>
                    <a class="btn" href="#" role="button">+ CART</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="cheesestrawModalCenter" tabindex="-1" role="dialog" aria-labelledby="cheesestrawModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog mw-100 w-50 modal-dialog-centered" role="document">
        <div class="modal-content d-flex flex-row" id="menu-modal">
            <img src="../../assets/food/cheese-straw.jpg">
            <div class="itm-modal-right">
                <div class="itm-desc">
                    <h2>Strawberry Cheesecake</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.  
                    </p> 
                </div>
                <div class="price-cart">
                    <h3>$15<br/>$25</h3>
                    <a class="btn" href="#" role="button">+ CART</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="cheesenycModalCenter" tabindex="-1" role="dialog" aria-labelledby="cheesenycModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog mw-100 w-50 modal-dialog-centered" role="document">
        <div class="modal-content d-flex flex-row" id="menu-modal">
            <img src="../../assets/food/cheese-nyc.jpg">
            <div class="itm-modal-right">
                <div class="itm-desc">
                    <h2>Classic New York</h2>
                    <h4>Bestseller!</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.  
                    </p> 
                </div>
                <div class="price-cart">
                    <h3>$14<br/>$22</h3>
                    <a class="btn" href="#" role="button">+ CART</a>
                </div>
            </div>
        </div>
    </div>
</div> -->

</html>

