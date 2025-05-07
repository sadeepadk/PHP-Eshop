<?php

session_start();
include "connection.php";

$user = $_SESSION["u"];

if (isset($user)) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="style.css" />
        <title>NextGen | Cart</title>
    </head>

    <body onload="loadCart();">
        <!--navBar-->
        <?php include "navBar.php" ?>
        <!--navBar-->

        <div class="container mt-5 bg-body-secondary">
            <div class="row" id="cartBody">

                <!--Cart load here-->

              
                <!-- checkout -->

              
            </div>

        </div>







        <script src="bootstrap.js"></script>
        <script src="script.js"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>
    </html>

<?php

} else {
    header("location: signIn.php");
}



?>