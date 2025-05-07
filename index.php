<?php

include "connection.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css" />
    <title>NextGen | Home</title>
</head>

<body onload="loadProduct(0);">

    <!--navbar-->
    <?php include "navBar.php" ?>
    <!--navbar-->

    <!--basic search-->
    <div class="container mt-5 ">
        <div class="row justify-content-end">
            <div class="col-12 col-md-6 col-lg-3 mt-3 mt-md-5 container-fluid ms-0">
                <ul class="nav nav-tabs font">
                    <li class="nav-item  me-3 ">
                        <a class="nav-link active bg-info" aria-current="page" href="mens.php">Men's</a>
                    </li>
                    <li class="nav-item me-3 ">
                        <a class=" nav-link active bg-info" aria-current="page" href="women.php">Women's</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active bg-info" aria-current="page" href="kids.php">Kids</a>
                    </li>

                </ul>
            </div>


            <div class="col-12 col-md-6 col-lg-3 mt-3 mt-md-5">
                <input type="text" class="form-control border-black" placeholder="Product Name" id="product" onkeyup="searchProduct(0)" />
            </div>
            <div class="col-12 col-md-4 col-lg-2 mt-3 mt-md-5">
                <button class="btn btn-outline-info w-100" onclick="viewFilter();">Filters</button>
            </div>

        </div>
    </div>


    <!--Advanced Search-->
    <div class="d-none" id="filterId">
        <div class="border border-dark bg-dark rounded-4 mt-4 p-5 container">
            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <label for="color-select" class="form-label text-white">Color</label>
                    <select name="color" class="form-select" id="color">
                        <option value="0">Select Color</option>
                        <?php
                        $rs = Database::search("SELECT * FROM `color`");
                        $num = $rs->num_rows;

                        for ($i = 0; $i < $num; $i++) {
                            $d = $rs->fetch_assoc();
                        ?>
                            <option class="bg-white" value="<?php echo $d["color_id"] ?>"><?php echo $d["color_name"] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label for="cat-select" class="form-label text-white">Category</label>
                    <select name="cat" class="form-select" id="cat">
                        <option value="0">Select Category</option>
                        <?php
                        $rs2 = Database::search("SELECT * FROM `category`");
                        $num2 = $rs2->num_rows;

                        for ($i = 0; $i < $num2; $i++) {
                            $d2 = $rs2->fetch_assoc();
                        ?>
                            <option class="bg-white" value="<?php echo $d2["cat_id"] ?>"><?php echo $d2["cat_name"] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <label for="brand" class="form-label text-white">Brand</label>
                    <select name="brand" class="form-select" id="brand">
                        <option value="0">Select Brand</option>
                        <?php
                        $rs3 = Database::search("SELECT * FROM `brand`");
                        $num3 = $rs3->num_rows;

                        for ($i = 0; $i < $num3; $i++) {
                            $d3 = $rs3->fetch_assoc();
                        ?>
                            <option value="<?php echo $d3["brand_id"] ?>"><?php echo $d3["brand_name"] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label for="size" class="form-label text-white">Size</label>
                    <select name="size" class="form-select" id="size">
                        <option value="0">Select Size</option>
                        <?php
                        $rs4 = Database::search("SELECT * FROM `size`");
                        $num4 = $rs4->num_rows;

                        for ($i = 0; $i < $num4; $i++) {
                            $d4 = $rs4->fetch_assoc();
                        ?>
                            <option value="<?php echo $d4["size_id"] ?>"><?php echo $d4["size_name"] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-5 mb-3">
                    <input type="text" class="form-control border-dark" placeholder="Min Price" id="min">
                </div>
                <div class="col-12 col-md-5 mb-3">
                    <input type="text" class="form-control border-black" placeholder="Max Price" id="max">
                </div>
                <div class="col-12 col-md-2 mb-3">
                    <button class="btn btn-outline-info w-100" onclick="advSearchProduct(0);">Search</button>
                </div>
            </div>
        </div>
    </div>

    <!--bgimg-->
    <div class="card text mt-4">
        <img src="Resources/Img/bg-img.jpg" class="card-img" style="height: 800px;">
        <div class="card-img-overlay">
            <h4 class="card-title font ">Better Choices , Better Prices.....
            </h4>
            <h3 class="font">Welcome NEXTGEN</h3>

            <h2 class="font">Up to 50% OFF</h2>



            <div class="container mt-5 col-4">

                <div id="carouselExampleAutoplaying" class="carousel slide " data-bs-ride="carousel" style="margin-bottom: 30%; margin-top:-30%; translate: 350px;">
                    <div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="Resources/Img/banner3.jpg" class="d-block w-100 mt-3" height="200px;">
                            </div>
                            <div class="carousel-item">
                                <img src="Resources/Img/banner2.jpg" class="d-block w-100 mt-3" height="200px;">
                            </div>
                            <div class="carousel-item">
                                <img src="Resources/Img/banner1.jpg" class="d-block w-100 mt-3" height="200px">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>



            <div class="container mt-5 col-4">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" style=" margin-top: 60%;   translate: 350px;">
                    <div>
                        <div class="carousel-inner rounded-3">
                            <div class="carousel-item active">
                                <img src="Resources/Img/Moose-banner-1.png" class="d-block w-100 mt-3" height="200px;">
                            </div>
                            <div class="carousel-item">
                                <img src="Resources/Img/Moose-banner-2.png" class="d-block w-100 mt-3" height="200px;">
                            </div>
                            <div class="carousel-item">
                                <img src="Resources/Img/34e1ff4a-c401-4eeb-9493-d0dadab63976.jpg_1200x1200.jpg" class="d-block w-100 mt-3" height="200px">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!--bgimg-->

    <!--Carousel-->
    <div class="container mt-5">

        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="Resources/Img/Moose-banner-1.png" class="d-block w-100 mt-3" height="600px;">
                </div>
                <div class="carousel-item">
                    <img src="Resources/Img/Moose-banner-2.png" class="d-block w-100 mt-3" height="600px;">
                </div>
                <div class="carousel-item">
                    <img src="Resources/Img/34e1ff4a-c401-4eeb-9493-d0dadab63976.jpg_1200x1200.jpg" class="d-block w-100 mt-3" height="600px">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!--Load Product-->
    <div class="container mt-5">
        <div class="row" id="pid">
            <!-- Products will be loaded here dynamically -->
        </div>
    </div>

    <!--Footer-->
    <?php include "footer.php" ?>
    <!--Footer-->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js"></script>
</body>

</html>