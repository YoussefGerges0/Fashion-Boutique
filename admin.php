<?php 
include('snav.php');
require_once 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="style99.css">
</head>

<body>


            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <?php
                                if (!empty($_SESSION['username_login'])) {
                                    $un = $_SESSION['username_login'];
                                    $select_rows = mysqli_query($con, "SELECT * FROM user ") or die('query failed');
                                    $row_count = mysqli_num_rows($select_rows);
                                    

                        echo"<div class='numbers'>{$row_count}</div>";
                                }
                        ?>

                        <div class="cardName">Users</div>
                    </div>

                    <div class="iconBx">
                    <ion-icon name="person-circle-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                    <?php
                                if (!empty($_SESSION['username_login'])) {
                                    $un = $_SESSION['username_login'];
                                    $select_rows = mysqli_query($con, "SELECT * FROM `order` ") or die('query failed');
                                    $row_count = mysqli_num_rows($select_rows);
                                    

                        echo"<div class='numbers'>{$row_count}</div>";
                                }
                        ?>
                        <div class="cardName">Orders</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                    <?php
                                if (!empty($_SESSION['username_login'])) {
                                    $un = $_SESSION['username_login'];
                                    $select_rows = mysqli_query($con, "SELECT * FROM product ") or die('query failed');
                                    $row_count = mysqli_num_rows($select_rows);
                                    

                        echo"<div class='numbers'>{$row_count}</div>";
                                }
                        ?>
                        
                        <div class="cardName">Products</div>
                    </div>

                    <div class="iconBx">
                    <ion-icon name="bag-handle-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                  <?php
                    if (!empty($_SESSION['username_login'])) {
                    $un = $_SESSION['username_login'];
                    $select_order = mysqli_query($con, "SELECT `total_price` FROM `order`");
                    
                    $b=0;
                    if (mysqli_num_rows($select_order) > 0) {
                        while ($fetch_order = mysqli_fetch_assoc($select_order)) {
                            $b += $fetch_order['total_price'];
                        
                        }       
                           echo"<div class='numbers'>\${$b}</div>";
                          
                        }
                    }                
                    else {
                        echo 0;
                    }
                    
                ?>
                        
                        <div class="cardName">Earning</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                        <a href="order-sq-all.php" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Username</td>
                                <td>Items</td>
                                <td>Price</td>
                                <td>Status</td>
                            </tr>
                        </thead>

                        <tbody>

                        <?php
if (!empty($_SESSION['username_login'])) {
    $un = $_SESSION['username_login'];
    $select_orderss = mysqli_query($con, 
        "SELECT `username`, `total_products`, `total_price`,`order-status` FROM `order` ORDER BY `id` DESC LIMIT 6");

    if (mysqli_num_rows($select_orderss) > 0) {
        while ($fetch_orderss = mysqli_fetch_assoc($select_orderss)) {
            $username = $fetch_orderss['username'];
            $product = $fetch_orderss['total_products'];
            $price = $fetch_orderss['total_price'];
            $stts = $fetch_orderss['order-status'];
            
            echo "<tr>
            <td>{$username}</td>
            <td>{$product}</td>
            <td>\${$price}</td>
            <td>";
    
    if ($stts == "Pending...") {
        echo "<span class='status pending'>Pending...</span>";
    } else if ($stts == "Being Delivered") {
        echo "<span class='status inProgress'>Being Delivered</span>";
    } else if ($stts == "Done") {
        echo "<span class='status delivered'>Done</span>";
    } else if ($stts == "Ready") {
        echo "<span class='status pending'>Ready</span>";
    }

    echo "</td></tr>";
}
} else {
echo "<tr><td colspan='4'>No recent orders found.</td></tr>";
}
} else {
echo "<tr><td colspan='4'>User not logged in.</td></tr>";
}
?>




                         
                        </tbody>
                    </table>
                </div>


    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>