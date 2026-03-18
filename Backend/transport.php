<?php
include 'db.php';


$createTable = "CREATE TABLE IF NOT EXISTS transport (
    s_no INT PRIMARY KEY,
    bus_id VARCHAR(20),
    organizer_name VARCHAR(50),
    phone_number VARCHAR(15),
    email VARCHAR(50),
    address VARCHAR(100),
    vehicle_number VARCHAR(20),
    travel_date DATE,
    starting_time TIME,
    source_location VARCHAR(50)
)";

if ($conn->query($createTable) === TRUE) {
    echo "Table created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}


$insertData = "INSERT INTO transport VALUES
(1,'bus001','name1','97875686757','person1@mail','address1','ap234e3','2027-03-22','11:30:00','eluru'),
(2,'bus002','name2','97875686757','person1@mail','address2','ap234e4','2027-03-23','12:30:00','eluru'),
(3, 'bus003', 'name3', '97875686757', 'person1@mail', 'address3', 'ap234e5', '2027-03-25', '13:30:00', 'eluru'),
(4, 'bus004', 'name4', '97875686757', 'person1@mail', 'address4', 'ap234e6', '2027-03-26', '14:30:00', 'eluru'),
(5, 'bus005', 'name5', '97875686757', 'person1@mail', 'address5', 'ap234e7', '2027-03-27', '15:30:00', 'eluru');

";

if ($conn->query($insertData) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error inserting data: " . $conn->error;
}

$conn->close();
?>