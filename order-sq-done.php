<?php
include('snav.php');
require_once 'connection.php';

// Query to fetch all orders
$query = "SELECT * FROM `order` WHERE `order-status`='Done'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $orders = [];
}

// Update order status
if (isset($_POST['update_update_btn'])) {
    $update_ID = $_POST['update_order_status'];
    $update_order_Status = mysqli_query($con, "UPDATE `order` SET `order-status` = 'Ready' WHERE ID = '$update_ID'");
}

if (isset($_POST['update_update_btn2'])) {
    $update_ID = $_POST['update_order_status2'];
    $update_order_Status2 = mysqli_query($con, "UPDATE `order` SET `order-status` = 'Being Delivered' WHERE ID = '$update_ID'");
}

if (isset($_POST['update_update_btn3'])) {
    $update_ID = $_POST['update_order_status3'];
    $update_order_status3 = mysqli_query($con, "UPDATE `order` SET `order-status` = 'Done' WHERE ID = '$update_ID'");
}

// Delete order
if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($con, "DELETE FROM `order` WHERE ID = '$remove_id'");
    header('Location: order-sq-done.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        h1 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 2px solid #ddd;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
       
        .btn {
            display: inline-block;
            padding: 8px 12px;
            margin: 5px;
            font-size: 14px;
            cursor: pointer;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn-primary1{
            background-color: gray;
            border-color: #007bff;
        }
        .btn-primary2{
            background-color: blue;
            border-color: #007bff;
        }
        .btn-primary3{
            background-color: green;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        
    </style>
</head>
<body>
    <div class="content">
        <h1>Orders</h1>

        <?php if (!empty($orders)): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Method</th>
                        <th>Street Name</th>
                        <th>Building Number</th>
                        <th>City</th>
                        <th>Total Products</th>
                        <th>Total Prices</th>
                        <th colspan="5" style="text-align:center">Order Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?php echo $order['ID']; ?></td>
                            <td><?php echo $order['username']; ?></td>
                            <td><?php echo $order['name']; ?></td>
                            <td><?php echo $order['number']; ?></td>
                            <td><?php echo $order['email']; ?></td>
                            <td><?php echo $order['method']; ?></td>
                            <td><?php echo $order['street-name']; ?></td>
                            <td><?php echo $order['building-nbr']; ?></td>
                            <td><?php echo $order['city']; ?></td>
                            <td><?php echo $order['total_products']; ?></td>
                            <td>$<?php echo $order['total_price']; ?></td>
                            <td><?php echo $order['order-status']; ?></td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="update_order_status" value="<?php echo $order['ID']; ?>">
                                    <input type="submit" value="Ready" name="update_update_btn" class="btn btn-primary1">
                                </form>
                            </td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="update_order_status2" value="<?php echo $order['ID']; ?>">
                                    <input type="submit" value="Being Delivered" name="update_update_btn2" class="btn btn-primary2">
                                </form>
                            </td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="update_order_status3" value="<?php echo $order['ID']; ?>">
                                    <input type="submit" value="Done" name="update_update_btn3" class="btn btn-primary3">
                                </form>
                            </td>
                            <td>
                                <a href="order-sq.php?remove=<?php echo $order['ID']; ?>" onclick="return confirm('Are you sure you want to delete this order?')" class="btn btn-danger">Remove</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <h2 style="text-align:center">No Orders found.</h2>
        <?php endif; ?>
    </div>
</body>
</html>