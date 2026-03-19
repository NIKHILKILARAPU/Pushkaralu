<?php
include 'config.php';


$sql = "CREATE TABLE IF NOT EXISTS food_supply (
    food_supply_id INT PRIMARY KEY,
    ghat VARCHAR(20),
    location VARCHAR(50),
    status ENUM('available','occupied','reserved')
)";
$conn->query($sql);


$conn->query("INSERT IGNORE INTO food_supply VALUES
(21,'ghat-1','area-1','available'),
(22,'ghat-2','area-2','occupied'),
(23,'ghat-3','area-3','reserved'),
(24,'ghat-4','area-4','reserved'),
(25,'ghat-5','area-5','occupied')
");

echo "Food table ready ";
$conn->close();
?>