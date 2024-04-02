<?php $current_cat = "Pastries"; include("includes/menu-cat.inc.php");?>

<!doctype html>
<html lang="en">

<!-- Head -->
<?php include("head-tags.php")?>
    <title>Red Velvet KH - Pastries</title>
</head>
  
<body>

<!-- Header -->
<?php include("header.php")?>

<section class="menu-banner">
    <div>
        <h1>Pastries</h1>
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

