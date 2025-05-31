<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login or Signup - Fashion Boutique</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- External CSS libraries -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"> 
  <!-- Custom CSS -->
  <link rel="stylesheet" href="/css/styles.css">
  <link rel="stylesheet" href="style2.css">
</head>
<body class="lgsn" style="background-image: url('imagee4.jpeg');">
  <div id="abss">
    <button type="button" class="btn mt-4" onclick="goBack()" style="margin-left: 20px;">Go Back</button>
    <button type="button" onclick="logout()" class="btn mt-4" style="margin-right: 20px;">Logout</button>
  </div>
  <form id="loginSignupForm" onsubmit="return validateForm()" method="post">
    <div class="section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 text-center py-5">
            <div class="section pb-5 pt-5 pt-sm-2 text-center">
              <h6 class="mb-0 pb-3" style="font-size: 26px;">Log In <span style="font-size: 26px;">Sign Up</span></h6>
              <input class="checkbox" type="checkbox" id="reg-log" name="red-log"/>
              <label for="reg-log"></label>
              <div class="card-3d-wrap mx-auto">
                <div class="card-3d-wrapper">
                  <div class="card-front">
                    <div class="center-wrap">
                      <div class="section text-center">
                        <h4 class="pb-3" style="color: #AF8260;">Log In</h4>
                        <div class="form-group">
                          <input type="text" class="form-style" placeholder="Username" name="username_login" id="username_login">
                          <i class="input-icon uil uil-user"></i>
                        </div>    
                        <div class="form-group mt-2">
                          <input type="password" class="form-style" placeholder="Password" name="password_login" id="password_login">
                          <i class="input-icon uil uil-lock-alt"></i>
                        </div>
                        <button type="button" onclick="login()" class="btn mt-4">Login</button>
                      </div>
                    </div>
                  </div>
                  <div class="card-back">
                    <div class="center-wrap">
                      <div class="section text-center">
                        <h4 class="mb-3 pb-3" style="color: #AF8260;">Sign Up</h4>
                        <div class="form-group">
                          <input type="text" class="form-style" placeholder="Username" name="username_register" id="username_register">
                          <i class="input-icon uil uil-user"></i>
                        </div>    
                        <div class="form-group mt-2">
                          <input type="tel" class="form-style" placeholder="Phone Number" name="phonenumber" id="phonenumber">
                          <i class="input-icon uil uil-phone"></i>
                        </div>
                        <div class="form-group mt-2">
                          <input type="email" class="form-style" placeholder="Email" name="email_register" id="email_register">
                          <i class="input-icon uil uil-at"></i>
                        </div>
                        <div class="form-group mt-2">
                          <input type="password" class="form-style" placeholder="Password" name="password_register" id="password_register">
                          <i class="input-icon uil uil-lock-alt"></i>
                        </div>
                        <button type="button" onclick="register()" class="btn mt-4">Register</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

  <script>
    function validateForm() {
     
      return true; 
    }

    function login() {
      if (validateForm()) {
        document.getElementById('loginSignupForm').action = 'login.php';
        document.getElementById('loginSignupForm').submit();
      }
    }

    function register() {
      if (validateForm()) {
        document.getElementById('loginSignupForm').action = 'register.php';
        document.getElementById('loginSignupForm').submit();
      }
    }

    function logout() {
      window.location.href = 'logout.php';
    }

    function goBack() {
      window.history.back();
    }
  </script>
</body>
</html>
