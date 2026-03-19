<?php
include 'config.php';


$sql = "CREATE TABLE IF NOT EXISTS parking_slots (
    parking_id INT PRIMARY KEY,
    ghat VARCHAR(20),
    location VARCHAR(50),
    status ENUM('available','occupied','reserved')
)";
$conn->query($sql);


$conn->query("INSERT IGNORE INTO parking_slots VALUES
(41,'ghat-1','area-21','available'),
(42,'ghat-2','area-22','occupied'),
(43,'ghat-3','area-23','reserved'),
(44,'ghat-4','area-24','reserved'),
(45,'ghat-5','area-25','occupied')
");

echo "Parking table ready ";
$conn->close();
?>