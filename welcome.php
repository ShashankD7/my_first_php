<?php
session_start(); // Start the session

if(isset($_SESSION['email'])){
    include "connect.php";
    $email = $_SESSION['email'];
    $query = "SELECT * FROM user_data WHERE email='$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $full_name = $row['full_name'];
        $email = $row['email'];
        $mobile_number = $row['mobile_number'];
        $country = $row['country'];
    } else {
        echo "Error fetching user information.";
    }

    $conn->close();
}  else if(isset($_COOKIE['email'])){
        $email = $_COOKIE['email'];
        include "connect.php";
        $query = "SELECT * FROM user_data WHERE email='$email'";
        $result = $conn->query($query);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $full_name = $row['full_name'];
            $mobile_number = $row['mobile_number'];
            $email = $row['email'];
            $country = $row['country'];
        } else {
            echo "Error fetching user information.";
        }
    
        $conn->close();
    } else {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="container">
    <h1>Welcome <?php echo $full_name; ?></h1>
    <div class="user-info">
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <p><strong>Mobile Number:</strong> <?php echo $mobile_number; ?></p>
        <p><strong>Country:</strong> <?php echo $country; ?></p>
    </div>
    <form action="logout.php" method="post">
        <input type="submit" value="Logout">
    </form>
</div>
</body>
</html>
