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
<body  background="im63.jpg" style="width: 100%;">

  <section id="sec1">
   
    <nav class="navbar navbar-expand-lg navbar-dark ">
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
                <a class="nav-link" href="cart.php" ><i class="fa-solid fa-cart-shopping"></i><span><?php 
                                if(empty($_SESSION['username_login'])){}
                                else{  
                                  $un=$_SESSION['username_login'];
                                  $select_rows = mysqli_query($con, "SELECT * FROM `cart` WHERE username='$un'") or die('query failed');
                                  $row_count = mysqli_num_rows($select_rows);
                                    echo $row_count;} ?></span></a> 
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

    <main>
    <section>
    <h1 class="jersey-25-charted-regular" style="color:#D8AE7E; text-shadow: -0.5px -0.5px 1px rgba(128, 128, 128, 0.7),  
                                                                 0.5px -0.5px 1px rgba(128, 128, 128, 0.7),  
                                                                -0.5px 0.5px 1px rgba(128, 128, 128, 0.7),  
                                                                 0.5px 0.5px 1px rgba(128, 128, 128, 0.7);">Fashion boutique</h1>
         
    <h4 style="text-align: center; color:#D8AE7E; text-shadow: -0.5px -0.5px 1px rgba(128, 128, 128, 0.7),  
                                                             0.5px -0.5px 1px rgba(128, 128, 128, 0.7),  
                                                            -0.5px 0.5px 1px rgba(128, 128, 128, 0.7),  
                                                             0.5px 0.5px 1px rgba(128, 128, 128, 0.7);">Fashion boutique, where we believe in providing stylish and high-quality clothing for men , women & kids. Our mission is to provide you the best experience and best clothing you can find.</h4>
      
    <section style="color:F8C794;">
        <h4 style="text-align: center; color:#D8AE7E; text-shadow: -0.5px -0.5px 1px rgba(128, 128, 128, 0.7),  
                                                                 0.5px -0.5px 1px rgba(128, 128, 128, 0.7),  
                                                                -0.5px 0.5px 1px rgba(128, 128, 128, 0.7),  
                                                                 0.5px 0.5px 1px rgba(128, 128, 128, 0.7);">Our Story</h4>
        
        <h4 style="text-align: center; color:#D8AE7E; text-shadow: -0.5px -0.5px 1px rgba(128, 128, 128, 0.7),  
                                                                 0.5px -0.5px 1px rgba(128, 128, 128, 0.7),  
                                                                -0.5px 0.5px 1px rgba(128, 128, 128, 0.7),  
                                                                 0.5px 0.5px 1px rgba(128, 128, 128, 0.7);">Founded in 2024 , By Georges Maroun & Youssef Gerges , Fashion boutique started as a small online boutique in Amchit. Over the months, we've grown into a leading online destination for fashion enthusiasts to the point to open a real life shop. Stay Tuned for the grand opening.</h4>
     


       <!--  <section style="text-align: center;"><iframe class="wd" width="560" height="315" src="https://www.youtube.com/embed/reLuiy6Ua0M?si=3PINUFJJNaRPamjk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> 
          </section>
          -->
          <h3 style="text-align: center; color:#D8AE7E; text-shadow: -0.5px -0.5px 1px rgba(128, 128, 128, 0.7),  
                                                                 0.5px -0.5px 1px rgba(128, 128, 128, 0.7),  
                                                                -0.5px 0.5px 1px rgba(128, 128, 128, 0.7),  
                                                                 0.5px 0.5px 1px rgba(128, 128, 128, 0.7);">Our Current Location :</h3>
            <div style="display:flex; justify-content: center; align-items:center;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d651.4072008717194!2d35.64490526954499!3d34.14165899832022!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzTCsDA4JzMwLjAiTiAzNcKwMzgnNDQuMCJF!5e1!3m2!1sen!2slb!4v1721248029338!5m2!1sen!2slb" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

          </main>
          <footer>
            <section id="sec8" style="margin-top:6px;">
      
              <div class="ftr">
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
          </footer>
      
      
          <script>
            const dropdownButton = document.getElementById('dropdownButton');
        dropdownButton.addEventListener('blur', function() {
          dropdownButton.style.backgroundColor = '#F6E6CB';
    dropdownButton.style.color = '#D8AE7E';
      });
          </script>


      

</body>
</html>