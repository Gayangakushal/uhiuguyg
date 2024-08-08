<?php

include "connection.php";

$productId = $_POST["p"];
$qty = $_POST["q"];
$price = $_POST["up"];

// echo($productId);

if(empty($qty)){
    echo ("Please Enter Your Quantity");
}elseif(!is_numeric($qty)){
    echo ("Only Numbers Can Be Entered for quantity"); 
}elseif(strlen($qty) > 10){
    echo("Your Qty Should be less than 10 Characters");
}elseif(empty($price)){
    echo ("Please Enter Your Unit Price");
}elseif(!is_numeric($price)){
    echo ("Only Numbers Can Be Entered for Unit Price");
}elseif(strlen($price) > 10){
    echo("Your Price Should be less than 10 Characters");
}else{
    // echo ("Success");

    $rs = Database::search("SELECT * FROM `stock` WHERE `product_id` = '" . $productId . "' AND `price` = '" . $price . "'");
    $num = $rs->num_rows;
    $d = $rs->fetch_assoc();
    
    if ($num == 1) {
        $newQty = $d["qty"] + $qty;
        Database::iud("UPDATE `stock` SET `qty` = '" . $newQty . "' WHERE `product_id` = '" . $productId . "' AND `price` = '" . $price . "'");
        echo ("Stock Updated Successfully");
    } else {
        Database::iud("INSERT INTO `stock` (`price`, `qty`, `product_id`) VALUES ('" . $price . "', '" . $qty . "', '" . $productId . "')");
        echo ("New Stock Added Successfully");
    }
    
   
   
}

?>