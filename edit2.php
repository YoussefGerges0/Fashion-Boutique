<?php


require_once 'connection.php';


if(isset($_GET['id']) && isset($_GET['username']) && isset($_GET['password']) && isset($_GET['email']) && isset($_GET['phonenumber'])) {
  
    $userId = $_GET['id'];
    $username = $_GET['username'];
    $password = $_GET['password'];
    $email = $_GET['email'];
    $phonenumber = $_GET['phonenumber'];
   
    $query = "UPDATE user SET username = '$username', password = '$password', email = '$email', phonenumber = '$phonenumber' WHERE id = $userId";
    $result = mysqli_query($con, $query);
    
    if($result) {
        header("Location: users.php");
    }
}
?>
