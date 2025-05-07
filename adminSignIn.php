<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <title>Online Store | Login</title>
</head>    

<body class="adminsignInBody">

  <div class="adminsignIn_Box">

  <div class="me-1 p-1" style="margin-left:25%">
            <img src="Resources/Img/ng.jpg" alt="Logo">
        </div>
    <h2 class="text-center" style=" font-weight: bold;">Admin Login</h2>

    <div class="mt-3">
        <label for="form-label">Username:</label>
        <input type="text" class="form-control border-black " placeholder=" Ex: Sahan" id="un" />
    </div>

    <div class="mt-3 mb-3">
        <label for="form-label">Password:</label>
        <input type="password" class="form-control border-black " placeholder=" Ex: ********" id="pw" />
    </div>

    <div id="msgDiv">
        <div class="alert alert-danger col-12 d-none " id="msg"></div>
    </div>

    <div class="mt-4">
        <button class="btn btn-danger col-12 " onclick="adminSignIn();">Sign In</button>
    </div>

  </div>  

  <script src="script.js"></script>
</body>
</html>
