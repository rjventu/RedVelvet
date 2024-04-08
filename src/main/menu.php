<?php include("includes/menu.inc.php")?>

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

</body>

<!-- Footer -->
<?php include('footer.php') ?>

</html>

