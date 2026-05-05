<?php
include 'config.php';
session_start();
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$date = $_POST['date'];
$sql="CREATE TABLE IF NOT EXISTS volunteers (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    volunteer_id VARCHAR(50) DEFAULT NULL,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mobile VARCHAR(15) NOT NULL,
    age INT(3) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    date DATE NOT NULL
)";
if (!mysqli_query($conn, $sql)) {
    echo "Error creating table: " . mysqli_error($conn);
    exit();
}
$sql="INSERT INTO volunteers (name, email, mobile, age, gender, date) VALUES ('$name', '$email', '$mobile', '$age', '$gender', '$date')";
if (mysqli_query($conn, $sql)) {
    $sql="SELECT MAX(id) AS max_id FROM volunteers";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $max_id = $row['max_id'];
    $volunteer_id = "VOL" . str_pad($max_id, 10, '0', STR_PAD_LEFT);
    $sql="UPDATE volunteers SET volunteer_id='$volunteer_id' WHERE id=$max_id";
    if (mysqli_query($conn, $sql)) {
        echo "Volunteer registration successful!";
    } else {
        echo "Error updating volunteer_id: " . mysqli_error($conn);
    }
} else {
    echo "Error inserting data into table: " . mysqli_error($conn);
}

?>