<?php

session_start();
include("connection.php");
$grand_total=0;
if (isset($_POST['update_update_btn'])) {
    $update_value = $_POST['update_quantity'];
    $update_ID = $_POST['update_quantity_id'];
    
    $update_quantity_query = mysqli_query($con, "UPDATE cart SET quantity = '$update_value' WHERE ID = '$update_ID'");
    
    if ($update_quantity_query) {
        header('Location: cart.php');
        exit;
    }
}
if(isset($_GET['remove'])){
  $remove_id=$_GET['remove'];
  mysqli_query($con,"DELETE FROM cart WHERE id= '$remove_id'");
  header('Location: cart.php');
}
if (!empty($_SESSION['username_login'])) {
  $un = $_SESSION['username_login'];

if(isset($_GET['delete_all'])){
  mysqli_query($con,"DELETE FROM cart WHERE username='$un'");
  header('Location: cart.php');
  }  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Fashion Boutique</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100..900&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style3.css">
    <style>
          .disabled {
        pointer-events: none;
        opacity: 0.6;
    }
.option-btn,.delete-btn {
            display: block;
            width: 100%;
            text-align: center;
            background-color: red;
            color: white;
            font-size: 1.0rem;
            padding: 1.2rem 3rem;
            border-radius: .5rem;
            cursor: pointer;

        }
        .sectab table input[type="number"]{
          border:black !important
          border:var(--border) !important;
          padding:.5rem 1.5rem !important;
          font-size: 1.0rem !important;
          color:black !important;
          width:10rem !important;
        }
        .sectab table input[type="submit"]{
          padding:.5rem 1.5rem;
          cursor:pointer;
          font-size:1.0rem;
          background-color:orange;
          color:black;
        }
        .sectab table .ta7et{
          background-color:gray !important;
        }
        .ta7et{
          background-color:grasy !important;
        }
        .checkout-btn{
          display: block;
            width: 100%;
            text-align: center;
            background-color: orange;
            color: blue;
            font-size: 1.0rem;
            padding: 1.2rem 3rem;
            border-radius: .5rem;
            cursor: pointer;
            margin-top:1rem;
        }
    </style>
</head>
<body>
<section id="sec1">
    <nav class="navbar navbar-expand-lg navbar-dark bg-white">
        <div class="container-fluid">
            <a class="navbar-brand">Fashion Boutique</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="allproducts.php">All Clothes</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle" id="dropdownButton" data-bs-toggle="dropdown">
                                Classes
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="menclothes.php">Men Clothes</a></li>
                                <li><a class="dropdown-item" href="womenclothes.php">Women Clothes</a></li>
                                <li><a class="dropdown-item" href="kidsclothes.php">Kids Clothes</a></li>
                            </ul>
                        </div>
                    </li>

                </ul>
                <ul class="navbar-nav ms-auto nav-icons">
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">
                        <i class="fa-solid fa-cart-shopping"></i>
                            <span>
                                <?php
                                if (!empty($_SESSION['username_login'])) {
                                    $un = $_SESSION['username_login'];
                                    $select_rows = mysqli_query($con, "SELECT * FROM cart WHERE username='$un'") or die('query failed');
                                    $row_count = mysqli_num_rows($select_rows);
                                    echo $row_count;
                                }
                                ?>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                    <?php if(!empty($_SESSION['username_login'])){
                              echo "<div class='dropdown'>
                <button type='button' class='btn btn-primary dropdown-toggle' id='dropdownButton' data-bs-toggle='dropdown'>
                  Welcome {$_SESSION['username_login']}
                </button>
                <ul class='dropdown-menu'>
                  <li><a class='dropdown-item' href='logout.php'>Log Out</a></li>
                  <li><a class='dropdown-item' href='yourorders.php'>Your Orders</a></li>";
                            }
                            else{
               echo"<a class='nav-link' href='LoginSignup.php'><i class='fa-solid fa-user'></i></a>";
              
              }
              ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>

<h1 id="h1" class="title"> Cart </h1>

<section class="sectab">
    <form method="post">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Size</th>
                    <th>Product Quantity</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
               if (!empty($_SESSION['username_login'])) {
                $un = $_SESSION['username_login'];
                $select_cart = mysqli_query($con, "SELECT * FROM cart WHERE username='$un'");
                
                $grand_total = 0;
                if (mysqli_num_rows($select_cart) > 0) {
                    while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                        $cart_name = $fetch_cart['name'];
                        $select_quantity = mysqli_query($con, "SELECT * FROM product WHERE name='$cart_name'");
                        
                        if (mysqli_num_rows($select_quantity) > 0) {
                            while ($fetch_quantity = mysqli_fetch_assoc($select_quantity)) {
                                $f_cart_name = $fetch_cart['name'];
                                $i_price_sql = "SELECT price FROM product WHERE name='$f_cart_name'";
                                $res_price = mysqli_query($con, $i_price_sql);
                                
                                if(mysqli_num_rows($res_price) > 0){
                                    $price_row = mysqli_fetch_assoc($res_price);
                                    $sub_total = $price_row['price'] * $fetch_cart['quantity'];
                                    $grand_total += $sub_total;
                ?>
                <tr>
                    <td><img src="<?php echo $fetch_cart['image']; ?>" height="300" width="300"></td>
                    <td><?php echo $fetch_cart['name']; ?></td>
                    <td>$<?php echo $sub_total; ?></td>
                    <td><?php echo $fetch_cart['size']; ?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['ID']; ?>">
                            <input type="number" name="update_quantity" min="1" max="<?php echo $fetch_quantity['quantity']?>" value="<?php echo $fetch_cart['quantity']; ?>">
                            <input type="submit" value="update" name="update_update_btn">
                        </form>
                    </td>
                    <td><a href="cart.php?remove=<?php echo $fetch_cart['ID']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"><i class="fas fa-trash"></i> Remove</a></td>
                </tr>
                <?php
                        }
                    }
                }
              }
            }
        }
                ?>
                <tr class="ta7et">
                    <td class="ta7et"><a href="allproducts.php" class="option-btn" style="margin-top:0;">Continue Shopping</a></td>
                    <td colspan="3" class="ta7et">Grand Total</td>
                    <td class="ta7et">$<?php echo $grand_total; ?></td>
                    <td class="ta7et"><a href="cart.php?delete_all" onclick="return confirm('Are you sure you want to delete all?')" class="delete-btn"><i class="fas fa-trash"></i> Delete all</a></td>
                </tr>

            </tbody>
        </table>

    </form>
    <div class="checkout-button">
              <a href="order.php" class="checkout-btn <?= ($grand_total>1)?'':'disabled';?>">Proceed To Checkout</a>
            </div>
