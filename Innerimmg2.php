<?php 
session_start();
include("connection.php");

if (empty($_SESSION['username_login'])) {
    session_destroy();
    header("Location:LoginSignup.php");
    exit();  // We used it to Stop further script execution after redirection
} else {

}
$un=$_SESSION['username_login'];
$select_rows = mysqli_query($con, "SELECT * FROM `cart` WHERE username='$un'") or die('query failed');
$row_count = mysqli_num_rows($select_rows);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothes - Fashion Boutique</title>
    <!-- Bootsrap Links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>      
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <a class="nav-link" href="cart.php" ><i class="fa-solid fa-cart-shopping"></i><span><?php echo $row_count; ?></span></a>
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

    <div id="productInfo">
      <h2 style="text-align: center;">Product Information</h2>
      <div class="product-container">
          <div class="image-container">
              <img id="productImage" src="" alt="Product Image">
          </div>
          <div class="details-container">
            <h6> Fashion Boutique website</h6>
              <h3 id="productName"></h3>
              <p id="productPrice"></p>
              <label for="sizeSelect">Select Size:</label>
          <select id="sizeSelect">
              <option value="M">M</option>
              <option value="L">L</option>
              <option value="XL">XL</option>
              <option value="XXL">XXL</option>
          </select><br>
          <label for="quantityInput">Quantity:</label>
          <input type="number" id="quantityInput" name="quantity" min="0" max="0" value="0" style="width :50px;">
          <p style="color: red;font-size: larger;font-weight: bolder;">OUT OF STOCK</p>
      </div>
          </div>
      </div>
  </div>

  <section id="sec4">

    <div class="ro">
      <h2> Featured Products </h2>
      <div class="row">

      <?php

$products = mysqli_query($con,"SELECT * FROM `product` LIMIT 4");

if (mysqli_num_rows($products) > 0) {
  while ($fetch_products = mysqli_fetch_assoc($products)) {
    $name=$fetch_products['name'];
    $price=$fetch_products['price'];
    $quantity=$fetch_products['quantity'];
    $rating=$fetch_products['rating'];
    $image=$fetch_products['image'];
    $shoes=$fetch_products['shoes'];
    $sale=$fetch_products['sale'];
    $salepercentage=$fetch_products['sale-percentage'];
    $nbrsale=$price-$price*($salepercentage/100);

    if($sale=='yes'){
     echo' <div class="imss"';
     if($quantity==0){echo' onclick="Innerimmg2(this)"';}
     elseif($shoes=='yes'){echo' onclick="Innerimmg3(this)"';}
     
     else{echo' onclick="Innerimmg(this)"';}
     echo'>
      <img src="' . $image .'">
      <h4>' . $name . '</h4>
      <h4 style="color: red;">Hot sale</h4>
      <div class="rating">' . $rating . '</div>
      <h6><s>$' . number_format($price, 2) . '</s><br><p><span style="font-size: medium;">$' . number_format($nbrsale, 2) . '</span></p></h6>
    </div>';
    }

    else{
    echo '<div class="imss"';
    if($quantity==0){echo' onclick="Innerimmg2(this)"';}
    elseif($shoes=='yes'){echo' onclick="Innerimmg3(this)"';}
    else{echo' onclick="Innerimmg(this)"';}
    echo'>
    <img src="' . $image . '" />
    <h4>' . $name . '</h4>
    <div class="rating">' . $rating . '</div>
    <p>$' . $price . '</p>
  </div>';
  }
}
}


?>
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
        // Function to parse URL parameters
        function getParameterByName(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, '\\$&');
            var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, ' '));
        }

        // Retrieve query parameters from the URL
        var imgSrc = getParameterByName('img');
        var productName = getParameterByName('name');
        var productPrice = getParameterByName('price');

        // Update the elements on the page with the received information
        document.getElementById("productImage").src = imgSrc;
        document.getElementById("productName").innerText = productName;
        document.getElementById("productPrice").innerText = productPrice;

        function Innerimmg(e) {
            var imgSrc = e.querySelector('img').src;
            var productName = e.querySelector('h4').innerText;
            var productPrice = e.querySelector('p').innerText;

            var url = 'innering.php?img=' + encodeURIComponent(imgSrc) + '&name=' + encodeURIComponent(productName) + '&price=' + encodeURIComponent(productPrice);
            window.location.href = url;
        }
        function Innerimmg2(e) {
            var imgSrc = e.querySelector('img').src;
            var productName = e.querySelector('h4').innerText;
            var productPrice = e.querySelector('p').innerText;

            var url = 'Innerimmg2.php?img=' + encodeURIComponent(imgSrc) + '&name=' + encodeURIComponent(productName) + '&price=' + encodeURIComponent(productPrice);
            window.location.href = url;
        }
        function Innerimmg3(e) {
            var imgSrc = e.querySelector('img').src;
            var productName = e.querySelector('h4').innerText;
            var productPrice = e.querySelector('p').innerText;

            var url = 'innering-shoes.php?img=' + encodeURIComponent(imgSrc) + '&name=' + encodeURIComponent(productName) + '&price=' + encodeURIComponent(productPrice);
            window.location.href = url;
        }
      const dropdownButton = document.getElementById('dropdownButton');
  dropdownButton.addEventListener('blur', function() {
  dropdownButton.style.backgroundColor = 'white';
  dropdownButton.style.color = 'gray';
});
    </script>

</body>
</html>
