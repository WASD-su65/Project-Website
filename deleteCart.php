<?php
    require("server/connection.php");

    $order_no = $_GET["idpd"];
    
    $sql = "DELETE FROM carts WHERE order_no = '$order_no'";

    $result = mysqli_query($connect, $sql);

    if ($result) {
        header("location:cart.php");
        exit(0);
    } else {
        echo "เกิดข้อผิดพลาด <br>";
        echo "<a href='cart.php'>กลับหน้าเเรก</a>";
    }    
?>