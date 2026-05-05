<?php
include 'config.php';
session_start();

// Create table
$createTable = "CREATE TABLE IF NOT EXISTS parking (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    parking_id VARCHAR(50),
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mobile VARCHAR(15) NOT NULL,
    vehicle_number VARCHAR(20) NOT NULL,
    vehicle_type VARCHAR(20) NOT NULL,
    ghat_name VARCHAR(255) NOT NULL,
    starting_time TIME NOT NULL,
    ending_time TIME NOT NULL,
    date DATE NOT NULL
)";
mysqli_query($conn, $createTable);

// Get POST data safely
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$mobile = $_POST['mobile'] ?? '';
$vehicle_number = $_POST['vehicle_number'] ?? '';
$vehicle_type = $_POST['vehicle_type'] ?? '';
$ghat_name = $_POST['ghat_name'] ?? '';
$starting_time = $_POST['starting_time'] ?? '';
$ending_time = $_POST['ending_time'] ?? '';
$date = $_POST['date'] ?? '';
$payment_status = $_POST['payment_status'] ?? '';

// ✅ Minimal validation
if (empty($name) || empty($email) || empty($vehicle_number)) {
    echo "Invalid input!";
    exit();
}

// ✅ Validate vehicle type
$allowed_types = ['Two Wheeler', 'Four Wheeler'];
if (!in_array($vehicle_type, $allowed_types)) {
    echo "Invalid vehicle type!";
    exit();
}

// ✅ Payment check
if ($payment_status !== 'success') {
    echo "Payment failed. Parking booking unsuccessful.";
    exit();
}

// ✅ Insert booking
$insert = "INSERT INTO parking 
(name, email, mobile, vehicle_number, vehicle_type, ghat_name, starting_time, ending_time, date)
VALUES 
('$name', '$email', '$mobile', '$vehicle_number', '$vehicle_type', '$ghat_name', '$starting_time', '$ending_time', '$date')";

if (mysqli_query($conn, $insert)) {

    // ✅ Safe ID generation
    $last_id = mysqli_insert_id($conn);
    $parking_id = "PARK" . str_pad($last_id, 10, '0', STR_PAD_LEFT);

    // ✅ Update parking_id
    $update = "UPDATE parking SET parking_id='$parking_id' WHERE id='$last_id'";

    if (mysqli_query($conn, $update)) {
        echo "Parking booked successfully!";
    } else {
        echo "Error updating parking_id: " . mysqli_error($conn);
    }

} else {
    echo "Insert error: " . mysqli_error($conn);
}
?>