<?php
session_start();

if (isset($_SESSION["a"])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <title>Online Store | Admin Dashboard</title>
    </head>

    <body class="adminBody bg-body-secondary" onload="loadChart();">
        <!-- Nav Bar-->
        <?php include "adminNavBar.php"; ?>
        <!-- Nav Bar-->

        <!-- chart -->

        <div style="width: 600px;">
            <h2 class="text-center">Most Sold Products</h2>
            <canvas id="myChart"></canvas>
        </div>


           <!--chart  -->






        <!--Footer-->
        <div class="fixed-bottom col-12">
            <p class="text-center">&copy; 2024 NextGen.lk || All Right Reserved</p>
        </div>
        <!--Footer-->


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    </body>

    </html>
<?php
} else {
    echo ("You are not valid admin");
}
