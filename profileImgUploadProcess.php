<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

if (empty($_FILES["i"])) {
    echo("empty");
}else{
    //upload image
    $rs = Database::search("SELECT * from `user` WHERE `id` = '" . $user["id"] . "'");
    $d = $rs->fetch_assoc();

    if (!empty($d["img_path"])) {
        unlink($d["img_path"]); //delete from the project
    }

    $path = "Resources/profileImg//" . uniqid() . ".png";
    move_uploaded_file($_FILES["i"]["tmp_name"], $path);
    Database::iud("UPDATE `user` SET `img_path` = '" . $path . "' WHERE `id` = '" . $user["id"] . "'");
    echo($path);

}



?>