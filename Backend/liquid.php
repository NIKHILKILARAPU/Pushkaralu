<?php
include 'config.php';


$sql = "CREATE TABLE IF NOT EXISTS liquid_supply (
    liquid_supply_id INT PRIMARY KEY,
    ghat VARCHAR(20),
    location VARCHAR(50),
    status ENUM('available','occupied','reserved')
)";
$conn->query($sql);


$conn->query("INSERT IGNORE INTO liquid_supply VALUES
(31,'ghat-1','area-11','available'),
(32,'ghat-2','area-12','occupied'),
(33,'ghat-3','area-13','reserved'),
(34,'ghat-4','area-14','reserved'),
(35,'ghat-5','area-15','occupied')
");

echo "Liquid table ready ";
$conn->close();
?>