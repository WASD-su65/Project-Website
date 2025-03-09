<?php
require('server/connection.php');

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


$sql = "INSERT INTO carts VALUES('', '$product_id', '$product_name', '$product_name_th', 
        '$price_s', '$price_l', '$size', '$soup', '$degree', '$vegetable', '$count')";
$result = mysqli_query($connect, $sql);

if ($result) {
    header("location:index.php");
    exit(0);
} else {
    echo mysqli_error($connect);
}