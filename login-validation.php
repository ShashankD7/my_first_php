<?php
    include "connect.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        echo $email;

        $check_user = "SELECT * FROM user_data WHERE email='$email'";
        $result = $conn->query($check_user);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $stored_hashed_password = $row['password'];
            
            if (password_verify($password, $stored_hashed_password)) {
                // Passwords match, user is logged in
                session_start(); // Start the session
                $_SESSION['email'] = $email; // Store user's email in the session

                if(isset($_POST['remember_me']) && $_POST['remember_me'] == '1') {
                    // Set a cookie to remember the user
                    setcookie('email', $email, time() + (86400 * 30), "/");
                }

                header("Location: welcome.php");
                exit();
            } else {
                echo "<script>alert('Invalid email or password.1');
                      window.location.href = 'index.php';
                      </script>";
                exit();
            }
        } else {
            
            echo "<script>alert('Invalid email or password');
                  window.location.href = 'index.php';
                  </script>";
            exit();
        }
    }

    $conn->close();
?>
