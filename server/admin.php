<?php
require('connection.php');

$sql = "SELECT * FROM products ORDER BY product_id ASC";
$result = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-body-tertiary">
    <div class="container" style="margin-top: 30px;">
        <h4>ADMIN TERMINAL</h4>
        <br>
        <a href="admin.php" class="btn btn-light">ADMIN</a>
        <a href="service.php" class="btn btn-primary">SERVICE</a><br><br>
        <div class="row g-5">
            <div class="col-md-8 col-sm-12">
                <form action="insertdata.php" method="POST">

                    <div class="row g-3 mb-3">
                        <div class="col-sm-6">
                            <label class="form-label">Product ID</label>
                            <input type="text" name="product_id" class="form-control" required>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Image</label>
                            <input type="file" name="imagefile" class="form-control" accept="image/png, image/jpg, image/jpeg" required>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Product Name</label>
                            <input type="text" name="product_name" class="form-control" required>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Product Name(TH)</label>
                            <input type="text" name="product_name_th" class="form-control" required>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Detail</label>
                            <input type="text" name="detail" class="form-control" value="">
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Detail(TH)</label>
                            <input type="text" name="detail_th" class="form-control" value="">
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Price(S)</label>
                            <input type="text" name="price_s" class="form-control" required>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Price(L)</label>
                            <input type="text" name="price_l" class="form-control" required>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Stock</label>
                            <input type="number" name="stock" class="form-control" required>
                        </div>
                    </div>

                    <input type="submit" value="Submit" class="btn btn-success">
                    <input type="reset" value="Reset" class="btn btn-danger">
                </form>
            </div>
        </div>
        <hr class="my-4">
        <form action="deleteTextField.php" class="form-group" method="POST">
            <label for="">Product ID</label>
            <input type="text" placeholder="Enter Product ID" class="from-control" name="product_id">
            <input type="submit" value="Delete" class="btn btn-danger my-2" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่')">
        </form>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <th style="width: 30px;"></th>
                        <th style="width: 100px;">Product ID</th>
                        <th style="width: 100px;">Product Name</th>
                        <th style="width: 100px;">Detail</th>
                        <th style="width: 100px;">Image</th>
                        <th style="width: 100px;">Price</th>
                        <th style="width: 100px;">Stock</th>
                        <th style="width: 100px;"></th>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <form action="multipleDelete.php" method="post">
                                    <td>
                                        <input type="checkbox" name="idcheckbox[] " value="<?php echo $row["product_id"]; ?>">
                                    </td>
                                    <td><?php echo $row["product_id"]; ?></td>
                                    <td>ENG: <?php echo $row["product_name"]; ?><br>TH: <?php echo $row["product_name_th"]; ?></td>
                                    <td><?php echo $row["detail"]; ?></td>
                                    <td><?php echo $row["imagefile"]; ?></td>
                                    <td>S: <?php echo $row["price_s"]; ?>฿<br>L: <?php echo $row["price_l"]; ?>฿</td>
                                    <td><?php echo $row["stock"]; ?></td>
                                    <td>
                                        <a href="editForm.php?id=<?php echo $row["product_id"] ?>" class="btn btn-primary">Edit</a>
                                        <a href="deleteQueeyString.php?idpd=<?php echo $row["product_id"] ?>" class="btn btn-danger" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่')">Delete</a>
                                    </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <input type="submit" value="Delete" class="btn btn-danger">
        </form>
        <button class="btn btn-primary" onclick="checkAll()">Select All</button>
        <button class="btn btn-secondary" onclick="uncheckAll()">Cancel</button>
    </div>

    <script>
        function checkAll() {
            var form_element = document.forms[2].length
            for (i = 0; i < form_element - 1; i++) {
                document.forms[2].elements[i].checked = true;
            }
        }

        function uncheckAll() {
            var form_element = document.forms[2].length
            for (i = 0; i < form_element - 1; i++) {
                document.forms[2].elements[i].checked = false;
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <br>
</body>

</html>