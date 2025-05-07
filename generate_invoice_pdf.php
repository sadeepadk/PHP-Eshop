<?php

require 'vendor/autoload.php'; // Autoload dompdf
include "connection.php";
session_start();
use Dompdf\Dompdf;
use Dompdf\Options;

if (!isset($_GET["orderId"])) {
    header("location: index.php");
    exit;
}

$orderHistoryId = $_GET["orderId"];
$rs = Database::search("SELECT * FROM `order_history` WHERE `ohid` = '" . $orderHistoryId . "'");
$num = $rs->num_rows;

if ($num > 0) {
    $d = $rs->fetch_assoc();
    $user = $_SESSION["u"];

    // Start output buffering
    ob_start();
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://yourdomain.com/path/to/bootstrap.css" />
        <link rel="stylesheet" href="http://yourdomain.com/path/to/style.css" />
        <title>NEXTGEN | Invoice</title>
        <style>
            body {
                font-family: Arial, sans-serif;
            }
            .container {
                width: 100%;
                margin: 0 auto;
                padding: 20px;
            }
            .text-end {
                text-align: right;
            }
            .border {
                border: 1px solid #000;
            }
            .rounded-3 {
                border-radius: 3px;
            }
            .mt-2 {
                margin-top: 20px;
            }
            .mb-2 {
                margin-bottom: 20px;
            }
            .p-5 {
                padding: 50px;
            }
            .row {
                display: flex;
                justify-content: space-between;
                margin-bottom: 20px;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }
            th, td {
                padding: 10px;
                border: 1px solid #000;
            }
            .text-muted {
                color: #6c757d;
            }
            .bg-body-info {
                background-color: #e9ecef;
            }
            .text-center {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="text-end mt-2">
                <a href="index.php"><button class="btn btn-outline-dark btn-sm">Home</button></a>
            </div>
            <div class="mt-2 mb-2" id="PrintArea">
                <div class="border p-5 rounded-3">
                    <div class="row">
                        <div class="col-6">
                            <h3>Order Id #<?php echo $d["order_id"] ?></h3>
                            <h5><?php echo $d["order_date"] ?></h5>
                        </div>
                        <div class="col-6 text-end">
                            <img src="http://Resources/Img/ng.jpg" alt="Logo" style="max-width: 100px;">
                            <h1>I N V O I C E</h1>
                            <h4>NextGen</h4>
                            <h5>No.525, 2 lane,</h5>
                            <h5>Pilimathalawa, Kandy.</h5>
                        </div>
                    </div>
                    <div>
                        <h4><?php echo $user["fname"] ?> <?php echo $user["lname"] ?></h4>
                        <h5><?php echo $user["mobile"] ?></h5>
                        <h5><?php echo $user["no"] ?></h5>
                        <h5><?php echo $user["line_1"] ?></h5>
                        <h5><?php echo $user["line_2"] ?></h5>
                    </div>
                    <div class="ps-5 pe-5 mt-5">
                        <table class="table table-hover border">
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
    </body>
    </html>

    <?php
    // Get the HTML content
    $html = ob_get_clean();

    // Configure Dompdf according to your needs
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isRemoteEnabled', true);

    // Initialize Dompdf
    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream("invoice_" . $orderHistoryId . ".pdf", ["Attachment" => 1]);
} else {
    header("location: index.php");
}
?>
