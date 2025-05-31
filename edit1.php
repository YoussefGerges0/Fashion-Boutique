<?php


require_once 'connection.php';


if(isset($_GET['id'])) {
    $userId = $_GET['id'];
    
 
    $query = "SELECT * FROM user WHERE ID = $userId";
    $result = mysqli_query($con, $query);
    
    if($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
      
        echo "User not found!";
        exit(); 
    }
} else {
 
    echo "User ID not provided!";
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            border: 1px solid #ccc; 
            padding: 20px;
            text-align: center; 
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .edit-button {
            display: inline-block;
            padding: 8px 12px;
            margin-top: 10px;
            font-size: 14px;
            cursor: pointer;
            border: 1px solid #007bff;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
        }
        .edit-button:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="edit2.php" method="GET">
            <table>
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                </tr>
                <tr>
                    <td><input type="text" name="id" value="<?php echo $user['ID']; ?>" readonly></td>
                    <td><input type="text" name="username" value="<?php echo $user['username']; ?>"></td>
                    <td><input type="text" name="password" value="<?php echo $user['password']; ?>"></td>
                    <td><input type="text" name="email" value="<?php echo $user['email']; ?>"></td>
                    <td><input type="text" name="phonenumber" value="<?php echo $user['phonenumber']; ?>"></td>
                </tr>
            </table>
            <div>
                <button type="submit" class="edit-button">Edit</button>
            </div>
        </form>
    </div>
</body>
</html>