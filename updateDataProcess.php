<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$mobile = $_POST["m"];
$password = $_POST["p"];
$no = $_POST["n"];
$line1 = $_POST["l1"];
$line2 = $_POST["l2"];

if (empty($fname)) {
    echo ("Please Enter Your First Name.");
} else if (strlen($fname) > 50) {
    echo ("First Name must contain lower than 50 characters");
} else if (empty($lname)) {
    echo ("Please Enter Your Last Name.");
} else if (strlen($lname) > 50) {
    echo ("Last Name must contain lower than 50 characters.");
}else if(empty($email)){
    echo("Please Enter Your Email Address");
}else if(strlen($email)> 100){
    echo("Email must contain lower than 100 characters.");
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo("Invalid Email Address.");
} else if(empty($password)){
    echo("Please Enter Your Password.");
}else if(strlen($password) < 5 || strlen($password) > 20){
    echo ("Password must contain 5 to 20 characters.");
}else if(empty($mobile)){
    echo ("Please Enter Your Mobile Number.");
}else if(strlen($mobile) != 10){
    echo ("Mobile Number must contain 10 characters.");
}else if (!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/",$mobile)) { //quantifiers
    echo ("Invalid Mobile Number.");
}else if (empty($no)){
    echo("Please Enter Your Address No.");
}else if(strlen($no) > 10) {
    echo("Your Address No Should be less than 10 characters");
}else if(empty($line1)){
    echo ("Please Enter Your Address line 01");
}else if(strlen($line1) > 100) {
    echo ("Your Address Line 01 Should be less than 100 characters");
}else if(empty($line2)) {
    echo ("Please Enter Your Address Line 02");
}else if(strlen($line2) > 100) {
    echo ("Your Address Line 02 Should be less than 100 Characters");
}else{
    //update query

    Database::iud("UPDATE `user` SET `fname` = '" . $fname . "', `lname` = '" . $lname . "', `email` = '" . $email . "', `mobile` = '" . $mobile . "',
    `password` = '" . $password . "', `no`= '" . $no . "', `line_1` = '" . $line1 . "', `line_2` = '" . $line2 . "' WHERE `id`= '" . $user["id"] . "'");

    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $user["id"] . "'");
    $d = $rs->fetch_assoc();
    $_SESSION["u"] = $d;

    echo("Update Successfully");
}

?>