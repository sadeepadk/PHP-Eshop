<?php
session_start();
include "connection.php";

if (isset($_SESSION["a"])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <title>NextGen | Admin Panel</title>
        <style>
            .adminBody {
                padding: 20px;
            }

           
        </style>
    </head>

    <body>

        <?php
        include "adminNavBar.php";
        ?>

        <div class="container mt-5  ">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h2 class="text-center mt-4 ">Product Registration</h2>
                    <div>
                        <hr>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="pname">Product Name</label>
                        <input type="text" id="pname" class="form-control border-black">
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="brand">Brand</label>
                            <select id="brand" class="form-select  border-black">
                                <option value="0">Select</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `brand`");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $data = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($data["brand_id"]); ?>"><?php echo ($data["brand_name"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="cat">Category</label>
                            <select id="cat" class="form-select  border-black">
                                <option value="0">Select</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `category`");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $data = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($data["cat_id"]); ?>"><?php echo ($data["cat_name"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="color">Color</label>
                            <select id="color" class="form-select  border-black">
                                <option value="0">Select</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `color`");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $data = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($data["color_id"]); ?>"><?php echo ($data["color_name"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="size">Size</label>
                            <select id="size" class="form-select  border-black">
                                <option value="0">Select</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `size`");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $data = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($data["size_id"]); ?>"><?php echo ($data["size_name"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="gender">G-Type</label>
                        <select id="gender" class="form-select  border-black">
                            <option value="0">Select</option>
                            <?php
                            $rs = Database::search("SELECT * FROM `gender`");
                            $num = $rs->num_rows;

                            for ($x = 0; $x < $num; $x++) {
                                $data = $rs->fetch_assoc();
                            ?>
                                <option value="<?php echo ($data["gender_id"]); ?>"><?php echo ($data["gender_type"]); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="desc">Description</label>
                        <textarea id="desc" class="form-control  border-black" rows="2"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="file">Product Image</label>
                        <input id="file" class="form-control  border-black" type="file">
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-info" onclick="regProduct();">Register Product</button>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <h2 class="text-center mt-4">Stock Update</h2>

                    <div>
                        <hr>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="selectProduct">Product Name</label>
                        <select class="form-control  border-black" id="selectProduct">
                            <option>Select</option>
                            <?php
                            $rs = Database::search("SELECT * FROM `product`");
                            $num = $rs->num_rows;

                            for ($x = 0; $x < $num; $x++) {
                                $data = $rs->fetch_assoc();
                            ?>
                                <option value="<?php echo ($data["id"]); ?>"><?php echo ($data["name"]); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="qty">Qty</label>
                        <input type="text" class="form-control  border-black" id="qty">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="uprice">Unit Price</label>
                        <input type="text" class="form-control  border-black" id="uprice">
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-info" onclick="updateStock();">Update Stock</button>
                    </div>

                    

                    <div>
                    <h2 class="text-center mt-4">Stock Remove</h2>
                    <hr>

                    <div class="mb-3">
                        <label class="form-label" for="selectProduct">Product Name</label>
                        <select class="form-control  border-black" id="selectProduct">
                            <option>Select</option>
                            <?php
                            $rs = Database::search("SELECT * FROM `product`");
                            $num = $rs->num_rows;

                            for ($x = 0; $x < $num; $x++) {
                                $data = $rs->fetch_assoc();
                            ?>
                                <option value="<?php echo ($data["id"]); ?>"><?php echo ($data["name"]); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-info" onclick="updateStock();">Remove Stock</button>
                    </div>

                    </div>
                </div>
            </div>
        </div>


        <!--Footer-->
      <div class="fixed-bottom col-12 mt-4">
            <p class="text-center mt-4">&copy; 2024 NextGen.lk || All Right Reserved</p>
        </div>
      <!--Footer-->

        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>

    </html>

<?php
} else {
    echo ("You're not an admin");
}
?>