</section>



<section id="sec3">
    <div>
        <h1>Fashion Boutique</h1>
        <p>Amchit Arbe Street</p>
        <p>Lebanon</p>
        <p>+961 79 147 503</p>
        <p>fashion.bou2005@gmail.com</p>
    </div>
    <div>
        <h4>Support</h4>
        <p>Contact Us</p>
        <p>About Page</p>
        <p>Size Guide</p>
        <p>Shipping & Returns</p>
        <p>Privacy</p>
    </div>
    <div>
        <h4>Shop</h4>
        <p>Men's Shopping</p>
        <p>Women's Shopping</p>
        <p>Kid's Shopping</p>
    </div>
    <div>
        <h4>Company</h4>
        <p>About</p>
        <p>Blog</p>
        <p>Affiliate</p>
        <p>Login</p>
    </div>
    <div>
        <h4>Listen Close</h4>
        <p>We are still a new company</p>
        <p>Stay alerted</p>
        <p>Soon are coming plenty of new products and discounts</p>
    </div>
</section>

<!-- Bootstrap and jQuery JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
            const dropdownButton = document.getElementById('dropdownButton');
        dropdownButton.addEventListener('blur', function() {
          dropdownButton.style.backgroundColor = '#F6E6CB';
    dropdownButton.style.color = '#D8AE7E';
      });
          </script>
</body>
</html>