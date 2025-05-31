<?php
require_once 'connection.php';
session_start();

if (!empty($_POST['username_login']) && !empty($_POST['password_login'])) {
    $user = $_POST['username_login'];
    $pass = $_POST['password_login'];
    
    // Sanitize inputs
    $user = mysqli_real_escape_string($con, $user);
    $pass = mysqli_real_escape_string($con, $pass);

    // Query to fetch user data where adminnb = 0
    $query = "SELECT * FROM user WHERE username='$user' AND password='$pass' AND adminnb=0";
    $result = mysqli_query($con, $query);

    if ($result) {
        $nbrows = mysqli_num_rows($result);

        if ($nbrows == 1) {
            $_SESSION['loggedin'] = 1;
            $_SESSION['username_login'] = $user;
            header("Location: index.php");
            exit();
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }

    // Query to fetch user data where adminnb = 1
    $query2 = "SELECT * FROM user WHERE username='$user' AND password='$pass' AND adminnb=1";
    $result2 = mysqli_query($con, $query2);

    if ($result2) {
        $nbrows2 = mysqli_num_rows($result2);

        if ($nbrows2 == 1) {
            $_SESSION['loggedin'] = 1;
            $_SESSION['username_login'] = $user;
            header("Location: admin.php");
            exit();
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }

    // If no valid user found, redirect to login page
    header("Location: LoginSignup.php");
    exit();
}

// If username or password are empty, redirect to login page
header("Location: LoginSignup.php");
exit();
?>