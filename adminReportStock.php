<?php
session_start();
include "connection.php";

if (isset($_SESSION["a"])) {

    $rs =  Database::search("SELECT * FROM `stock` INNER JOIN  `product` ON `stock`.`product_id` = `product`.`id` ORDER BY `stock`.`id` ASC");
    $num = $rs->num_rows;
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stock Report</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
        <script src="script.js" defer></script>
        <style>
            /* Custom styles for better mobile responsiveness */
            .table-responsive {
                overflow-x: auto;
            }

            @media (max-width: 768px) {
                .btn {
                    width: 100%;
                    margin-bottom: 1rem;
                }
            }
        </style>
    </head>

    <body>

        <div class="container mt-3">
            <a href="adminDashboard.php">
                <img src="Resources/Img/back.png" height="25" alt="Back">
            </a>
        </div>

        <div class="container mt-3" id="printArea">
            <h2 class="text-center">Stock Report</h2>

            <div>
                <div class="text-center">
                    <img src="Resources/Img/ng.jpg" class="mt-4" height="50" alt="NextGen Logo">
                    <h3 class="mt-3">N E X T G E N</h3>
                    <p>&copy; NextGen.lk || All Rights Reserved.</p>
                </div>
            </div>


            <div class="border border-3 rounded-4 p-4">
                <div class="table-responsive mt-5">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Stock Id</th>
                                <th>Product Name</th>
                                <th>Stock Qty</th>
                                <th>Unit Price</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            for ($i = 0; $i < $num; $i++) {
                                $d = $rs->fetch_assoc();
                            ?>
                                <tr>
                                    <td><?php echo $d["id"] ?></td>
                                    <td><?php echo $d["name"] ?></td>
                                    <td><?php echo $d["qty"] ?></td>
                                    <td><?php echo $d["price"] ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="container d-flex justify-content-end mt-5 mb-5">
            <button class="btn btn-danger col-md-2 col-sm-3" onclick="printDiv();">Print</button>
        </div>



    </body>

    </html>

<?php
} else {
    echo ("You are not a Valid Admin");
}
?>