<?php

/**
 * PUSHKARALU ACCOMMODATION - SECURE TIERED ACCESS
 * This file handles dynamic display based on user role and origin.
 */

// 1. MOCK SESSION DATA
// In the real app, this data will come from your login database.
// Change these to test: Role (Normal, VIP, VVIP) | Origin (Local, Other State)
// If the user isn't logged in, send them back to the login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Now, $user_data is REAL data pulled from the database session
$user_data = [
    'role'   => $_SESSION['user_role'],
    'origin' => $_SESSION['user_origin'],
    'name'   => $_SESSION['user_name']
];
// Get parameters from URL
$selected_ghat = isset($_GET['ghat']) ? $_GET['ghat'] : 'all';
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'default';

function getFilteredAccommodations($role, $origin, $selected_ghat, $sort)
{
    $all_data = [ /* ... your data array ... */];

    $filtered = [];
    function getAccommodations($role, $origin)
    {
        $db_rooms = [ /* Your 500+ rooms from DB team */];
        $results = [];

        foreach ($db_rooms as $room) {
            // STRICT SECURITY CHECK
            // If the room is VVIP, only VVIP users see it.
            // If the room is VIP, only VIP users see it.
            if ($room['role'] === $role) {
                $results[] = $room;
            }
        }
        return $results;
    }

    // 3. Sorting Logic (Price)
    if ($sort == 'low_price') {
        usort($filtered, fn($a, $b) => $a['price'] <=> $b['price']);
    } elseif ($sort == 'high_price') {
        usort($filtered, fn($a, $b) => $b['price'] <=> $a['price']);
    }

    return $filtered;
}

$accommodations = getFilteredAccommodations($user_data['role'], $user_data['origin'], $selected_ghat, $sort);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accommodations | Godavari Pushkaralu</title>
    <!-- Link to your existing style.css -->
    <link rel="stylesheet" href="style.css">
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
</head>

<body>

    <!-- NAVBAR (Reusing your layout) -->
    <div class="navbar">
        <div class="logo">🕉️ Godavari Pushkaralu</div>
        <div class="nav-links">
            <a href="index.php">Home</a>
            <a href="#">Ghats</a>
            <a href="accommodation.php">Accommodation</a>
            <a href="#">VIP Registration</a>
        </div>
    </div>

    <!-- DASHBOARD HEADER -->
    <div class="dashboard-header">
        <div class="user-welcome">
            <h1>Welcome, <?php echo $user_data['name']; ?></h1>
            <p>Showing exclusive rooms for <strong><?php echo $user_data['origin']; ?></strong> residents.</p>
        </div>
        <!-- Dynamic Status Badge -->
        <span class="status-badge status-<?php echo strtolower($user_data['role']); ?>">
            <?php echo $user_data['role']; ?> Member
        </span>
    </div>

    <!-- ACCOMMODATION GRID -->
    <section class="accommodation-container">
        <!-- Add this inside <section class="accommodation-container">, before the <div class="card-grid"> -->
        <div class="sorting-toolbar">
            <!-- GHAT FILTER -->
            <div class="filter-group">
                <label><i data-lucide="map"></i> Select Your Ghat:</label>
                <select id="ghatFilter" onchange="applyFilters()">
                    <option value="all">All Locations</option>
                    <option value="Pushkar Ghat" <?php if (isset($_GET['ghat']) && $_GET['ghat'] == 'Pushkar Ghat') echo 'selected'; ?>>Pushkar Ghat</option>
                    <option value="Saraswati Ghat" <?php if (isset($_GET['ghat']) && $_GET['ghat'] == 'Saraswati Ghat') echo 'selected'; ?>>Saraswati Ghat</option>
                    <option value="Kotilingala Ghat" <?php if (isset($_GET['ghat']) && $_GET['ghat'] == 'Kotilingala Ghat') echo 'selected'; ?>>Kotilingala Ghat</option>
                </select>
            </div>

            <!-- PRICE SORT (Optional but helpful) -->
            <div class="filter-group">
                <label><i data-lucide="arrow-up-down"></i> Sort Price:</label>
                <select id="sortSelect" onchange="applyFilters()">
                    <option value="default">Default</option>
                    <option value="low_price" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'low_price') echo 'selected'; ?>>Low to High</option>
                    <option value="high_price" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'high_price') echo 'selected'; ?>>High to Low</option>
                </select>
            </div>
        </div>
        <div class="card-grid">

            <?php if (empty($accommodations)): ?>
                <!-- Empty State if no rooms found -->
                <div class="empty-state">
                    <h2>No Accommodations Found</h2>
                    <p>There are currently no rooms available for the <?php echo $user_data['role']; ?> category in your region.</p>
                </div>
            <?php else: ?>

                <div class="empty-state">
                    <i data-lucide="search-x"></i>
                    <h2>No Rooms Found</h2>
                    <p>We couldn't find any <?php echo $user_data['role']; ?> accommodations at this location. Try selecting a different Ghat or clearing your filters.</p>
                    <a href="accommodation.php" class="btn">Reset Filters</a>
                </div>
                <?php foreach ($accommodations as $room): ?>
                    <!-- The class uses PHP to inject the role (vvip-border, vip-border, or normal-border) -->
                    <div class="room-card <?php echo strtolower($user_data['role']); ?>-border">
                        <img src="<?php echo $room['img']; ?>" alt="Hotel Image">

                        <div class="room-info">
                            <h3><?php echo $room['name']; ?></h3>
                            <p class="location">📍 <?php echo $room['ghat']; ?></p>

                            <div class="tags">
                                <span>Verified Seva</span>
                                <span>Near Ghat</span>
                            </div>

                            <span class="price-tag">₹<?php echo number_format($room['price']); ?> / day</span>

                            <button class="btn" style="width: 100%;">Book This Room</button>
                        </div>
                    </div>
                <?php endforeach; ?>

            <?php endif; ?>

        </div>
    </section>

    <script>
        // Initialize Lucide Icons
        lucide.createIcons();

        function applySorting() {
            const sortBy = document.getElementById('sortSelect').value;
            // This reloads the page with the new sort parameter
            window.location.href = `accommodation.php?sort=${sortBy}`;
        }

        // Simple instant filtering for the search box
        function filterHotels() {
            let input = document.getElementById('hotelSearch').value.toLowerCase();
            let cards = document.getElementsByClassName('room-card');

            for (let card of cards) {
                let title = card.getElementsByTagName('h3')[0].innerText.toLowerCase();
                if (title.includes(input)) {
                    card.style.display = "";
                } else {
                    card.style.display = "none";
                }
            }
        }

        function applyFilters() {
            const ghat = document.getElementById('ghatFilter').value;
            const sort = document.getElementById('sortSelect').value;

            // Redirects with both parameters
            window.location.href = `accommodation.php?ghat=${ghat}&sort=${sort}`;
        }
    </script>
