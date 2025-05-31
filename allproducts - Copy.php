<?php
session_start();
include('connection.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fashion Boutique - eCommerce Clothing Website</title>
  <!-- Bootsrap Links -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>      

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- Font Awesome Link -->

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
    
</head> 

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
              <li class="nav-item">
                <a class="nav-link" href="allproducts.php">All Clothes</a>
              </li>
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

            </ul>
            <ul class="navbar-nav ml-auto nav-icons aaaa">
              <li class="nav-item">

              <a class="nav-link" href="cart.php" ><i class="fa-solid fa-cart-shopping"></i><span>
                <?php if(empty($_SESSION['username_login'])){}
else{  
  $un=$_SESSION['username_login'];
  $select_rows = mysqli_query($con, "SELECT * FROM `cart` WHERE username='$un'") or die('query failed');
  $row_count = mysqli_num_rows($select_rows);
    echo $row_count;} ?></span></a> 
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

          <div class="bap">
          <h2> All Products </h2>
     <!-- <h5> Sorted in <br>chronological order </h5> -->
   </div>
   <br><br>

    <section id="sec2">

          <div class="ro">
          <div class="row">




              <?php
          $un = $_SESSION['username_login'];
          $products = mysqli_query($con,"SELECT * FROM `product` LIMIT 6");
          
          if (mysqli_num_rows($products) > 0) {
            while ($fetch_products = mysqli_fetch_assoc($products)) {
              $name=$fetch_products['name'];
              $price=$fetch_products['price'];
              $quantity=$fetch_products['quantity'];
              $rating=$fetch_products['rating'];
              $image=$fetch_products['image'];




              echo '<div class="imss" onclick="Innerimmg(this)">
              <img src="' . $image . '" />
              <h4>' . $name . '</h4>
              <div class="rating">' . $rating . '</div>
              <p>$' . $price . '.00</p>
            </div>';
            }
          }


          ?>



            <div class="imss" onclick="Innerimmg(this)">
              <img src="im9.jpg" >
              <h4>Men Red Printed T-Shirt</h4>
              <div class="rating">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
              </div>
              <p>$25.00</p>
            </div>

            <div class="imss" onclick="Innerimmg(this)">
              <img src="im10.jpg">
              <h4>Converse Shoes</h4>
              <div class="rating">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
              </div>
              <p>$30.00</p>
            </div>

            <div class="imss" onclick="Innerimmg(this)">
              <img src="im11.webp">
              <h4>Baggy Cargo Pants</h4>
              <div class="rating">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-half-o" aria-hidden="true"></i>
              </div>
              <p>$39.00</p>
            </div>

            <div class="imss" onclick="Innerimmg(this)">
              <img src="im12.avif">
              <h4>Women White shirt</h4>
              <div class="rating">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
              </div>
              <p>$30.00</p>
            </div>

          <div class="imss" onclick="Innerimmg(this)">
            <img src="im13.jpg">
            <h4>Men Winter Coat</h4>
            <div class="rating">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star-o" aria-hidden="true"></i>
            </div>
            <p>$45.00</p>
          </div>

          <div class="imss" onclick="Innerimmg(this)">
            <img src="im14.jpg">
            <h4>Women Blue Dress</h4>
            <div class="rating">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
            </div>
            <p>$70.00</p>
          </div>

          <div class="imss" onclick="Innerimmg(this)">
            <img src="im16.jpg">
            <h4>Women Blue Jeans</h4>
            <div class="rating">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star-half-o" aria-hidden="true"></i>
              <i class="fa fa-star-o" aria-hidden="true"></i>
            </div>
            <p>$45.00</p>
          </div>

          <div class="imss" onclick="Innerimmg2(this)">
            <img src="im17.jpg">
            <h4>Men Joggers</h4>
            <div class="rating">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star-o" aria-hidden="true"></i>
              <i class="fa fa-star-o" aria-hidden="true"></i>
            </div>
            <p>$35.00</p>
          </div>
        
          <div class="imss" onclick="Innerimmg(this)">
            <img src="im27.jpeg">
            <h4>White Nike AirForce</h4>
            <div class="rating">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star-o" aria-hidden="true"></i>
            </div>
            <p>$40.00</p>
          </div>

          <div class="imss" onclick="Innerimmg(this)">
            <img src="im28.jpg">
            <h4>Women Black CropTop</h4>
            <div class="rating">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star-o" aria-hidden="true"></i>
              <i class="fa fa-star-o" aria-hidden="true"></i>
            </div>
            <p>$25.00</p>
          </div>

          <div class="imss" onclick="Innerimmg(this)">
            <img src="im29.jpeg">
            <h4>Men Bayo Gray Pants</h4>
            <div class="rating">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star-half-o" aria-hidden="true"></i>
              <i class="fa fa-star-o" aria-hidden="true"></i>
            </div>
            <p>$35.00</p>
          </div>

          <div class="imss" onclick="Innerimmg(this)">
            <img src="im30.avif">
            <h4>Women Long Skirt</h4>
            <div class="rating">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star-o" aria-hidden="true"></i>
            </div>
            <p>$30.00</p>
          </div>
          </div>

          <div class="pgbtn">
            <button onclick="window.location.href='allproducts.php'">1</button>
            <button onclick="window.location.href='allproducts2.php'">2</button>
            <button onclick="window.location.href='allproducts3.php'">3</button>
            <button onclick="window.location.href='allproducts4.php'">4</button>
            <button onclick="window.location.href='allproducts5.php'">&#8594;</button>
          </div>
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
    dropdownButton.style.backgroundColor = 'white';
    dropdownButton.style.color = 'gray';
});
    </script>   
    
  

</body>
</html>
<!--Get ready to elevate your wardrobe and express your unique style effortlessly. Let's embark on this fashionable journey together!-->
