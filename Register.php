<?php
require_once 'connection.php';
if(isset($_POST['username_register']) && $_POST['username_register']!=""
        && isset($_POST['password_register']) && $_POST['password_register']!=""
        && isset($_POST['phonenumber']) && $_POST['phonenumber']!=""
        && isset($_POST['email_register']) && $_POST['email_register']!="")    
{
    $user=$_POST['username_register'];
    $pass=$_POST['password_register'];
    $phonenumber=$_POST['phonenumber'];
    $email=$_POST['email_register'];

    
    $query="Select * From user where username='$user' and password='$pass'";
    
    $res= mysqli_query($con, $query);
    
    $nbrows= mysqli_num_rows($res);
    if($nbrows== 1)
    {
       echo"error : user already exists, try another username "; 
       header("refresh:5;url=LoginSignup.php");
    }
 else {
    $query2="INSERT INTO `user` (`username`, `password` , `phoneNumber`, `email`, `adminnb` ) VALUES ('$user', '$pass', '$phonenumber', '$email', 0)";   
    $result2= mysqli_query($con,$query2);
    if(!$result2)
    {
       echo"error registration";
       header("refresh:5;url=LoginSignup.php");
    }
    else
    {
    header("location:LoginSignup.php");    
    }
    
}
}
?>