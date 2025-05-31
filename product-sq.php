<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('snav.php');
require_once 'connection.php';

$query = "SELECT * FROM product";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $products = [];
}

if (isset($_POST['update_update_btn'])) {
    $update_value = $_POST['update_quantity'];
    $update_ID = $_POST['update_id'];
    $update_name = $_POST['update_name'];
    $update_price = $_POST['update_price'];
    $update_men = $_POST['update_men'];
    $update_women = $_POST['update_women'];
    $update_sale = $_POST['update_sale'];
    $update_kids = $_POST['update_kids'];
    $update_sale_percentage = $_POST['update_sale_percentage'];

    // Corrected SQL UPDATE query
    $update_quantity_query = mysqli_query($con, "UPDATE product SET 
        quantity = '$update_value', 
        name = '$update_name', 
        price = '$update_price', 
        men = '$update_men', 
        women = '$update_women', 
        sale = '$update_sale', 
        kids = '$update_kids', 
        `sale-percentage` = '$update_sale_percentage' 
        WHERE ID = '$update_ID'");

    if ($update_quantity_query) {
        header('Location:product-sq.php');


    } else {
        echo "Error: " . mysqli_error($con);
    }
}

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($con, "DELETE FROM `product` WHERE ID = '$remove_id'");
    header('Location:product-sq.php');


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border: 2px solid #ddd;
            padding-right: 100px;
            margin-right: 100px;
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
        .nzul{
            margin-top:20px;
        }
    </style>
    <script>
        function formatPrice(element) {
            let value = parseFloat(element.value);
            if (!isNaN(value)) {
                element.value = value.toFixed(2);
            }
        }
        function validateWomenInput(element) {
            const value = element.value.trim().toLowerCase();
            if (value === '') {
                element.value = 'yes/no';
            } else if (value !== 'yes' && value !== 'no') {
                alert('Please enter "yes" or "no"');
                element.value = '';
                element.focus();
            }
        }
    </script>
</head>
<body>
    <div class="content">

        
        <?php if (!empty($products)): ?>
            <table class="table table-striped nzul">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Men</th>
                        <th>Women</th>
                        <th>Kids</th>
                        <th>Sale</th>
                        <th>Sale Percentage</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <form action="" method="post">
                                <td><?php echo $product['ID']; ?></td>
                                <input type="hidden" name="update_id" value="<?php echo $product['ID']; ?>">
                                <td><input type="text" name="update_name" value="<?php echo $product['name']; ?>"></td>
                                <td><input type="number" name="update_price" step="0.01" min="1" value="<?php echo number_format($product['price'], 2); ?>" onblur="formatPrice(this)"></td>
                                <td><input type="number" name="update_quantity" min="0" value="<?php echo $product['quantity']; ?>"></td>
                                <td><input style="width:80%" type="text" name="update_men" value="<?php echo $product['men']; ?>" onblur="validateWomenInput(this)" placeholder="yes/no"></td>
                                <td><input style="width:80%" type="text" name="update_women" value="<?php echo $product['women']; ?>" onblur="validateWomenInput(this)" placeholder="yes/no"></td>
                                <td><input style="width:80%" type="text" name="update_kids" value="<?php echo $product['kids']; ?>" onblur="validateWomenInput(this)" placeholder="yes/no"></td>
                                <td><input style="width:80%" type="text" name="update_sale" value="<?php echo $product['sale']; ?>" onblur="validateWomenInput(this)" placeholder="yes/no"></td>
                                <td><input style="width:90%" type="number" name="update_sale_percentage" min="0" max="100" value="<?php echo $product['sale-percentage']; ?>"></td>
                                <td><input type="submit" value="Update" name="update_update_btn" class="btn btn-primary"></td>
                            </form>
                            <td>
                                <a href="product-sq.php?remove=<?php echo $product['ID']; ?>" onclick="return confirm('Are you sure you want to delete this product?')" class="btn btn-danger">Remove</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No products found.</p>
        <?php endif; ?>
        
    </div>
</body>
</html>