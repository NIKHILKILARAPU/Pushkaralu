<?php
include 'config.php';
session_start();

$slots = (int)$_POST['slots'];  
$ghat = $conn->real_escape_string($_POST['ghat']);

// Create table
$sql = "CREATE TABLE IF NOT EXISTS food_supply (
    id INT AUTO_INCREMENT PRIMARY KEY,
    slot_id VARCHAR(30) UNIQUE,
    ghat VARCHAR(50),
    status ENUM('available','occupied','reserved') DEFAULT 'available'
)";

if (!$conn->query($sql)) {
    die("Error creating table: " . $conn->error);
}

// Generate food supply slots
for ($i = 1; $i <= $slots; $i++) {

    $slot_id = $ghat . "-FOOD-" . str_pad($i, 4, '0', STR_PAD_LEFT);

    $sql = "INSERT IGNORE INTO food_supply (slot_id, ghat) 
            VALUES ('$slot_id', '$ghat')";

    if (!$conn->query($sql)) {
        echo "Error inserting $slot_id: " . $conn->error . "<br>";
    }
}

echo "Food supply slots created successfully!";
$conn->close();
?>