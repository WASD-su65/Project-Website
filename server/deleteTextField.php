<?php
    require("connection.php");

    $product_id = $_POST["product_id"];
    
    $sql = "DELETE FROM products WHERE product_id = '$product_id'";

    $result = mysqli_query($connect, $sql);

    if ($result) {
        header("location:admin.php");
        exit(0);
    } else {
        echo "เกิดข้อผิดพลาด <br>";
        echo "<a href='admin.php'>กลับหน้าเเรก</a>";
    }    
?>
