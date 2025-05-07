<?php
session_start();
include "connection.php";

if (isset($_SESSION["a"])) {

    $rs = Database::search("SELECT * FROM `user`
    INNER JOIN `user_type` ON `user`.`user_type_id` = `user_type`.`id`
    ORDER BY `user`.`id` ASC");
    $num = $rs->num_rows;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Report</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <script src="script.js" defer></script>
    <style>
        /* Custom styles for better mobile responsiveness */
        .container {
            max-width: 100%;
            padding: 0 15px;
        }
        .table-responsive {
            display: flex;
            flex-direction: column;
            overflow-x: auto;
        }
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }
        .table thead th {
            white-space: nowrap;
        }
        @media (max-width: 768px) {
            .btn {
                width: 100%;
                margin-bottom: 1rem;
            }
        }
    </style>
</head>

<body >
    


    <div class="container mt-3">
        <a href="adminDashboard.php">
            <img src="Resources/Img/back.png" height="25" alt="Back">
        </a>
    </div>

    <div class="container mt-3" id="printArea">
        <h2 class="text-center">User Report</h2>

        <div>
            <div class="text-center">
                <img src="Resources/Img/ng.jpg" class="mt-4" height="50" alt="NextGen Logo">
                <h3 class="mt-3">N E X T G E N</h3>
                <p>&copy; NextGen.lk || All Rights Reserved.</p>
            </div>
            </div>

<div class="border border-3 rounded-3 ps-2 pe-2">
            <div class="table-responsive mt-5">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>User Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>User Type</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        for ($i = 0; $i < $num; $i++) {
                            $d = $rs->fetch_assoc();
                        ?>
                            <tr>
                                <td><?php echo $d["id"] ?></td>
                                <td><?php echo $d["fname"] ?></td>
                                <td><?php echo $d["lname"] ?></td>
                                <td><?php echo $d["email"] ?></td>
                                <td><?php echo $d["mobile"] ?></td>
                                <td><?php echo $d["type"] ?></td>
                                <td><?php echo $d["status"] == 1 ? "Active" : "Inactive"; ?></td>
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
