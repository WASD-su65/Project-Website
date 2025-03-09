<?php
    
    require("connection.php");

    $queue = $_GET["queue"];

    $sql = "DELETE FROM orders WHERE queue = '$queue'";

    $result = mysqli_query($connect, $sql);

    if ($result) {
        header("location:service.php");
        exit(0);
    } else {
        echo "เกิดข้อผิดพลาด <br>";
        echo "<a href='admin.php'>กลับหน้าเเรก</a>";
    }  

?>