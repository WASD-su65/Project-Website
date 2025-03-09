<?php
require('server/connection.php');

    $detail = $_POST["detail"];
    $cost = $_POST["cost"];

$sql = "INSERT INTO orders VALUES('', '$detail', '$cost', 'NO', 'NO', 'NO')";
$result = mysqli_query($connect, $sql);

if ($result) {
    header("location:deleteAll.php");
    exit(0);
} else {
    echo mysqli_error($connect);
}