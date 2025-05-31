<?php

require_once 'connection.php';

if(isset($_GET['id'])) {
    $userId = $_GET['id'];
    
    $query = "DELETE FROM user WHERE id = $userId";
    $result = mysqli_query($con, $query);
    
    if($result) {
        header("Location: users.php");
}
}
?>
