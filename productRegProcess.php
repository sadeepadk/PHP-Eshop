<?php

include "connection.php";

$pname = $_POST["pname"];
$brand = $_POST["brand"];
$cat = $_POST["cat"];
$color = $_POST["color"];
$size = $_POST["size"];
$gender = $_POST["gender"];
$desc = $_POST["desc"];


if(empty($pname)){
    echo ("Please enter the product name");
}else if($brand == "0"){
    echo("Please select a brand");
}else if($cat == "0"){
    echo("Please select a category");
}else if($color == "0"){
    echo("Please select a color");
}else if($size == "0"){
    echo("Please select a size");
}else if($gender == "0"){
    echo("Please enter gender type");
}else if(empty($desc)){
    echo("please enter the description");
}else{

    if(isset($_FILES["image"])){
        $image = $_FILES["image"];

        $path = "Resources/ProductImg" . uniqid() . ".png";
        move_uploaded_file($image["tmp_name"], $path);

        $rs = Database::search("SELECT * FROM `product` WHERE `name` = '$pname'");
        $num = $rs->num_rows;

        if($num > 0){
            echo("Product has been already registerd");
        }else{
            Database::iud("INSERT INTO `product`(`name`, `description`, `path`, `brand_brand_id`, `color_color_id`, `size_size_id`, `category_cat_id`,`gender_gender_id`) VALUES 
            ('$pname', '$desc', '$path', '$brand', '$color', '$size', '$cat', '$gender')");

            echo("success");
        } 

    }else{
            echo("Please select a product image");
        }
   
}

   



?>