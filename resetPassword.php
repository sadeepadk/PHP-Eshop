<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <title>NextGen | Reset Password</title>
</head>

<body class="signIn_Body">

    <!-- Sign In Box -->
    
    <div class="signIn_Box" id="signInBox">

          
            <div class="me-1 p-1" style="margin-left:25%">
                <img src="Resources/Img/ng.jpg" alt="Logo">
            </div>
        
        
   

        <h2 class="text-center textcolor mt-2">Reset Password</h2>

        <div class="d-none">
            <input type="hidden" id="vcode" value="<?php echo ($_GET["vcode"]) ?>"/>
        </div>


        <div class="mt-4 ">
            <label for="form-label" class="textcolor">Password :</label>
            <input type="text" class="form-control" id="np" />
        </div>

        <div class="mt-4 mb-4">
            <label for="form-label" class="textcolor">Re-enter Password :</label>
            <input type="text" class="form-control" id="np2" />
        </div>

        

        <div class="d-none" id="msgDiv">
            <div class="alert alert-danger" id="msg"></div>
        </div>

        <div class="mt-4">
            <button class="btn btn-danger col-12" onclick="resetPassword();">Update</button>
        </div>

       
      
          
        


    </div>




            <script src="script.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>
    </html>