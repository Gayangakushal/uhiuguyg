<?php
include "connection.php";

$pname = $_POST["pname"];
$brand = $_POST["brand"];
$cat = $_POST["cat"];
$color = $_POST["color"];
$size = $_POST["size"];
$desc = $_POST["desc"];


if(empty($pname)){
    echo ("Produc Enter the Product Name");
} else if($brand == "0"){
    echo ("Pleace select a Brand");
}elseif($cat == "0"){
 echo ("Pleace select a Category");   
}else if($color == "0"){
    echo ("Pleace select a Color");
}else if($size == "0"){
    echo ("Pleace select a Size");
}else if(empty($desc)){
    echo ("Pleace Enter the Description");
}else{

    if(isset($_FILES["image"])){
        $image = $_FILES["image"];

            $path = "Resources/productimg/" . uniqid() . ".jpg";
            move_uploaded_file($image["tmp_name"], $path);

        $rs  =  Database::search("SELECT * FROM `product` WHERE `name` = '$pname'");
            $num = $rs->num_rows;
            if($num > 0){
                
                echo("Product Has Been Already registered!");

              }  else{
                    Database::iud("INSERT INTO `product` (`name`, `description`, `path`, `brand_id`, `color_id`, `category_id`, `size_id`) 
                    VALUES ('$pname', '$desc', '$path', '$brand', '$color', '$cat', '$size')");  
           
           echo("Success");
        }
    }else{
        echo("Please Select an Image");
    }
}

