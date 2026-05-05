<?php
include 'config.php';
session_start();
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$gender = $_POST['gender'];
$ghat = $_POST['ghat'];
$booking_date = $_POST['booking_date'];
$stall_type = $_POST['stall_type'];
$payment_status = $_POST['payment_status'];
$sql="CREATE TABLE IF NOT EXISTS economic_stalls (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    booking_id VARCHAR(50) DEFAULT NULL,
    user_id VARCHAR(50) DEFAULT NULL,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mobile VARCHAR(15) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    ghat VARCHAR(10) NOT NULL,
    booking_date DATE NOT NULL,
    stall_type VARCHAR(50) NOT NULL,
    payment_status VARCHAR(50) NOT NULL
)";
if (!mysqli_query($conn, $sql)) {
    echo "Error creating table: " . mysqli_error($conn);
    exit();
}
if ($payment_status !== 'success') {
    echo "Payment failed. Stall booking unsuccessful.";
    exit();
}
else {
    $sql="INSERT INTO economic_stalls (name, email, mobile, gender, ghat, booking_date, stall_type, payment_status) VALUES ('$name', '$email', '$mobile', '$gender', '$ghat', '$booking_date', '$stall_type', '$payment_status')";
    if (mysqli_query($conn, $sql)) {
        $sql="SELECT MAX(id) AS max_id FROM economic_stalls";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $max_id = $row['max_id'];
        $booking_id = "STALL" . str_pad($max_id, 10, '0', STR_PAD_LEFT);
        $sql="UPDATE economic_stalls SET booking_id='$booking_id' WHERE id=$max_id";
        if (mysqli_query($conn, $sql)) {
            echo "Stall booking successful!";
        } else {
            echo "Error updating booking_id: " . mysqli_error($conn);
        }
    } else {
        echo "Error inserting data into table: " . mysqli_error($conn);
    }
}


    
?>