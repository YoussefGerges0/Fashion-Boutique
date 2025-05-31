<?php

require_once 'connection.php';

$query = "SELECT * FROM `cart`";


$result = mysqli_query($con, $query);

if(mysqli_num_rows($result) > 0) {

    $carts = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $carts = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
 
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            height: 100vh;
            float: left;
        }
        .sidebar {
            background-color: #333;
            color: #fff;
            width: 200px;
            padding: 20px;
        }
        .content {
            flex: 1;
            padding: 20px;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar li {
            margin-bottom: 20px;
        }
        .sidebar a {
            text-decoration: none;
            color: #fff;
        }
        .sidebar li:hover {
            background-color: #fff;
            width: 100%;
        }
        .sidebar li:hover a {
            color: #333;
        }
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

        .btn-primary {
            background-color: #007bff;
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

<div class="container">
    <div class="sidebar">
        <ul>
            <li><a href="admin.php">Main</a></li>
            <li><a href="users.php">Users</a></li>
            <li><a href="product-sq.php">Products</a></li>
            <li><a href="cart-sq.php">Cart</a></li>
            <li><a href="order-sq.php">Orders</a></li>
        </ul>
    </div>
    <div class="content">
        <h1>Carts</h1>
        
        <?php if(!empty($carts)): ?>
            <table class="table table-striped">
                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        </tr>
                </thead>
                <tbody>
                    <?php foreach($carts as $cart): ?>
                        <tr>
                            <td><?php echo $order['ID']; ?></td>
                            <td><?php echo $order['username']; ?></td>
                            <td><?php echo $order['name']; ?></td>
                            <td><?php echo $order['price']; ?></td>
                            <td><?php echo $order['size']; ?></td>
                            <td><?php echo $order['quantity']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No Carts found.</p>
        <?php endif; ?>
        
    </div>
</div>

</body>
</html>
