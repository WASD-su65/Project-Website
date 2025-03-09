<?php
require('server/connection.php');

$sql = "SELECT * FROM products WHERE product_id = '$product_id'";
$result = mysqli_query($connect, $sql);
?>
<?php
require('server/connection.php');

$sql2 = "SELECT * FROM carts ORDER BY order_no ASC";
$result2 = mysqli_query($connect, $sql2);

?>

<?php
require('server/connection.php');

$sql3 = "SELECT * FROM carts ORDER BY order_no ASC";
$result3 = mysqli_query($connect, $sql3);

?>
<?php
require('server/connection.php');
global $total_cost;
global $combin;
$sql4 = "SELECT * FROM carts ORDER BY order_no ASC";
$result4 = mysqli_query($connect, $sql4);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart</title>
  <link rel="stylesheet" href="\static\css\styles2.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: #be0029;">
<div id="google_translate_element"></div>
    <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"> </script>
    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                    pageLanguage: 'en'
                },
                'google_translate_element'
            );
        }
    </script>
  <div class="container">
    <div class="detail">
      <div class="indetail">
        <br><br>

          <div class="row">
            <div>
              <table class="table">
                <thead class="table-light">
                  <th style="width: 100px;">ลำดับที่</th>
                  <th style="width: 800px;">เมนู</th>
                  <th style="width: 100px;">จำนวน</th>
                  <th style="width: 100px;">ราคา</th>
                  <th style="width: 150px;"></th>
                </thead>
                <tbody>
                  <?php
                  $cnt = 1;
                  while ($row = mysqli_fetch_assoc($result2)) {

                  ?>
                  <form action="editCart.php" method="post">
                    <tr>
                      
                        <td><?php echo $cnt; ?></td>
                        <td><?php echo $row["product_name_th"]; ?>(<?php echo $row["size"]; ?>),  
                        <?php
                            if($row["soup"]=="pork"){
                                echo "น้ำสต๊อกหมู";
                            }
                            else if($row["soup"]=="beef"){
                                echo "น้ำสต๊อกวัว";
                            }
                        ?>
                        , ระดับความเผ็ด <?php echo $row["degree"]; ?> 
                        <?php
                            if($row["vegetable"]=="yes"){
                                echo ", ใส่ผัก";
                            }
                            else if($row["vegetable"]=="no"){
                                echo ", ไม่ใส่ผัก";
                            }
                        ?>
                        </td>
                        <td><?php echo $row["count"]; ?></td>
                        <td>

                        <?php
                            if($row["size"]=="L"){
                              echo $row["count"]*$row["price_l"];
                            }
                            else {
                              echo $row["count"]*$row["price_s"]; 
                            }
                        ?>

                        </td>
                        <td>
                            <a href="editCart.php?idpd=<?php echo $row["order_no"] ?>" class="btn btn-primary">เเก้ไข</a>
                            <a href="deleteCart.php?idpd=<?php echo $row["order_no"] ?>" class="btn btn-danger">ลบ</a>
                        </td>
                    </tr>
                  </form>
                  <?php $cnt++;
                  } ?>
                </tbody>
                <tfoot>
                  <td style="width: 100px;"></td>
                  <td style="width: 800px;"></td>
                  <td style="width: 100px;">ยอดรวม</td>
                  <td style="width: 100px;">
                  <?php
                    $total_cost = 0;
                    while ($r = mysqli_fetch_assoc($result3)) {
                      if($r["size"]=="L"){
                         $total_cost = $total_cost+$r["count"]*$r["price_l"];
                      }
                      else {
                        $total_cost = $total_cost+$r["count"]*$r["price_s"]; 
                      }
                    } 
                    echo $total_cost;
                  ?>
                  ฿</td>
                  <td style="width: 150px;"></td>
                </tfoot>
              </table>
              <?php
                while ($row = mysqli_fetch_assoc($result4)) {
                  $combin = $combin . "|   " .  $row["product_name_th"] . " (" . $row["size"] . "),  ระดับความเผ็ด: " . $row["degree"] . ", ผัก: {" . $row["vegetable"] . "}, จำนวน: " . $row["count"] . "  |\n";
                 }
              ?>
              <form action="confirmOrder.php" method="POST">
              <input type="hidden" name="detail" value="<?php echo $combin; ?>">
              <input type="hidden" name="cost" value="<?php echo $total_cost;; ?>">
              <input type="submit" value="ยืนยันคำสั่งซื้อ" class="btn btn-success">
              <a href="deleteAll.php" class="btn btn-danger">ลบทั้งหมด</a>
              <a href="index.php" class="btn btn-primary">กลับหน้าเเรก</a>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>
</body>
</html>