<?php

session_start();

if (isset($_SESSION["a"])) {

?>


   <!DOCTYPE html>
   <html lang="en">

   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="style.css" />
      <link rel="stylesheet" href="bootstrap.css" />
      <title>Online Store | Login</title>
   </head>

   <body class="adminBody justify-content-center">

      <!-- nav Bar -->
      <?php include "adminNavBar.php"; ?>
      <!-- nav Bar -->

      <div class="col-10 container  mt-5 rounded-4 justify-content-center align-items-center ">
         <h2 class="text-center">Product Management</h2>



         <div class="row">
            <!--Brand Register-->
            <div class="col-4 offset-1 mt-4">

               <label for="form-label">Brand Name :</label>
               <input type="text" class="form-control mb-3 border-black" id="brand">



               <div class="d-none" id="msgDiv1" onclick="reload();">
                  <div class="alert alert-danger" id="msg1"></div>
               </div>

               <div>
                  <button class="btn btn-outline-info col-12" onclick="brandReg();">Brand Register</button>
               </div>
            </div>

            <!--Brand Register-->

            <!--Category Register-->
            <div class="col-4 offset-2 mt-4">

               <label for="form-label">Category :</label>
               <input type="text" class="form-control mb-3 border-black" id="cat">



               <div class="d-none" id="msgDiv2">
                  <div class="alert alert-danger" id="msg2"></div>
               </div>

               <div>
                  <button class="btn btn-outline-info col-12" onclick="categoryReg();">Category Register</button>
               </div>

            </div>

         </div>


         <div class="row mt-5">
            <!--color Register-->
            <div class="col-4 offset-1 mt-4">

               <label for="form-label">Color :</label>
               <input type="text" class="form-control mb-3 border-black" id="color">



               <div class="d-none" id="msgDiv3" onclick="reload();">
                  <div class="alert alert-danger" id="msg3"></div>
               </div>

               <div>
                  <button class="btn btn-outline-info col-12" onclick="colorReg();">Color Register</button>
               </div>
            </div>

            <!--color Register-->

            <!--Size Register-->
            <div class="col-4 offset-2 mt-4">

               <label for="form-label">Size :</label>
               <input type="text" class="form-control mb-3 border-black" id="size">



               <div class="d-none" id="msgDiv4" onclick="reload();">
                  <div class="alert alert-danger" id="msg4"></div>
               </div>

               <div>
                  <button class="btn btn-outline-info col-12" onclick="sizeReg();">Size Register</button>
               </div>

            </div>

         </div>



      </div>




      <!--Footer-->
      <div class="fixed-bottom col-12">
            <p class="text-center">&copy; 2024 NextGen.lk || All Right Reserved</p>
        </div>
      <!--Footer-->

      <script src="script.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   </body>


<?php


} else {
   echo ("You are not a valid Admin");
}
