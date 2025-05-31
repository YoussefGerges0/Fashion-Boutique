<?php
$server="localhost";
$user="root";
$pass="";
$database="web3project";
$con=mysqli_connect($server,$user,$pass,$database);
if(mysqli_connect_errno())
{
    echo" failed to connect to database:". mysqli_connect_errno();
}
?>