<?php
require('connection.php');

if(isset($_POST["idcheckbox"])) {

    $multiple_id = $_POST["idcheckbox"];

    $placeholders = implode(',', array_fill(0, count($multiple_id), '?'));

    // สร้าง SQL Query ด้วย bind parameter ในรูปแบบของ placeholder
    $sql = "DELETE FROM products WHERE product_id IN ($placeholders)";
    $stmt = mysqli_prepare($connect, $sql);

    // ผูกค่าของ idcheckbox เข้ากับ placeholder ใน SQL Query
    $types = str_repeat('s', count($multiple_id)); // สมมติว่า product_id เป็น varchar ทุกตัว
    mysqli_stmt_bind_param($stmt, $types, ...$multiple_id); // ใช้ ... ในการส่งค่าให้ bind_param แต่ละตัว

    // ทำการ execute SQL Query
    mysqli_stmt_execute($stmt);

    // ตรวจสอบว่าลบข้อมูลสำเร็จหรือไม่
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        header("location:admin.php");
        exit(0);
    } else {
        echo "ไม่พบข้อมูลที่ต้องการลบ";
    }

    mysqli_stmt_close($stmt);
} else {
    echo "ไม่มีข้อมูลที่ต้องการลบ";
}

// ปิดการเชื่อมต่อ
mysqli_close($connect);
?>