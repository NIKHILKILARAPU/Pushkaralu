<?php
include 'config.php';
session_start();

// Create table
$createTable = "CREATE TABLE IF NOT EXISTS bookings (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    booking_id VARCHAR(50),
    user_id VARCHAR(50),
    ghat VARCHAR(50),
    booking_date DATE,
    time_slot VARCHAR(20),
    category VARCHAR(50),
    payment_status VARCHAR(20)
)";
mysqli_query($conn, $createTable);

// Get POST values safely
$category = $_POST['category'] ?? '';
$ghat = $_POST['ghat'] ?? '';
$booking_date = $_POST['booking_date'] ?? '';
$payment_status = $_POST['payment_status'] ?? '';

// ✅ Validate category
$allowed_categories = ['vvip', 'vip'];
if (!in_array($category, $allowed_categories)) {
    echo "Invalid category!";
    exit();
}

// ✅ Detect selected time slot
$time_slot = null;
for ($i = 1; $i <= 5; $i++) {
    if (isset($_POST['time_slot_' . $i])) {
        $time_slot = 'ts' . $i;
        break;
    }
}

if (!$time_slot) {
    echo "No time slot selected.";
    exit();
}

// ✅ Check payment
if ($payment_status !== 'paid') {
    echo "Payment failed. Please try again.";
    exit();
}

// ✅ Get max id
$result = mysqli_query($conn, "SELECT MAX(id) AS max_id FROM bookings");
$row = mysqli_fetch_assoc($result);
$max_id = $row['max_id'] ?? 0;

// ✅ Prefix
$prefix = ($category == 'vvip') ? 'VVIP' : 'VIP';

// ✅ Generate booking ID
$booking_id = $prefix . str_pad($max_id + 1, 10, '0', STR_PAD_LEFT);

// ✅ Get user
if (!isset($_SESSION['user_id'])) {
    echo "User not logged in!";
    exit();
}
$user_id = $_SESSION['user_id'];

// ✅ OPTIONAL: Prevent duplicate booking for same slot
$check = "SELECT * FROM bookings 
          WHERE ghat='$ghat' AND booking_date='$booking_date' AND time_slot='$time_slot'";
$check_result = mysqli_query($conn, $check);

if (mysqli_num_rows($check_result) > 0) {
    echo "This slot is already booked!";
    exit();
}

// ✅ Insert booking
$insert = "INSERT INTO bookings 
(booking_id, user_id, ghat, booking_date, time_slot, category, payment_status)
VALUES 
('$booking_id', '$_SESSION['user_id']', '$ghat', '$booking_date', '$time_slot', '$category', '$payment_status')";

if (mysqli_query($conn, $insert)) {

    // ✅ Update user table
    $update = "UPDATE users 
               SET booking_id='$booking_id', booked_ghat='$ghat', booking_date='$booking_date' 
               WHERE user_id='$_SESSION['user_id']'";

    if (mysqli_query($conn, $update)) {
        echo "Booking successful!";
    } else {
        echo "Error updating user: " . mysqli_error($conn);
    }

} else {
    echo "Insert error: " . mysqli_error($conn);
}
?>