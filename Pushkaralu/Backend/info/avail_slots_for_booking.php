<?php
include 'config.php';
session_start();

$starting_date = $_POST['starting_date'] ?? '';
$ghat = $_POST['ghat'] ?? '';
$no_of_days = $_POST['no_of_days'] ?? 0;
$starting_time_slot = $_POST['starting_time_slot'] ?? '';
$no_of_time_slots = $_POST['no_of_time_slots'] ?? 0;

// Create table
$sql = "CREATE TABLE IF NOT EXISTS available_slots (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ghat VARCHAR(50),
    date DATE,
    time_slot VARCHAR(20),
    total_slots INT,
    booked_slots INT DEFAULT 0,
    is_booked BOOLEAN DEFAULT FALSE
)";

if (!mysqli_query($conn, $sql)) {
    die("Error creating table: " . mysqli_error($conn));
}

// Convert starting time into DateTime
$startTime = new DateTime($starting_time_slot);

for ($i = 0; $i < $no_of_days; $i++) {

    // Clone date for each day
    $current_date = date('Y-m-d', strtotime($starting_date . " +$i days"));

    // Reset time for each day
    $currentTime = clone $startTime;

    for ($j = 0; $j < $no_of_time_slots; $j++) {

        $time_slot = $currentTime->format('H:i:s');

        $sql = "INSERT INTO available_slots (ghat, date, time_slot, total_slots) 
                VALUES ('$ghat', '$current_date', '$time_slot', 10)"; // set slots per time

        if (!mysqli_query($conn, $sql)) {
            echo "Error inserting row: " . mysqli_error($conn);
        }

        // Add 2 hours
        $currentTime->modify('+2 hours');
    }
}
?>