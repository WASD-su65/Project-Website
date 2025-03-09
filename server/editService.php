<?php
require('connection.php');
$queue = $_GET["queue"];

$sql = "SELECT * FROM orders WHERE queue = '$queue'";
$result = mysqli_query($connect, $sql);

$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Service</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-body-tertiary">
    <div class="container" style="margin-top: 30px;">
        <h4>Edit Service</h4>
        <div class="row g-5">
            <div class="col-md-8 col-sm-12">
                <form action="serviceUpdate.php" method="POST">
                    <div class="row g-3 mb-3">
                        <input type="hidden" name="detail" class="form-control" value="<?php echo $row["detail"]; ?>">
                        <input type="hidden" name="cost" class="form-control" value="<?php echo $row["cost"]; ?>">
                        <div class="col-sm-6">
                            <label class="form-label">Queue</label>
                            <input type="text" name="queue" class="form-control" value="<?php echo $row["queue"]; ?>" readonly>
                        </div>
                        <br>
                        <div class="input-group mp3">
                            <label class="input-group-text" for="confirm">Confirm Order</label>
                            <select class="form-select" name="confirm" value="<?php echo $row["confirm"]; ?>">
                                <option value="NO">NO</option>
                                <option value="YES">YES</option>
                            </select>
                        </div>
                        <br><br>
                        <div class="input-group mp3">
                            <label class="input-group-text" for="confirm">Pay</label>
                            <select class="form-select" name="pay" value="<?php echo $row["pay"]; ?>">
                                <option value="NO">NO</option>
                                <option value="YES">YES</option>
                            </select>
                        </div>
                        <br><br>
                        <div class="input-group mp3">
                            <label class="input-group-text" for="confirm">Serve</label>
                            <select class="form-select" name="serve" value="<?php echo $row["serve"]; ?>">
                                <option value="NO">NO</option>
                                <option value="YES">YES</option>
                            </select>
                        </div>
                        <br><br>

                    <input type="submit" value="submit" class="btn btn-success">
                    <input type="reset" value="Reset" class="btn btn-danger">
                    <a href="service.php" class="btn btn-primary">Return</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <br>
</body>

</html>