<?php
session_start();
$user = $_SESSION["u"];
include "connection.php";
if (isset($user)) {
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
</head>

<body>
    <?php include "navbar.php"; ?>

    <div class="container mt-5">
        <div class="row">
            <?php
            $rs =  Database::search("SELECT * FROM `order_history` WHERE `user_id` = '" . $user["id"] . "'");
            $num = $rs->num_rows;

            if ($num > 0) {
            ?>
                <div class="mb-3 mt-5">
                    <h3>Order History</h3>
                </div>
                <?php
                while ($d = $rs->fetch_assoc()) {
                ?>
                    <div class="p-3 border border-3 rounded-3 bg-body-tertiary mb-4">
                        <div>
                            <h5>Order ID <span class="text-warning"><?php echo $d["order_id"] ?></span></h5>
                            <p>Order Date: <?php echo $d["order_date"] ?></p>
                            <div class="ps-5 pe-5">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $rs2 = Database::search("SELECT * FROM `order_item` INNER JOIN `stock` ON `order_item`.`stock_id` = `stock`.`id` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` WHERE `order_item`.`order_history_ohid` = '" . $d["ohid"] . "'");
                                        while ($d2 = $rs2->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $d2["name"] ?></td>
                                                <td><?php echo $d2["oi_qty"] ?></td>
                                                <td><?php echo $d2["price"] * $d2["oi_qty"] ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                <h6>Delevery free</h6>
                                <h4>Net Total <span class="text-warning">Rs: <?php echo $d["amount"] ?></span> </h4>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

            <?php
            } else {
            ?>
                <div class="col-12 text-center mt-5">
                    <h2>You Have not Placed Any Orders</h2>
                    <a href="index.php" class="btn btn-primary">Start Shopping</a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <script src="script.js"></script>

</body>

</html>

<?php

} else {
    header("location:signIn.php");
}

?>
