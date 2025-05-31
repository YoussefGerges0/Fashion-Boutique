<?php
include('snav.php');
require_once 'connection.php';

$query = "SELECT * FROM user";

$result = mysqli_query($con, $query);

if(mysqli_num_rows($result) > 0) {

    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $users = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
 
    <style>

        table {
            width: 100%;
            border-collapse: collapse;
            border: 2px solid #ddd;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
       
        .btn {
            display: inline-block;
            padding: 8px 12px;
            margin: 5px;
            font-size: 14px;
            cursor: pointer;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

    </style>
</head>
<body>


    <div class="content">
        <h1>Users</h1>
        
        <?php if(!empty($users)): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user): ?>
                        <tr>
                            <td><?php echo $user['ID']; ?></td>
                            <td><?php echo $user['username']; ?></td>
                            <td><?php echo $user['password']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['phonenumber']; ?></td>
                            <td><a href="edit1.php?id=<?php echo $user['ID']; ?>" class="btn btn-primary">Edit</a></td>
                            <td><a href="delete.php?id=<?php echo $user['ID']; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No users found.</p>
        <?php endif; ?>
        
    </div>
</div>

</body>
</html>
