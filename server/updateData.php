<?php
require('connection.php');

    $product_id = $_POST["product_id"];
    $product_name = $_POST["product_name"];
    $product_name_th = $_POST["product_name_th"];
    $detail = $_POST["detail"];
    $detail_th = $_POST["detail_th"];
    $imagefile = $_POST["imagefile"];
    $price_s = $_POST["price_s"];
    $price_l = $_POST["price_l"];
    $stock = $_POST["stock"];

$sql = "UPDATE products SET product_name = '$product_name', product_name_th = '$product_name_th', 
        detail = '$detail', detail_th = '$detail_th', imagefile = '$imagefile', 
        price_s = '$price_s', price_l = '$price_l', stock = '$stock'
        WHERE product_id = '$product_id'";
$result = mysqli_query($connect, $sql);

if ($result) {
    header("location:admin.php");
    exit(0);
} else {
    echo mysqli_error($connect);
}