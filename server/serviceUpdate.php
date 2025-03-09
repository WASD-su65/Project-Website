<?php
require('connection.php');

    $queue = $_POST["queue"];
    $detail = $_POST["detail"];
    $cost = $_POST["cost"];
    $confirm = $_POST["confirm"];
    $pay = $_POST["pay"];
    $serve = $_POST["serve"];


$sql = "UPDATE orders SET queue = '$queue', detail = '$detail', 
        cost = '$cost', confirm = '$confirm', pay = '$pay', 
        serve = '$serve'
        WHERE queue = '$queue'";
$result = mysqli_query($connect, $sql);

if ($result) {
    header("location:service.php");
    exit(0);
} else {
    echo mysqli_error($connect);
}