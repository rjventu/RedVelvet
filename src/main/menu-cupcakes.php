<?php $current_cat = "Cupcakes"; include("includes/menu-cat.inc.php");?>

<!doctype html>
<html lang="en">

<!-- Head -->
<?php include("head-tags.php")?>
<title>Red Velvet KH - Cupcakes</title>
</head>

<body>
    
    <!-- Header -->
    <?php include("header.php")?>
    
<section class="menu-banner">
    <div>
        <h1>Cup</h1><span>cakes</span>
    </div>
    <p>Minimum order of 12 pcs</p>
</section>

<section class="menu-cupcakes pt-5 pb-0">
    <div class="cupcake-sel">
        <ul>
            <li><h1>Chocolate</h1></li>
            <li><h1>Vanilla</h1></li>
            <li><h1>Red Velvet</h1></li>
            <li><h1>Yema*</h1></li>
        </ul>
    </div>
    <div class="cupcake-prices">
        <h3>w/ vanilla cream frosting</h3>
        <h3><b>$18/doz</b></h3>
        <h3>w/ cream cheese frosting</h3>
        <h3><b>$21/doz</b></h3>
        <div class="cupcake-footnote">
            <p>*Yema will have yema custard frosting with cheese topping.</p>
        </div>
    </div>
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

</body>

<!-- Footer -->
<?php include('footer.php') ?>

</html>

