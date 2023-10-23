<?php
    include "connect.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $mobile_number = $_POST['mobile_number'];
        $country = $_POST['country'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Check if passwords match
        if ($password != $confirm_password) {
            echo '<script>alert("Passwords do not match.");</script>';
        } else {
            // Check if email is already in use
            $check_email = "SELECT * FROM user_data WHERE email='$email'";
            $result = $conn->query($check_email);

            if ($result->num_rows > 0) {
                echo '<script>alert("Email already exists. Please use a different email.");
                
                </script>';
            } else {
                // Insert data into database
                $sql = "INSERT INTO user_data (full_name, email, mobile_number, country, password) 
                        VALUES ('$full_name', '$email', '$mobile_number', '$country', '$hashed_password')";

                if ($conn->query($sql) === TRUE) {
                    echo '<script>alert("Account created successfully!");
                    window.location.href = "index.html";
                    </script>';
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }

        $conn->close();
    }
?>
