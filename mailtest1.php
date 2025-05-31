<?php 
require "mailtest.php";

$response = '';

if (isset($_POST['send'])) {
    if (empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['message'])) {
        $response = "All fields are required";
    } else {
        $response = sendMail($_POST['email'], $_POST['subject'], $_POST['message']);
        $response = "Email sended successfully";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email</title>
</head>
<body>
    <form action="" method="post">
        Email: <input type="email" name="email" value=""><br>
        Subject: <input type="text" name="subject" value=""><br>
        Message: <input type="text" name="message" value=""><br>
        <button type="submit" name="send">Send</button>
    </form>
    <?php
    if (!empty($response)) {
        echo "<p>{$response}</p>";
    }
    ?>
</body>
</html>
