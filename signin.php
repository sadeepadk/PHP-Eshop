<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <title>NextGen | Login</title>
</head>

<body class="signIn_Body">

    <!-- Sign In Box -->
    <div class="signIn_Box col-lg-3" id="signIn_Box">

        <div class="me-1 p-1" style="margin-left:25%">
            <img src="Resources/Img/ng.jpg" alt="Logo">
        </div>

        <h2 class="text-center textcolor mt-2">Sign In</h2>

        <?php
        $username = isset($_COOKIE["username"]) ? $_COOKIE["username"] : "";
        $password = isset($_COOKIE["password"]) ? $_COOKIE["password"] : "";
        ?>

        <div class="mt-3">
            <label for="un" class="textcolor">Username :</label>
            <input type="text" class="form-control" id="un" value="<?php echo $username; ?>" />
        </div>

        <div class="mt-3">
            <label for="pw" class="textcolor">Password :</label>
            <input type="password" class="form-control" id="pw" value="<?php echo $password; ?>" />
        </div>

        <div class="mt-3 mb-3">
            <input type="checkbox" class="form-check-input" id="rm" />
            <label for="rm" class="textcolor">Remember Me</label>
        </div>

        <div>
            <a href="adminSignIn.php" class="ps-1"><u>Are You An Admin ?</u></a>
        </div>

        <div class="d-none" id="msgDiv2">
            <div class="alert alert-danger" id="msg2"></div>
        </div>

        <div class="mt-3">
            <button class="btn btn-danger col-12" onclick="signIn();">Sign In</button>
        </div>

        <div class="mt-3">
            <a href="fogetPassword.php"><button class="btn btn-outline-info btn-sm col-12">Forget Password</button></a>
        </div>

        <div class="mt-3 mb-3">
            <button class="btn btn-outline-success col-12" onclick="changeView();">New to Online Store? Please Sign Up</button>
        </div>

        <a href="https://www.facebook.com/" class="btn btn-google btn-block py-2">
            <img src="Resources/5296499_fb_facebook_facebook logo_icon.png" alt="" height="30" class="icon">
        </a>

        <a href="https://www.google.com" class="btn btn-google btn-block py-2">
            <img src="Resources/1298745_google_brand_branding_logo_network_icon.png" alt="" height="30" class="icon">
        </a>

    </div>
    <!-- Sign In Box -->

    <!-- Sign Up Box -->
    <div class="col-12 col-lg-4 signUp_Box d-none" id="signUp_Box">

        <div class="me-1 p-1" style="margin-left:32%">
            <img src="Resources/Img/ng.jpg" alt="Logo">
        </div>
        <div class="row">
            <h2 class="text-center textcolor">Sign Up</h2>
            <form id="signUpForm">
                <div class="row">
                    <div class="mt-3 col-6">
                        <label for="fname" class="textcolor">First Name :</label>
                        <input type="text" class="form-control" placeholder="Ex: Sadeepa" id="fname" />
                    </div>

                    <div class="mt-3 col-6">
                        <label for="lname" class="textcolor">Last Name :</label>
                        <input type="text" class="form-control" placeholder="Ex: Karunarathna" id="lname" />
                    </div>
                </div>
                <div class="mt-3">
                    <label for="email" class="textcolor">Email :</label>
                    <input type="email" class="form-control" placeholder="Ex: sadeepa@gmail.com" id="email" />
                </div>

                <div class="mt-3">
                    <label for="mobile" class="textcolor">Mobile :</label>
                    <input type="text" class="form-control" placeholder="Ex: 0742576059" id="mobile" />
                </div>

                <div class="mt-3">
                    <label for="username" class="textcolor">Username :</label>
                    <input type="text" class="form-control" placeholder="Ex: sadeepa123" id="username" />
                </div>

                <div class="mt-3 mb-3">
                    <label for="password" class="textcolor">Password :</label>
                    <input type="password" class="form-control" placeholder="***********" id="password" />
                </div>

                <div class="d-none" id="msgDiv1">
                    <div class="alert alert-danger" id="msg1"></div>
                </div>

                <div class="mt-3">
                    <button type="button" class="btn btn-success col-12" onclick="signUp();">Sign Up</button>
                </div>

                <div class="mt-3">
                    <button type="button" class="btn btn-outline-danger col-12" onclick="changeView();">Already Have an Account? Please Sign In</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Sign Up Box -->

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>