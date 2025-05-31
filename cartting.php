<?php
include("connection.php");



if(isset($_POST["submit"])){
    $productName = isset($_POST['productName']) ? $_POST['productName'] : '';
    $sql="SELECT * FROM product WHERE name='$productName'";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        echo $row["ID"] . "<br>";
        echo $row["name"] . "<br>";
        echo $row["price"] . "<br>";
        $x=$row["image"];
        echo "<img src=\"{$x}\"><br>";
    }
}
?>

