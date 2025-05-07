<?php
session_start();
include "connection.php";

if (isset($_SESSION["a"])) {
?>
    <!DOCTYPE html>
    <html lang="en" ">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Online Store - Admin Dashboard</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
        <style>
            .report-container {
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            .report-card {
                flex: 1 1 300px;
                max-width: 300px;
                margin: 1rem;
                text-align: center;
            }
            .report-card img {
                width: 100%;
                max-width: 150px;
                height: auto;
            }
            .adminBody {
                padding: 20px;
            }
        </style>
    </head>

    <body class="adminBody">
        <!-- nav bar  -->
        <?php
        include "adminNavBar.php";
        ?>
        <!-- nav bar  -->

        <div class="container border border-3 rounded-4">
            <h2 class="text-center mt-4">Reports</h2>

            <div class="container-fluid d-flex flex-wrap justify-content-center mt-5">
                <div class="report-card">
                    <img src="Resources/Img/stock.png" alt="Stock Report">
                    <a href="adminReportStock.php"><button class="btn btn-outline-info mt-4">Stock Report</button></a>
                </div>

                <div class="report-card">
                    <img src="Resources/Img/product.png" alt="Product Report">
                    <a href="adminReportProduct.php"><button class="btn btn-outline-info mt-4">Product Report</button></a>
                </div>

                <div class="report-card">
                    <img src="Resources/Img/minimal-profile-account-symbol-user-interface-theme-3d-icon-rendering-illustration-isolated-in-transparent-background-png.webp" alt="User Report">
                    <a href="adminReportUser.php"><button class="btn btn-outline-info mt-4">User Report</button></a>
                </div>
            </div>
        </div>



        <div class="fixed-bottom col-12">
            <p class="text-center">&copy; 2024 NextGen.lk || All Right Reserved</p>
        </div>

        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>

    </html>

<?php
} else {
    echo ("You are not a Valid Admin");
}
?>
