<?php

include "connection.php";

$pageno = 0;
$page = $_POST["p"];

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id`= `product`.`id` ORDER BY `stock`.`id` ASC";
$rs = Database::search($q);
$num = $rs->num_rows;

$results_per_page = 8;
$num_of_pages = ceil($num / $results_per_page);

$page_results = ($pageno - 1) * $results_per_page;

$q2 = $q . " LIMIT $results_per_page OFFSET $page_results";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;

if ($num2 == 0) {
    echo("No Product Here..");
} else {
    for ($i = 0; $i < $num2; $i++) {
        $d = $rs2->fetch_assoc();
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

                   <a href="singleProductView.php?s=<?php echo $d["id"] ?>"><button class="btn btn-outline-warning col-12">Buy Now</button></a>
                    
                </div>
            </div>
        </div>
    </div>

<?php
    }
?>
    <!--pagination-->
    <div class="d-flex justify-content-center mt-5 border-black">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" <?php if ($pageno <= 1) { echo("href='#'"); } else { ?> href="#" onclick="loadProduct(<?php echo ($pageno - 1) ?>);" <?php } ?>>Previous</a>
                </li>

                <?php
                for ($y = 1; $y <= $num_of_pages; $y++) {
                    if ($y == $pageno) {
                ?>
                        <li class="page-item active">
                            <a class="page-link" href="#" onclick="loadProduct(<?php echo $y ?>);"><?php echo $y ?></a>
                        </li>
                <?php
                    } else {
                ?>
                        <li class="page-item">
                            <a class="page-link" href="#" onclick="loadProduct(<?php echo $y ?>);"><?php echo $y ?></a>
                        </li>
                <?php
                    }
                }
                ?>

                <li class="page-item">
                    <a class="page-link" <?php if ($pageno >= $num_of_pages) { echo("href='#'"); } else { ?> href="#" onclick="loadProduct(<?php echo ($pageno + 1) ?>);" <?php } ?>>Next</a>
                </li>
            </ul>
        </nav>
    </div>
    <!--pagination-->

<?php
}
?>
