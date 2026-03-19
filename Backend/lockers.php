<?php
include 'config.php';


$sql = "CREATE TABLE IF NOT EXISTS lockers (
    lockers_id INT PRIMARY KEY,
    ghat VARCHAR(20),
    location VARCHAR(50),
    status ENUM('available','occupied','reserved')
)";
$conn->query($sql);


$conn->query("INSERT IGNORE INTO lockers VALUES
(51,'ghat-1','area-31','available'),
(52,'ghat-2','area-32','occupied'),
(53,'ghat-3','area-33','reserved'),
(54,'ghat-4','area-34','reserved'),
(55,'ghat-5','area-35','occupied')
");

echo "Lockers table ready ";
$conn->close();
?>