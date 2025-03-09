<?php
require('connection.php');

$sql = "SELECT * FROM orders ORDER BY queue ASC";
$result = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SERVICE</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-body-tertiary">
    <div class="container" style="margin-top: 30px;">
        <h4>SERVICE TERMINAL</h4>
        <br>
        <a href="admin.php" class="btn btn-primary">ADMIN</a>
        <a href="service.php" class="btn btn-light">SERVICE</a><br><br>
        
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <th style="width: 20px;">Queue</th>
                        <th style="width: 350px;">Menu List</th>
                        <th style="width: 50px;">Cost</th>
                        <th style="width: 50px;">Confirm Order</th>
                        <th style="width: 50px;">Pay</th>
                        <th style="width: 50px;">Serve</th>
                        <th style="width: 100px;"></th>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <form action="" method="post">
                                    <td><?php echo $row["queue"]; ?></td>
                                    <td><?php echo $row["detail"]; ?></td>
                                    <td><?php echo $row["cost"]; ?></td>
                                    <td><?php echo $row["confirm"]; ?></td>
                                    <td><?php echo $row["pay"]; ?></td>
                                    <td><?php echo $row["serve"]; ?></td>
                                    <td>
                                        <a href="editService.php?queue=<?php echo $row["queue"] ?>" class="btn btn-primary">Edit</a>
                                        <a href="deleteOld.php?queue=<?php echo $row["queue"] ?>" class="btn btn-danger" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่')">Delete</a>
                                    </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <br>
</body>

</html>