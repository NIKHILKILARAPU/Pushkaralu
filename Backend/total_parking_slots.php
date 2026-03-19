<?php
include 'config.php';
session_start();

$four_wheeler_slots = (int)$_POST['four_wheeler_slots'];
$two_wheeler_slots = (int)$_POST['two_wheeler_slots'];
$ghat = $conn->real_escape_string($_POST['ghat']);

// Create table
$sql = "CREATE TABLE IF NOT EXISTS parking_slots (
    id INT AUTO_INCREMENT PRIMARY KEY,
    parking_id VARCHAR(30) UNIQUE,
    ghat VARCHAR(50),
    vehicle_type VARCHAR(20),
    status VARCHAR(20) DEFAULT 'available'
)";

if (!$conn->query($sql)) {
    die("Error creating table: " . $conn->error);
}

// Insert 4-wheeler slots
for ($i = 1; $i <= $four_wheeler_slots; $i++) {
    $parking_id = $ghat . "-4W-" . str_pad($i, 4, '0', STR_PAD_LEFT);

    $sql = "INSERT IGNORE INTO parking_slots (parking_id, ghat, vehicle_type) 
            VALUES ('$parking_id', '$ghat', '4-wheeler')";

    if (!$conn->query($sql)) {
        echo "Error inserting $parking_id: " . $conn->error . "<br>";
    }
}

// Insert 2-wheeler slots
for ($i = 1; $i <= $two_wheeler_slots; $i++) {
    $parking_id = $ghat . "-2W-" . str_pad($i, 4, '0', STR_PAD_LEFT);

    $sql = "INSERT IGNORE INTO parking_slots (parking_id, ghat, vehicle_type) 
            VALUES ('$parking_id', '$ghat', '2-wheeler')";

    if (!$conn->query($sql)) {
        echo "Error inserting $parking_id: " . $conn->error . "<br>";
    }
}

?>