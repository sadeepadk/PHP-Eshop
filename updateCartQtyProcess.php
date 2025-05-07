<?php

include "connection.php";

$cartId = $_POST["c"];
$newQty = $_POST["q"];


$rs = Database::search("SELECT * FROM `cart` INNER JOIN `stock` ON `cart`.`stock_id` =
`stock`.`id` WHERE `cart`.`cart_id` = '" . $cartId . "'");

$num = $rs->num_rows;

if ($num > 0) {
    //cart item found
    $d = $rs->fetch_assoc();

    if($d["qty"] >= $newQty){
        //update query
        Database::iud("UPDATE `cart` SET `cart_qty` = '" . $newQty . "' WHERE `cart_id` = '" . $cartId . "' ");
        echo("Success");
    }else{
        echo("Your Product Quantity exceeded!");
    }


}else{
     echo("Cart Item Not Found");
}

?>