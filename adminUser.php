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

    <body class="adminBody bg-body-secondary" onload="loadUser();">
        <!-- Nav Bar-->
        <?php include "adminNavBar.php"; ?>
        <!-- Nav Bar-->

        <!-- chart -->



        <!-- chart-->

        <div class="col-10">
            <h2 class="text-center">User Management</h2>

            <div class="row d-flex justify-content-end mt-4">
                <div class="d-none" id="msgDiv" onclick=" reload();">
                    <div class="alert alert-danger" id="msg"></div>
                </div>
                <div class="col-2 ">
                    <input type="text" class="form-control border-black" placeholder="User Id" id="uid" />
                </div>
                <button class="btn btn-outline-success col-2" onclick="updateUserStatus();">Change Status</button>
            </div>

            <div class="mt-3">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">User Id</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody id="tb">
                        <!--Table Row-->


                        <!--Table Row-->

                    </tbody>


                </table>
            </div>
        </div>

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
