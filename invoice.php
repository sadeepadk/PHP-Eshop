<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];
$orderHistoryId = $_GET["orderId"];

$rs = Database::search("SELECT * FROM `order_history` WHERE `ohid` = '" . $orderHistoryId . "'");
$num = $rs->num_rows;

if ($num > 0) {
    $d = $rs->fetch_assoc();
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="style.css" />
        <title>NEXTGEN | Invoice</title>
    </head>

    <body>

        <div class="container text-end mt-2">
            <a href="index.php"><button class="btn btn-outline-dark btn-sm">Home</button></a>
        </div>

        <div class="container mt-2 mb-2">
            <div class="border border-3 border-black p-5 rounded-3">
                <div class="row">
                    <div class="col-6">
                        <h3>Order Id #<?php echo $d["order_id"] ?></h3>
                        <h5><?php echo $d["order_date"] ?></h5>
                    </div>
                    <div class="col-6 text-end">
                        <a href=""><img src="Resources/Img/ng.jpg"></img></a>
                        <h1>I N V O I C E</h1>
                        <h4>NextGen</h4>
                        <h5>No.525, 2 lane,</h5>
                        <h5>Pilimathalawa, Kandy.</h5>
                    </div>
                    <div>
                        <h4><?php echo $user["fname"] ?> <?php echo $user["lname"] ?></h4>
                        <h5><?php echo $user["mobile"] ?></h5>
                        <h5><?php echo $user["no"] ?></h5>
                        <h5><?php echo $user["line_1"] ?></h5>
                        <h5><?php echo $user["line_2"] ?></h5>
                    </div>
                    <div class="ps-5 pe-5 mt-5">
                        <table class="table table-hover border border-1 border-black">
                            <thead>
                                <tr>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $rs2 = Database::search("SELECT * FROM `order_item` INNER JOIN `stock` ON `order_item`.stock_id = `stock`.`id` INNER JOIN `product` ON `stock`.product_id = `product`.`id` INNER JOIN `brand` ON `product`.`brand_brand_id` = `brand`.`brand_id` INNER JOIN `color` ON `product`.`color_color_id` = `color`.`color_id` INNER JOIN `category` ON `product`.`category_cat_id` = `category`.`cat_id` INNER JOIN `size` ON `product`.`size_size_id` = `size`.`size_id` WHERE `order_item`.`order_history_ohid` = '" . $orderHistoryId . "'");

                                $num2 = $rs2->num_rows;

                                for ($i = 0; $i < $num2; $i++) {
                                    $d2 = $rs2->fetch_assoc();
                                ?>
                                    <tr>
                                        <td><?php echo $d2["name"] ?></td>
                                        <td><?php echo $d2["brand_name"] ?></td>
                                        <td><?php echo $d2["cat_name"] ?></td>
                                        <td><?php echo $d2["color_name"] ?></td>
                                        <td><?php echo $d2["size_name"] ?></td>
                                        <td><?php echo $d2["oi_qty"] ?></td>
                                        <td>Rs. <?php echo ($d2["price"] * $d2["oi_qty"]) ?>.00</td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-end mt-5 pe-5">
                        <h6>Number Of Items : <span class="text-muted"><?php echo $num2 ?></span></h6>
                        <h6>Delivery Fee : <span class="text-muted">Rs:500.00</span></h6>
                        <h3>Net Total : <span class="text-muted bg-body-info">Rs:<?php echo $d["amount"] ?>.00</span></h3>
                    </div>
                    <div class="mt-4 bg-body-info">
                        <h3 class="text-center">Thank You for Shopping With Us..</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="container d-flex justify-content-end mt-5 mb-5">
            <button class="btn btn-danger col-2" onclick="printDiv();">Print</button>

        </div>

        <script src="script.js"></script>

    </body>



    </html>

<?php
} else {
    header("location: index.php");
}
?>