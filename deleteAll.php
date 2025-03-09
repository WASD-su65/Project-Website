<?php
    require("server/connection.php");

    
    $sql = "DELETE FROM carts";

    $result = mysqli_query($connect, $sql);

    if ($result) {
        header("location:index.php");
        exit(0);
    } else {
        echo "เกิดข้อผิดพลาด <br>";
        echo "<a href='cart.index'>กลับหน้าเเรก</a>";
    }    
?>