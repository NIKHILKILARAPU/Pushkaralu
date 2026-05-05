<?php
include 'config.php';
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$sql="CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(50) DEFAULT NULL,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mobile VARCHAR(15) NOT NULL,
    booking_id VARCHAR(50) DEFAULT NULL,
    booked_ghat VARCHAR(50) DEFAULT NULL,
    booking_date DATE DEFAULT NULL
)";
if (mysqli_query($conn, $sql)) {
    $sql="INSERT INTO users (username, password, gender, email, mobile) VALUES ('$username', '$password', '$gender', '$email', '$mobile')";
    if (mysqli_query($conn, $sql)) {
        $sql="SELECT MAX(id) AS max_id FROM users";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $user_id = "USER" . str_pad($row['max_id'], 10, '0', STR_PAD_LEFT);
        $sql="UPDATE users SET user_id='$user_id' WHERE id=" . $row['max_id'];
        if (mysqli_query($conn, $sql)) {
            echo "User registered successfully!";
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;
             $_SESSION['email'] = $email;
             $_SESSION['mobile'] = $mobile;
             $_SESSION['gender'] = $gender;
        } else {
            echo "Error updating user_id: " . mysqli_error($conn);
        }
    } else {
        echo "Error inserting data into table: " . mysqli_error($conn);
    }
} else {
    echo "Error creating table: " . mysqli_error($conn);
}


?>