<?php

include "connection.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css" />
    <title>Online Store | Home</title>
</head>

<body>
    <?php include "navBar.php";  ?>

    <div class="card text mt-4">
        <img src="Resources/Img/kids cloth 2.jpg" class="card-img" style="height: 800px;">
        <div class="card-img-overlay">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
           
        </div>
    </div>


    <div class="mt-5 text-center">
        <h2>T - S H I R T S</h2>
    </div>
    <div class="col-12 mt-4">
        <hr class=" border-4">
    </div>


    <div class="container mt-5">
        <div class="row" id="wid">
            <?php
            $rs = Database::search("SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id`= `product`.`id` AND `product`.category_cat_id = '1' AND `product`.`gender_gender_id` = '3'");
            $num = $rs->num_rows;

            for ($x = 0; $x < $num; $x++) {
                $d = $rs->fetch_assoc();
            ?>
                <!--card-->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-5 d-flex justify-content-center">
                    <div class="card border-black bg-secondary-subtle" style="width: 100%;">
                        <a href="singleProductView.php?s=<?php echo $d["id"] ?>"><img src="<?php echo $d["path"] ?>" class="card-img-top" /></a>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $d["name"] ?></h5>
                            <p class="card-text"><?php echo $d["description"] ?></p>
                            <p class="card-text">RS: <?php echo $d["price"] ?>.00</p>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-outline-primary">Add To Cart</button>
                                <button class="btn btn-outline-warning">Buy Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            <!-- Products will be loaded here dynamically -->

        </div>
    </div>


    <div class="mt-5 text-center">
        <h2>S H O R T S</h2>
    </div>
    <div class="col-12 mt-4">
        <hr class=" border-4">
    </div>


    <div class="container mt-5">
        <div class="row" id="wid">
            <?php
            $rs = Database::search("SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id`= `product`.`id` AND `product`.category_cat_id = '2' AND `product`.`gender_gender_id` = '3'");
            $num = $rs->num_rows;

            for ($x = 0; $x < $num; $x++) {
                $d = $rs->fetch_assoc();
            ?>
                <!--card-->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-5 d-flex justify-content-center">
                    <div class="card border-black bg-secondary-subtle" style="width: 100%;">
                        <a href="singleProductView.php?s=<?php echo $d["id"] ?>"><img src="<?php echo $d["path"] ?>" class="card-img-top" /></a>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $d["name"] ?></h5>
                            <p class="card-text"><?php echo $d["description"] ?></p>
                            <p class="card-text">RS: <?php echo $d["price"] ?>.00</p>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-outline-primary">Add To Cart</button>
                                <button class="btn btn-outline-warning">Buy Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            <!-- Products will be loaded here dynamically -->

        </div>
    </div>


    <div class="mt-5 text-center">
        <h2>F R O C K S</h2>
    </div>
    <div class="col-12 mt-4">
        <hr class=" border-4">
    </div>


    <div class="container mt-5">
        <div class="row" id="wid">
            <?php
            $rs = Database::search("SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id`= `product`.`id` AND `product`.category_cat_id = '6' AND `product`.`gender_gender_id` = '3'");
            $num = $rs->num_rows;

            for ($x = 0; $x < $num; $x++) {
                $d = $rs->fetch_assoc();
            ?>
                <!--card-->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-5 d-flex justify-content-center">
                    <div class="card border-black bg-secondary-subtle" style="width: 100%;">
                        <a href="singleProductView.php?s=<?php echo $d["id"] ?>"><img src="<?php echo $d["path"] ?>" class="card-img-top" /></a>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $d["name"] ?></h5>
                            <p class="card-text"><?php echo $d["description"] ?></p>
                            <p class="card-text">RS: <?php echo $d["price"] ?>.00</p>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-outline-primary">Add To Cart</button>
                                <button class="btn btn-outline-warning">Buy Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            <!-- Products will be loaded here dynamically -->

        </div>
    </div>


    
    <div class="mt-4">
        <?php
        include "footer.php";
        ?>

    </div>











    </body>