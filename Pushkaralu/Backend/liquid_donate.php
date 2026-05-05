<?php
include 'config.php';
session_start();
$donar_name = $_POST['donar_name'];
$donar_email = $_POST['donar_email'];
$donar_mobile = $_POST['donar_mobile'];
$donar_address = $_POST['donar_address'];
$prefered_date = $_POST['prefered_date'];
$prefered_ghat = $_POST['prefered_ghat'];
$count_of_people = $_POST['count_of_people'];
$sql="CREATE TABLE IF NOT EXISTS liquid_donate (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    donar_id VARCHAR(50) DEFAULT NULL,
    donar_name VARCHAR(255) NOT NULL,
    donar_email VARCHAR(255) NOT NULL,
    donar_mobile VARCHAR(15) NOT NULL,
    donar_address VARCHAR(255) NOT NULL,
    prefered_date DATE NOT NULL,
    prefered_ghat VARCHAR(255) NOT NULL,
    count_of_people INT(11) NOT NULL,
    allocated_ghat VARCHAR(255) DEFAULT NULL,
    allocated_date DATE DEFAULT NULL,
    allocated_slot VARCHAR(20) DEFAULT NULL
)";
if (mysqli_query($conn, $sql)) {
    $sql="INSERT INTO liquid_donate (donar_name, donar_email, donar_mobile, donar_address, prefered_date, prefered_ghat, count_of_people) VALUES ('$donar_name', '$donar_email', '$donar_mobile', '$donar_address', '$prefered_date', '$prefered_ghat', '$count_of_people')";
    if (mysqli_query($conn, $sql)) {
        $sql="SELECT MAX(id) AS max_id FROM liquid_donate";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $max_id = $row['max_id'];
        $donar_id = "LIQD" . str_pad($max_id, 10, '0', STR_PAD_LEFT);
        $sql="UPDATE liquid_donate SET donar_id='$donar_id' WHERE id=$max_id";
        if (mysqli_query($conn, $sql)) {
            echo "Liquid donation request submitted successfully!";
        } else {
            echo "Error updating donar_id: " . mysqli_error($conn);
        }
    } else {
        echo "Error inserting data into table: " . mysqli_error($conn);
    }
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
?>