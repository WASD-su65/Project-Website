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

$sql = "INSERT INTO products(product_id , product_name, product_name_th, detail, detail_th, imagefile, price_s, price_l, stock) 
VALUES('$product_id', '$product_name', '$product_name_th', '$detail', '$detail_th', '$imagefile', '$price_s', '$price_l', ' $stock')";
$result = mysqli_query($connect, $sql);

if ($result) {
    header("location:admin.php");
    exit(0);
} else {
    echo mysqli_error($connect);
}
