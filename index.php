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
<link rel="stylesheet" href="style.css">
<!-- My script Link -->
<script src="jscode.js"></script>
    
</head>
<body>

  <section id="sec1">
   
    <nav class="navbar navbar-expand-lg navbar-dark bg-white ">
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
              </li> </a>
              </li>
              <li class="nav-item">
              <li class="nav-item">
                            <?php if(!empty($_SESSION['username_login'])){
                              echo"<div class='dropdown'>
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





    <div id="carouselExampleInterval" class="carousel slide bbbb" data-bs-ride="carousel" style="margin-top:-10px;margin-bottom:-10px;">
      <div class="carousel-indicators bbbb" >
          <button type="button" data-bs-target="#carouselExampleCaptions bbbb" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions bbbb" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions bbbb" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
      <div class="carousel-inner bbbb">
        <div class="carousel-item active bbbb" data-bs-interval="10000">
          <img class="test11 bbbb" src="img4.png" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
              <h3 style="color: #000000;font-family:poppins;">Huge Sale </h3>
          <a href="allproducts4.php" class="btn btn-lg btn-primary" >Check it Out</a>  
          </div>  
      </div>
        <div class="carousel-item" data-bs-interval="2000">
          <img class="test11" src="photo102.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
              <h5></h5>
              <p></p>

            </div>
      </div>
        <div class="carousel-item">
          <img  class="test11" src="img2.png" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h3 style="color: #000000;font-family:poppins;">New Polo On Sale</h3>

            <a href="allproducts2.php" class="btn btn-lg btn-primary">Click to check it</a>
            </div>
      </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

















      <section id="sec2">

        <div class="ab">
          <h1>Give Your Dressing <br>A New Style</h1>
          <p> Dive into a curated collection where style meets<br> innovation and discover the latest trends and timeless <br>classics tailored just for you.</p>
          <a href="allproducts.php" class="btn1">Explore Now</a>
        </div>
        <div class="ab">
          <img src="im5.jpeg">
        </div>

      </section>



      <section id="sec4">

        <div class="ro">
          <h2> Featured Products </h2>
          <div class="row">

          <?php

$products = mysqli_query($con, "SELECT * FROM `product`  LIMIT 4");

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
</div>
         <div class="ro" >
           <h2> Latest Products </h2>
           <div class="row">

           <?php

$products = mysqli_query($con, "SELECT * FROM `product`  LIMIT 4 OFFSET 4");

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
      </div>

      </section>



      <section id="sec3">
        <h2>Coming Soon</h2>
               <div class="roo" >
                 <div class="row">          
                  <div class="imss o1" >
                    <img src="im6.jpg">
                  </div>
                  <div class="imss o2">
                    <img src="im7.jpg">
                  </div>
                  <div class="imss o3">
                    <img src="im8.jpg">
                  </div>
                 </div>
                </div>
        
              </section>




      <section id="sec5">

        <div class="s4d">
            <img src="im18.jpg">
          </div>
          <div class="s4d s4dd">
            <p>Available on Fashion Boutique</p>
            <h1>Silver Necklace</h1>
            <small>With every order you do you will get one for free</small><br><br>
            <a href="allproducts.php" class="btn2">Explore Now</a>
      </div>

      </section>

      <section id="sec6">

        <div class="test">
          <i class="fa fa-quote-left" aria-hidden="true"></i>
          <p> Amazing website <br> Easy to use <br> High quality products</p><br>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i> <br>
          <img src="im19.jpg"><br>
          <h3>Rami Zein</h3>
        </div>
        <div class="test">
          <i class="fa fa-quote-left" aria-hidden="true"></i>
          <p> Found what I was <br>searching for a <br>cheap price </p>    <br>     
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star-half-o" aria-hidden="true"></i><br>   
          <img src="im20.jpeg"> <br> 
          <h3>Myriam Asas</h3>
        </div>
        <div class="test">
          <i class="fa fa-quote-left" aria-hidden="true"></i>
          <p>Liked the website <br> Amazing products <br> And nice offer</p> <br>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star-o" aria-hidden="true"></i><br>
          <img src="im21.jpeg"><br>
          <h3>Joe Parker</h3>
        </div>

      </section>
      
      <section id="sec7">

        <div class="br">
          <img src="im22.jpeg">
        </div>
        <div class="br">
          <img src="im25.jpeg">
        </div>
        <div class="br">
          <img src="im23.jpeg">
        </div>
        <div class="br">
          <img src="im26.jpeg">
        </div>
        <div class="br">
          <img src="im24.jpeg">
        </div>

      </section>



<br><br>



<section>
  <div class="scrolling-text-container">
    <div class="scrolling-text-inner" style="--marquee-speed: 20s; --direction:scroll-left" role="marquee">
        <div class="scrolling-text">
            <div class="scrolling-text-item">Where innovation meets imagination. ©</div>
            <div class="scrolling-text-item">Crafting dreams into digital reality. © </div>
            <div class="scrolling-text-item">Elevating creativity, inspiring ownership. ©</div>
            <div class="scrolling-text-item">Dress your best, copyright the rest. ©</div>
            <div class="scrolling-text-item">Crafing your dreams with our Clothes. ©</div>
            <div class="scrolling-text-item">Style in every stitch. ©</div>
            <div class="scrolling-text-item">Fashion Forward. ©</div>
            <div class="scrolling-text-item">Dress to Impress. ©</div>
            <div class="scrolling-text-item">Original Threads. ©</div>
            <div class="scrolling-text-item">Fashion Boutique your way for elegance. ©</div>
            <!-- Add More Items Here -->
        </div>
    </div>
</div>
</section>

<br><br>









      <section id="sec8">

        <div>
          <h1 id="d2">Fashion Boutique</h1>
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
