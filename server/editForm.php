<?php
require('connection.php');
$id = $_GET["id"];

$sql = "SELECT * FROM products WHERE product_id = '$id'";
$result = mysqli_query($connect, $sql);

$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-body-tertiary">
    <div class="container" style="margin-top: 30px;">
        <h4>Edit Form</h4>
        <div class="row g-5">
            <div class="col-md-8 col-sm-12">
                <form action="updateData.php" method="POST">
                    <input type="hidden" value="<?php echo $row["product_id"];?>" name="id">
                    <div class="row g-3 mb-3">
                        <div class="col-sm-6">
                            <label class="form-label">Product ID</label>
                            <input type="text" name="product_id" class="form-control" value="<?php echo $row["product_id"];?>" readonly>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Image</label>
                            <input type="file" name="imagefile" class="form-control" accept="image/png, image/jpg, image/jpeg" value="<?php echo $row["imagefile"];?>">
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Product Name</label>
                            <input type="text" name="product_name" class="form-control" value="<?php echo $row["product_name"];?>">
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Product Name(TH)</label>
                            <input type="text" name="product_name_th" class="form-control" value="<?php echo $row["product_name_th"];?>">
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Detail</label>
                            <input type="text" name="detail" class="form-control" value="<?php echo $row["detail"];?>">
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Detail(TH)</label>
                            <input type="text" name="detail_th" class="form-control" value="<?php echo $row["detail_th"];?>">
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Price(S)</label>
                            <input type="text" name="price_s" class="form-control" value="<?php echo $row["price_s"];?>">
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Price(L)</label>
                            <input type="text" name="price_l" class="form-control" value="<?php echo $row["price_l"];?>">
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Stock</label>
                            <input type="number" name="stock" class="form-control" value="<?php echo $row["stock"];?>">
                        </div>
                    </div>

                    <input type="submit" value="submit" class="btn btn-success">
                    <input type="reset" value="Reset" class="btn btn-danger">
                    <a href="admin.php" class="btn btn-primary">Return</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <br>
</body>

</html>