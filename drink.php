้
<?php
require('server/connection.php');

$sql = "SELECT * FROM products WHERE  product_id like 'D%' ORDER BY product_id ASC";
$result = mysqli_query($connect, $sql);
?>
<?php
require('server/connection.php');

$sql2 = "SELECT * FROM carts";
$result2 = mysqli_query($connect, $sql2);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Striegeln/Drink</title>
  <link rel="stylesheet" href="\static\css\styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer">
</head>

<body>
<div id="google_translate_element"></div>
    <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"> </script>
    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                    pageLanguage: 'th'
                },
                'google_translate_element'
            );
        }
    </script>
  <nav>
    <div class="nav-container">
      <a href="index.php">
        <img src="\image\logo.png" class="nav-logo">
      </a>
      <div class="nav-profile">
        <p class="nav-profile-name">Striegeln</p>
        <a href="cart.php">
        <div class="nav-bell-concierge">
          <i class="fas fa-bell-concierge"></i>
          <div class="menu-count">
            <?php
                $ic = 0;
                while ($i = mysqli_fetch_assoc($result2)) {
                    $ic += $i["count"];
                }
                echo $ic;
            ?>
          </div>
        </div>
        </a>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="menubar">
      <a href="index.php" class="menubar-items">
        เมนูทั้งหมด
      </a>
      <a href="mainmenu.php" class="menubar-items">
        เมนูหลัก
      </a>
      <a href="topping.php" class="menubar-items">
        เครื่องเคียง
      </a>
      <a href="drink.php" class="menubar-items" style="background-color:white; color: #be0029;">
        เครื่องดื่ม
      </a>
      <a href="promotion.php" class="menubar-items">
        ชุดสุดคุ้ม
      </a>
    </div>
    <div class="product">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="product-items">
        <form action="product.php" method="POST">
        <button type="hidden" style="border: white;">
          <input type="hidden" value="<?php echo $row["product_id"];?>" name="product_id">
          <img class="product-img" src="\static\productimage\<?php echo $row["product_id"]; ?>.PNG" alt="">
          <p style="font-size: 1.2vw;"><br><?php echo $row["product_name_th"]; ?></p>
          <p stlye="font-size: 1vw;"><?php echo $row["detail_th"]; ?></p><br>
        </button>
        </form>
        </div>
      <?php } ?>
    </div>
  </div>
  <div class="clear">
    <br>
  </div>
</body>

</html>