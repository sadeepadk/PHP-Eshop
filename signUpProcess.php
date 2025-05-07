<?php
include "connection.php";

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$mobile = $_POST["m"];
$username = $_POST["u"];
$password = $_POST["p"];
$user_type_id = 1; // Default user type

if (empty($fname)) {
    echo "Please Enter Your First Name.";
} else if (strlen($fname) > 50) {
    echo "First Name must contain fewer than 50 characters.";
} else if (empty($lname)) {
    echo "Please Enter Your Last Name.";
} else if (strlen($lname) > 50) {
    echo "Last Name must contain fewer than 50 characters.";
} else if (empty($email)) {
    echo "Please Enter Your Email Address.";
} else if (strlen($email) > 100) {
    echo "Email must contain fewer than 100 characters.";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid Email Address.";
} else if (empty($username)) {
    echo "Please Enter Your Username.";
} else if (strlen($username) > 20) {
    echo "Username must contain fewer than 20 characters.";
} else if (empty($password)) {
    echo "Please Enter Your Password.";
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo "Password must contain 5 to 20 characters.";
} else if (empty($mobile)) {
    echo "Please Enter Your Mobile Number.";
} else if (strlen($mobile) != 10) {
    echo "Mobile Number must contain 10 characters.";
} else if (!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/", $mobile)) {
    echo "Invalid Mobile Number.";
} else {
    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '$email' OR `mobile` = '$mobile'");
    if ($rs->num_rows > 0) {
        echo "User with the same Email Address or Mobile Number already exists.";
    } else {
        Database::iud("INSERT INTO `user` (`fname`, `lname`, `email`, `mobile`, `password`, `username`, `user_type_id`) VALUES ('$fname', '$lname', '$email', '$mobile', '$password', '$username', '$user_type_id')");
        echo "success";
    }
}
?>
