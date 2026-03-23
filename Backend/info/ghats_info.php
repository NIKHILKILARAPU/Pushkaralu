<?php
include 'config.php';
session_start();
$ghat_name = $_SESSION['ghat_name'];
$ghat_location = $_SESSION['location'];
$incharge_name = $_SESSION['incharge_name'];
$incharge_number = $_SESSION['incharge_number'];
$incharge_mail = $_SESSION['incharge_mail'];
$total_parking_slots = $_SESSION['total_parking_slots'];
$ghat_type = $_SESSION['ghat_type'];
$sql ="CREATE TABLE IF NOT EXISTS ghat_info (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    ghat_id VARCHAR(50) DEFAULT NULL ,
    ghat_name VARCHAR(255) NOT NULL,
    ghat_location VARCHAR(255) NOT NULL,
    incharge_name VARCHAR(255) NOT NULL,
    incharge_number VARCHAR(20) NOT NULL,
    incharge_mail VARCHAR(255) NOT NULL,
    total_parking_slots INT(11) NOT NULL,
    ghat_type VARCHAR(50) NOT NULL
)"; 
if (mysqli_query($conn, $sql)) {
    $sql="INSERT INTO ghat_info (ghat_name, ghat_location, incharge_name, incharge_number, incharge_mail, total_parking_slots, ghat_type) VALUES ('$ghat_name', '$ghat_location', '$incharge_name', '$incharge_number', '$incharge_mail', '$total_parking_slots', '$ghat_type')";
    if (mysqli_query($conn, $sql)) {
        $sql="SELECT MAX(id) AS max_id FROM ghat_info";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $ghat_id = "GHAT" . str_pad($row['max_id'], 4, '0', STR_PAD_LEFT);
        $sql="UPDATE ghat_info SET ghat_id='$ghat_id' WHERE id=" . $row['max_id'];
        if (mysqli_query($conn, $sql)) {
            echo "Table created successfully!";
        } else {
            echo "Error updating ghat_id: " . mysqli_error($conn);
        }
    } else {
        echo "Error inserting data into table: " . mysqli_error($conn);
    }
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

?>