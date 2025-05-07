<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <title>NextGen | Forget Password</title>
</head>

<body class="signIn_Body">

    <!-- Sign In Box -->

    <div class="signIn_Box" id="signInBox">


        <div class="me-1 p-1" style="margin-left:25%">
            <img src="Resources/Img/ng.jpg" alt="Logo">
        </div>




        <h2 class="text-center textcolor mt-2">Forget Password</h2>


        <div class="mt-4 mb-4">
            <label for="form-label" class="textcolor">Email :</label>
            <input type="text" class="form-control" id="e" />
        </div>





        <div class="d-none" id="msgDiv">
            <div class="alert alert-success" id="msg"></div>
        </div>

        <div class="mt-4">
            <button class="btn btn-danger col-12" onclick="forgetPassword();">Send Email</button>
        </div>







    </div>




    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>