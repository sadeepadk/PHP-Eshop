<?php


include "connection.php";


$size = $_POST["s"];
//echo($color);

if(empty($size)){
    echo("Please Enter Your Size");
}else if (strlen($size) > 20) {
    echo("Your size name should be less than 20 characters");

}else {
    $rs = Database::search("SELECT * FROM `size` WHERE `size_name` = '" . $size ."'");
    $num = $rs->num_rows;
    
    if ($num >0){

        echo("Your Size Name is Already Exixts");

    }else{
        Database::iud("INSERT INTO `size` (`size_name`) VALUES ('".$size."')");
        echo("Success");

    }
}


?>