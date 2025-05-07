<?php
include "connection.php";
$stockId = $_GET["s"];

if (isset($stockId)) {
    $q = "SELECT * FROM `stock`
        INNER JOIN `product` ON `stock`.`product_id` = `product`.`id`
        INNER JOIN `brand` ON `product`.`brand_brand_id` = `brand`.`brand_id`
        INNER JOIN `color` ON `product`.`color_color_id` = `color`.`color_id`
        INNER JOIN `category` ON `product`.`category_cat_id` = `category`.`cat_id`
        INNER JOIN `gender` ON `product`.`gender_gender_id` = `gender`.`gender_id`
        INNER JOIN `size` ON `product`.`size_size_id` = `size`.`size_id`
        WHERE `stock`.`id` = '" . $stockId . "'";

    $rs = Database::search($q);
    $d = $rs->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css"/>
    <title>Online Store</title>
</head>
<body>
    <!-- Navigation Bar -->
    <?php include "navBar.php"; ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-md-6 mb-4">
                <img src="<?php echo $d['path']; ?>" class="rounded-3 shadow-lg img-fluid" alt="Product Image">
            </div>
            <div class="col-12 col-md-6 mt-5">
                <h4>Product: <?php echo $d['name']; ?></h4>
                <h5>Brand: <?php echo $d['brand_name']; ?></h5>
                <h6>Category: <?php echo $d['cat_name']; ?></h6>
                <h6>Color: <?php echo $d['color_name']; ?></h6>
                <h6>Size: <?php echo $d['size_name']; ?></h6>
                <h6>Gender Type: <?php echo $d['gender_type']; ?></h6>
                <p>Description: <?php echo $d['description']; ?></p>
                <div class="row mt-4">
                    <div class="col-4 col-md-2">
                        <input type="text" placeholder="Qty" class="form-control" id="qty">
                    </div>
                    <div class="col-8 col-md-6">
                        <h6 class="text-warning">Stock: <?php echo $d['qty']; ?></h6>
                    </div>
                </div>
                <h5 class="mt-3">Price: Rs. <?php echo $d['price']; ?>.00</h5>
                <div class="d-flex justify-content-between mt-3">
                    <button class="btn btn-outline-primary flex-fill me-2" onclick="addtoCart('<?php echo $d['id']; ?>');">Add To Cart</button>
                    <button class="btn btn-outline-warning flex-fill ms-2" onclick="buyNow('<?php echo $d['id']; ?>');">Buy Now</button>
                </div>
            </div>
        </div>
    </div>

    <?php include "footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js"></script>
</body>
</html>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>
