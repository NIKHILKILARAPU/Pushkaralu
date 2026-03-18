<?php
include 'config.php';
session_start();
$name = $_POST['name'];
$password = $_POST['password'];
$sql="SELECT * FROM users WHERE username='$name' AND password='$password'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if ($row) {
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['mobile'] = $row['mobile'];
    $_SESSION['gender'] = $row['gender'];
    header("Location: dashboard.php");
} else {
    echo "Invalid username or password";
}
?>