<!-- BOOKING MODAL -->
<div id="bookingModal" class="modal-overlay">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Reserve Your Stay</h2><button class="btn" onclick="openBookingModal('<?php echo $room['id']; ?>')">Book Now</button>
        </div>
        
        <form action="confirm_booking.php" method="POST" class="booking-form">
            <input type="hidden" id="hotelId" name="hotel_id">
            
            <div class="form-row">
                <div class="form-group">
                    <label>Check-in Date</label>
                    <input type="date" name="checkin" required>
                </div>
                <div class="form-group">
                    <label>Check-out Date</label>
                    <input type="date" name="checkout" required>
                </div>
            </div>

            <div class="form-group">
                <label><?php echo ($_SESSION['user_role'] === 'Normal') ? 'Aadhaar Number' : 'Protocol ID / Service Number'; ?></label>
                <input type="text" name="id_proof" placeholder="Enter ID for verification" required>
            </div>

            <div class="form-group">
                <label>Number of Pilgrims</label>
                <input type="number" name="guests" min="1" max="5" value="1">
            </div>

            <button type="submit" class="confirm-btn">Confirm & Generate QR Pass</button>
        </form>
    </div>
</div>

<style>
.modal-overlay {
    display: none; /* Hidden by default */
    position: fixed;
    top: 0; left: 0; width: 100%; height: 100%;
    background: rgba(0,0,0,0.7);
    backdrop-filter: blur(8px);
    z-index: 2000;
    justify-content: center;
    align-items: center;
}

.modal-content {
    background: white;
    padding: 30px;
    border-radius: 25px;
    width: 100%;
    max-width: 500px;
    animation: slideUp 0.4s ease;
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    border-bottom: 1px solid #eee;
    padding-bottom: 15px;
}

.close-btn { background: none; border: none; font-size: 30px; cursor: pointer; color: #888; }

.form-group { margin-bottom: 15px; }
.form-group label { display: block; font-weight: 600; margin-bottom: 5px; color: #444; }
.form-group input { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 10px; }

.form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }

.confirm-btn {
    width: 100%;
    padding: 15px;
    background: var(--primary);
    color: white;
    border: none;
    border-radius: 12px;
    font-weight: bold;
    cursor: pointer;
    font-size: 16px;
    margin-top: 10px;
}

@keyframes slideUp {
    from { transform: translateY(50px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}
</style>

<script>
function openBookingModal(hotelId) {
    document.getElementById('hotelId').value = hotelId;
    document.getElementById('bookingModal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('bookingModal').style.display = 'none';
}
</script>
</body>

</html>