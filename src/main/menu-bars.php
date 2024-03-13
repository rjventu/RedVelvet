<?php

include("../admin/classes/Database.class.php");
include("../admin/classes/Product.class.php");
include("../admin/classes/ProductCon.class.php"); 

$product = new ProductController();
$result = $product->getCatTable("Bars");

?>

<!doctype html>
<html lang="en">

<!-- Head -->
<?php include("head-tags.php")?>
    <title>Red Velvet KH - Bars</title>
</head>
  
<body>

<!-- Header -->
<?php include("header.php")?>

<section class="menu-banner">
    <div>
        <h1>Bars</h1>
    </div>
    <p>12/16 pcs per order/pan</p>
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
            <a data-toggle="modal" data-target="#bardoublechocoModalCenter">
                <img class="card-img" src="../../assets/food/bars-doublechoco.jpg">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h4>Bestseller!</h4>
                        <h2>Double Choco Brownies</h2>
                        <h3>$8</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h4>Bestseller!</h4>
            <h2>Double Choco Brownies</h2>
            <h3>$8</h3>
        </div>
    </div>
    <div class="menu-card">
        <div class="image-container">
            <a data-toggle="modal" data-target="#barsredvelModalCenter">
                <img class="card-img" src="../../assets/food/redvelvet cheesecake bar.jpg">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h4>Bestseller!</h4>
                        <h2>RedVelvet Cheesecake Swirl</h2>
                        <h3>$12</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h4>Bestseller!</h4>
            <h2>Red Velvet Cheesecake Swirl</h2>
            <h3>$12</h3>
        </div>
    </div>
    <div class="menu-card">
        <div class="image-container">
            <a data-toggle="modal" data-target="#barsbutterModalCenter">
                <img class="card-img" src="../../assets/food/bars-butterscotch.jpg">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h4>Bestseller!</h4>
                        <h2>Butterscotch with Nuts</h2>
                        <h3>$8</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h4>Bestseller!</h4>
            <h2>Butterscotch with Nuts</h2>
            <h3>$8</h3>
        </div>
    </div>
    <div class="menu-card">
        <div class="image-container">
            <a data-toggle="modal" data-target="#barsrevelModalCenter">
                <img class="card-img" src="../../assets/food/bars-revel.jpg">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h2>Revel Choco-Oat Bars</h2>
                        <h3>$12</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h2>Revel Choco-Oat Bars</h2>
            <h3>$12</h3>
        </div>
    </div>
    <div class="menu-card">
        <div class="image-container">
            <a data-toggle="modal" data-target="#barsnutellaModalCenter">
                <img class="card-img" src="../../assets/food/bars-nutella.jpg">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h2>Nutella Brownie Swirl</h2>
                        <h3>$12</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h2>Nutella Brownie Swirl</h2>
            <h3>$12</h3>
        </div>
    </div>
    <div class="menu-card">
        <div class="image-container">
            <a data-toggle="modal" data-target="#barsappleModalCenter">
                <img class="card-img" src="../../assets/food/bars-apple.jpg">
                <div class="overlay overlay--blur">
                    <div class="overlay-content">
                        <h2>Apple Crumble Pie</h2>
                        <h3>$12</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-desc">
            <h2>Apple Crumble Pie Bars</h2>
            <h3>$12</h3>
        </div>
    </div>
</section> -->

</body>

<!-- Footer -->
<?php include('footer.php') ?>

<!-- Inquiry Button -->
<?php include('inquiry.php') ?>

<!--Menu Modal-->
<!-- <div class="modal fade" id="bardoublechocoModalCenter" tabindex="-1" role="dialog" aria-labelledby="bardoublechocoModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog mw-100 w-50 modal-dialog-centered" role="document">
        <div class="modal-content d-flex flex-row" id="menu-modal">
            <img src="../../assets/food/bars-doublechoco.jpg">
            <div class="itm-modal-right">
                <div class="itm-desc">
                    <h2>Double Choco Brownies</h2>
                    <h4>Bestseller!</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.  
                    </p> 
                </div>
                <div class="price-cart">
                    <h3>$8</h3>
                    <a class="btn" href="#" role="button">+ CART</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="barsredvelModalCenter" tabindex="-1" role="dialog" aria-labelledby="barsredvelModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog mw-100 w-50 modal-dialog-centered" role="document">
        <div class="modal-content d-flex flex-row" id="menu-modal">
            <img src="../../assets/food/redvelvet cheesecake bar.jpg">
            <div class="itm-modal-right">
                <div class="itm-desc">
                    <h2>Redvelvet Cheesecake Swirl</h2>
                    <h4>Bestseller!</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.  
                    </p> 
                </div>
                <div class="price-cart">
                    <h3>$12</h3>
                    <a class="btn" href="#" role="button">+ CART</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="barsbutterModalCenter" tabindex="-1" role="dialog" aria-labelledby="barsbutterModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog mw-100 w-50 modal-dialog-centered" role="document">
        <div class="modal-content d-flex flex-row" id="menu-modal">
            <img src="../../assets/food/bars-butterscotch.jpg">
            <div class="itm-modal-right">
                <div class="itm-desc">
                    <h2>Butterscotch with Nuts</h2>
                    <h4>Bestseller!</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.  
                    </p> 
                </div>
                <div class="price-cart">
                    <h3>$8</h3>
                    <a class="btn" href="#" role="button">+ CART</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="barsrevelModalCenter" tabindex="-1" role="dialog" aria-labelledby="barsrevelModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog mw-100 w-50 modal-dialog-centered" role="document">
        <div class="modal-content d-flex flex-row" id="menu-modal">
            <img src="../../assets/food/bars-revel.jpg">
            <div class="itm-modal-right">
                <div class="itm-desc">
                    <h2>Revel Choco-Oat Bars</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.  
                    </p> 
                </div>
                <div class="price-cart">
                    <h3>$12</h3>
                    <a class="btn" href="#" role="button">+ CART</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="barsnutellaModalCenter" tabindex="-1" role="dialog" aria-labelledby="barsnutellaModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog mw-100 w-50 modal-dialog-centered" role="document">
        <div class="modal-content d-flex flex-row" id="menu-modal">
            <img src="../../assets/food/bars-nutella.jpg">
            <div class="itm-modal-right">
                <div class="itm-desc">
                    <h2>Nutella Brownie Swirl</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.  
                    </p> 
                </div>
                <div class="price-cart">
                    <h3>$12</h3>
                    <a class="btn" href="#" role="button">+ CART</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="barsappleModalCenter" tabindex="-1" role="dialog" aria-labelledby="barsappleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog mw-100 w-50 modal-dialog-centered" role="document">
        <div class="modal-content d-flex flex-row" id="menu-modal">
            <img src="../../assets/food/bars-apple.jpg">
            <div class="itm-modal-right">
                <div class="itm-desc">
                    <h2>Apple Crumble Pie</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.  
                    </p> 
                </div>
                <div class="price-cart">
                    <h3>$12</h3>
                    <a class="btn" href="#" role="button">+ CART</a>
                </div>
            </div>
        </div>
    </div>
</div> -->

</html>

