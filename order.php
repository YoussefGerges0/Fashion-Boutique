<?php
session_start();
include('connection.php');
$un = $_SESSION["username_login"];
require "mailtest.php";

if (isset($_POST['order_btn'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $method = $_POST['method'];
    $street = $_POST['street'];
    $flat = $_POST['flat'];
    $city = $_POST['city'];

    // Retrieve products from cart
    $cart_query = mysqli_query($con, "SELECT * FROM cart WHERE username='$un'");
    $product_total = 0;
    $product_names = array();
    $response = '';
    $subject = "Thanks for shopping";
    
    if (mysqli_num_rows($cart_query) > 0) {
        while ($product_item = mysqli_fetch_assoc($cart_query)) {
            $product_names[] = $product_item['name'] . ' (Quantity: ' . $product_item['quantity'] . ', Size: ' . $product_item['size'] . ')';
            $product_price = $product_item['price'] * $product_item['quantity'];
            $product_total += $product_price;
        }
    }

    $total_product = implode("\n", $product_names); // Changed to line breaks for each item

    // Insert order details into `order` table
    $detail_query = mysqli_query($con, "INSERT INTO `order` (username, name, number, email, method, `street-name`, `building-nbr`, city, total_products, total_price, `order-status`) 
                                        VALUES ('$un', '$name', '$number', '$email', '$method', '$street', '$flat', '$city', '$total_product', '$product_total', 'Pending...')");

    $outputmsg = nl2br("Thank you {$name} for choosing Fashion Boutique\n\nYou have purchased:\n{$total_product}\n\nTotal Price: {$product_total}$ \nPayment Method: {$method}\n\nAddress:\nCity: {$city}\nStreet: {$street}\nBuilding: {$flat}");

    if ($detail_query) {
        $response = sendMail($email, $subject, $outputmsg);
        $response ="The invoice has been emailed successfully";
        echo "
        <div class='order-message-container'>
            <div class='message-container'>
                <h3>Thank you for shopping!</h3>
                <div class='order-detail'>
                    <span>{$total_product}</span>
                    <span class='total'>Total: \${$product_total}</span>
                </div>
                <div class='customer-details'>
                    <p>Your name: <span>{$name}</span></p>
                    <p>Your number: <span>{$number}</span></p>
                    <p>Your email: <span>{$email}</span></p>
                    <p>Your address: <span>{$city}, {$flat}, {$street}</span></p>
                    <p>Your payment method: <span>{$method}</span></p>
                    <p>(*pay when product arrives*)</p>";
                    if (!empty($response)) {
                        echo "<p>{$response}</p>";
                    }
                echo "</div>
                <a href='allproducts.php' class='delete-btn'>Continue shopping</a>
            </div>
        </div>";

        // Update product quantities in `product` table
        $cart_query = mysqli_query($con, "SELECT * FROM cart WHERE username='$un'");
        if (mysqli_num_rows($cart_query) > 0) {
            while ($product_item = mysqli_fetch_assoc($cart_query)) {
                $pname = $product_item['name'];
                $quantity = $product_item['quantity'];

                // Update product quantity in `product` table
                mysqli_query($con, "UPDATE product SET quantity = quantity - $quantity WHERE name = '$pname'");
            }
        }

        // Clear cart after order is placed
        mysqli_query($con, "DELETE FROM cart WHERE username = '$un'");
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products - Fashion Boutique</title>
    <!-- Bootsrap Links -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>      
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> 
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <!-- Font Awesome Link -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <!-- Google Fonts Links -->
 <link rel="preconnect" href="https://fonts.googleapis.com">
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
 <!--Font Awesome Cdn-->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <!-- My style Link -->
 <link rel="stylesheet" href="style3.css">
 <!-- My script Link -->
<script src="jscode.js"></script>
 


<style>
    :root{
   --blue:#2980b9;
   --red:tomato;
   --orange:orange;
   --black:#333;
   --white:#fff;
   --bg-color:#eee;
   --dark-bg:rgba(0,0,0,.7);
   --box-shadow:0 .5rem 1rem rgba(0,0,0,.1);
   --border:.1rem solid #999;
}

    .checkout-form form{
   padding:2rem;
   border-radius: .5rem;
   background-color: var(--bg-color);
}

.checkout-form form .flex{
   display: flex;
   flex-wrap: wrap;
   gap:1.5rem;
}

.checkout-form form .flex .inputBox{
   flex:1 1 40rem;
}

.checkout-form form .flex .inputBox span{
   font-size: 2rem;
   color:var(--black);
}

.checkout-form form .flex .inputBox input,
.checkout-form form .flex .inputBox select{
   width: 100%;
   background-color: var(--white);
   font-size: 1.7rem;
   color:var(--blue);
   border-radius: .5rem;
   margin:1rem 0;
   padding:1.2rem 1.4rem;
   text-transform: none;
   border:var(--border);
}
.display-order{
   max-width: 50rem;
   background-color: var(--white);
   border-radius: .5rem;
   text-align: center;
   padding:1.5rem;
   margin:0 auto;
   margin-bottom: 2rem;
   box-shadow: var(--box-shadow);
   border:var(--border);
}

.display-order span{
   display: inline-block;
   border-radius: .5rem;
   background-color: var(--bg-color);
   padding:.5rem 1.5rem;
   font-size: 2rem;
   color:var(--black);
   margin:.5rem;
}

.display-order span.grand-total{
   width: 100%;
   background-color: var(--red);
   color:var(--white);
   padding:1rem;
   margin-top: 1rem;
}

.order-message-container{
   position: fixed;
   top:0; left:0;
   height: 100vh;
   overflow-y: scroll;
   overflow-x: hidden;
   padding:2rem;
   display: flex;
   align-items: center;
   justify-content: center;
   z-index: 1100;
   background-color: var(--dark-bg);
   width: 100%;
}

.order-message-container::-webkit-scrollbar{
   width: 1rem;
}

.order-message-container::-webkit-scrollbar-track{
   background-color: var(--dark-bg);
}

.order-message-container::-webkit-scrollbar-thumb{
   background-color: var(--blue);
}

.order-message-container .message-container{
   width: 50rem;
   background-color: var(--white);
   border-radius: .5rem;
   padding:2rem;
   text-align: center;
}

.order-message-container .message-container h3{
   font-size: 2.5rem;
   color:var(--black);
}

.order-message-container .message-container .order-detail{
   background-color: var(--bg-color);
   border-radius: .5rem;
   padding:1rem;
   margin:1rem 0;
}

.order-message-container .message-container .order-detail span{
   background-color: var(--white);
   border-radius: .5rem;
   color:var(--black);
   font-size: 2rem;
   display: inline-block;
   padding:1rem 1.5rem;
   margin:1rem;
}

.order-message-container .message-container .order-detail span.total{
   display: block;
   background: var(--red);
   color:var(--white);
}

.order-message-container .message-container .customer-details{
   margin:1.5rem 0;
}

.order-message-container .message-container .customer-details p{
   padding:1rem 0;
   font-size: 2rem;
   color:var(--black);
}

.order-message-container .message-container .customer-details p span{
   color:var(--blue);
   padding:0 .5rem;
   text-transform: none;
}

.container-order{
   max-width: 1200px;
   margin:auto auto;
   margin-top:100px;
   margin-bottom:100px;
   /* padding-bottom: 5rem; */
}
.option-btn,.delete-btn {
            display: block;
            width: 100%;
            text-align: center;
            background-color: red;
            color: white;
            font-size: 2.5rem;
            padding: 1.2rem 3rem;
            border-radius: .5rem;
            cursor: pointer;

        }

        order-heading{
            text-align:center !important;
        }
</style>
<title>Check Out</title>
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


 
<div class="container-order" >
<section class="checkout-form">
<h1 class="order-heading">Complete Your Order</h1>

    <form action="" method="post">





    <div class="display-order">
    <?php
  $select_cart = mysqli_query($con, "SELECT * FROM cart WHERE username='" . $_SESSION['username_login'] . "'");
  $total=0;
  $grand_total=0;
  if(mysqli_num_rows($select_cart)>0){
    while($fetch_cart= mysqli_fetch_assoc($select_cart)){
        $total_price= $fetch_cart['quantity'] * $fetch_cart['price'];
        $grand_total += $total_price;

    ?>
    <span><?= $fetch_cart['name']; ?>(Quantity:<?= $fetch_cart['quantity']?>,Size:<?= $fetch_cart['size']; ?>)</span>
<?php } ?>
     <span class="grand-total">grand total: $<?= $grand_total?></span>
  </div>
  <?php
    
    } else {
        echo "<div class='display-order'><span>Your Cart is Empty!</span></div>";
    }

     ?>









        <div class="flex">
          <div class="inputBox">
            <span>Your Name</span>
            <input type="text" placeholder="Enter your Name" name="name" required>
          </div>  
          <div class="inputBox">
            <span>Your Number</span>
            <input type="number"  placeholder="Enter your Number" name="number"required>
          </div>
          <div class="inputBox">
            <span>Your Email</span>
            <input type="email" placeholder="Enter your Email" name="email"required>
          </div>
          <div class="inputBox">
            <span>payment methoed</span>
            <select name="method">
                                <option value="Cash on delivery">Cash on delivery</option>
                                <option value="Credit-card">Credit-card</option>
                                <option value="OMT">OMT</option>

            </select>
          </div>
          <div class="inputBox">
            <span>Adresse Line 1:</span>
            <input type="text" placeholder="Exemple building n." name="flat"required>
          </div>
          <div class="inputBox">
            <span>Adresse Line 2:</span>
            <input type="text" placeholder="Exemple street name" name="street"required>
          </div>
          <div class="inputBox">
            <span>city</span>
            <input type="text" placeholder="exemple Jbeil" name="city"required>
          </div>
          <input type="submit" value="Order Now" name="order_btn" class="delete-btn">
        </div>
                          
    </form>
    <section>
</div>
















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
  <p>Shopping & Returns</p>
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
<script>
            const dropdownButton = document.getElementById('dropdownButton');
        dropdownButton.addEventListener('blur', function() {
          dropdownButton.style.backgroundColor = '#F6E6CB';
    dropdownButton.style.color = '#D8AE7E';
      });
          </script>
    
  

</body>
</html>