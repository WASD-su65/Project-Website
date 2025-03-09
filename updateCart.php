<?php
require('server/connection.php');

    $order_no = $_POST["order_no"];
    $product_id = $_POST["product_id"];
    $product_name = $_POST["product_name"];
    $product_name_th = $_POST["product_name_th"];
    $price_s = $_POST["price_s"];
    $price_l = $_POST["price_l"];
    $size = $_POST["size"];
    $soup = $_POST["soup"];
    $degree = $_POST["degree"];
    $vegetable = $_POST["vegetable"];
    $count = $_POST["count"];


    $sql = "UPDATE carts SET  product_id = '$product_id', product_name = '$product_name', 
    product_name_th = '$product_name_th', price_s = '$price_s', price_l = '$price_l', 
    size = '$size' , soup = '$soup', degree = '$degree', vegetable = '$vegetable', count = '$count' 
    WHERE order_no = '$order_no'";

$result = mysqli_query($connect, $sql);

if ($result) {
    header("location:cart.php");
    exit(0);
} else {
    echo mysqli_error($connect);
}