<?php
include('snav.php');
require_once 'connection.php';

if(isset($_POST['add_product'])){
    $p_name = $_POST['p_name'];
    $p_price = number_format($_POST['p_price'], 2, '.', ''); // Format the price to two decimal places
    $p_image = $_FILES['p_image']['name'];
    $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
    $p_image_folder = 'C:/xampp/htdocs/Web3 Project 1.4/'.$p_image;
    $men = $_POST['men'];
    $women = $_POST['women'];
    $kids = $_POST['kids'];                     
    $shoes = $_POST['shoes'];                      
    $sale = $_POST['sale'];                       
    $psale = $_POST['psales'];
    $quantity = $_POST['quantity'];
    $rating = $_POST['rating'];
    $rates="";
    if($rating==0){$rates='<i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>';}
    elseif($rating==0.5){$rates='<i class="fa fa-star-half-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>';}
    elseif($rating==1){$rates='<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>';}
    elseif($rating==1.5){$rates='<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>';}
    elseif($rating==2){$rates='<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>';}
    elseif($rating==2.5){$rates='<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>';}
    elseif($rating==3){$rates='<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>';}
    elseif($rating==3.5){$rates='<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>';}
    elseif($rating==4){$rates='<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>';}
    elseif($rating==4.5){$rates='<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i>';}
    elseif($rating==5){$rates='<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>';}
    
    $insert_query = mysqli_query($con, "INSERT INTO `product` (name, price, quantity, image, men, women, kids, shoes, sale, `sale-percentage`, rating) VALUES ('$p_name', '$p_price', '$quantity', '$p_image', '$men', '$women', '$kids', '$shoes', '$sale', '$psale', '$rates')") or die('query failed');
    
    if($insert_query){
        move_uploaded_file($p_image_tmp_name, $p_image_folder);
        $message[] = 'Product added successfully';
    } else {
        $message[] = 'Could not add the product';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="styleaddproduct.css">
</head>
<body>

<?php
if(isset($message)){
    foreach($message as $msg){
        echo '<div class="message"><span>'.$msg.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = \'none\';"></i></div>';
    }
}
?>

<div class="container">
    <section>
        <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
            <h3>Add a New Product</h3>
            <input type="text" name="p_name" placeholder="Enter the product name" class="box" required>
            <input type="number" step="0.01" name="p_price" min="0" placeholder="Enter the product price" class="box" required>
            <input type="number" name="quantity" min="1" placeholder="Enter the product quantity" class="box" required>
            <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>

            <p>
                <h5 style="display: inline;">Men:</h5>
                <input type="radio" name="men" value="yes" required> Yes
                <input type="radio" name="men" value="no" required> No
            </p>
            <p>
                <h5 style="display: inline;">Women:</h5>
                <input type="radio" name="women" value="yes" required> Yes
                <input type="radio" name="women" value="no" required> No
            </p>
            <p>
                <h5 style="display: inline;">Kids:</h5>
                <input type="radio" name="kids" value="yes" required> Yes
                <input type="radio" name="kids" value="no" required> No
            </p>
            <p>
                <h5 style="display: inline;">Shoes:</h5>
                <input type="radio" name="shoes" value="yes" required> Yes
                <input type="radio" name="shoes" value="no" required> No
            </p>
            <p>
                <h5 style="display: inline;">Sale:</h5>
                <input type="radio" name="sale" value="yes" required> Yes
                <input type="radio" name="sale" value="no" required> No
            </p>
            <input type="number" name="psales" min="0" max="100" placeholder="Enter the sale percentage" class="box" required>

            <label for="rating">Rating:</label>
            <select name="rating" id="rating" class="box" required>
                <option value="0">0</option>
                <option value="0.5">0.5</option>
                <option value="1">1</option>
                <option value="1.5">1.5</option>
                <option value="2">2</option>
                <option value="2.5">2.5</option>
                <option value="3">3</option>
                <option value="3.5">3.5</option>
                <option value="4">4</option>
                <option value="4.5">4.5</option>
                <option value="5">5</option>
            </select>
            
            <input type="submit" value="Add the Product" name="add_product" class="btn">
        </form>
    </section>
</div>

<!-- Custom JS file link -->
<script src="script.js"></script>
</body>
</html>