<?php
include 'config.php';
session_start();

$slots = (int)$_POST['slots'];   // total economical slots
$ghat = $conn->real_escape_string($_POST['ghat']);

// Create table
$sql = "CREATE TABLE IF NOT EXISTS economical_slots (
    id INT AUTO_INCREMENT PRIMARY KEY,
    slot_id VARCHAR(30) UNIQUE,
    ghat VARCHAR(50),
    status VARCHAR(20) DEFAULT 'available'
)";

if (!$conn->query($sql)) {
    die("Error creating table: " . $conn->error);
}

// Generate slots dynamically
for ($i = 1; $i <= $slots; $i++) {

    $slot_id = $ghat . "-ECO-" . str_pad($i, 4, '0', STR_PAD_LEFT);

    $sql = "INSERT IGNORE INTO economical_slots (slot_id, ghat) 
            VALUES ('$slot_id', '$ghat')";

    if (!$conn->query($sql)) {
        echo "Error inserting $slot_id: " . $conn->error . "<br>";
    }
}

echo "Economical slots created successfully!";
$conn->close();
?>