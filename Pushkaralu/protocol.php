<?php
session_start();

// SECURITY CHECK: Only VVIPs allowed
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'VVIP') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Protocol Dashboard | Godavari Pushkaralu</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        .protocol-main {
            padding: 40px 50px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .protocol-header {
            border-left: 5px solid #d4af37; /* VVIP Gold */
            padding-left: 20px;
            margin-bottom: 40px;
        }

        .protocol-header h1 {
            font-family: "Playfair Display", serif;
            font-size: 36px;
            color: #1a1a1a;
        }

        .protocol-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
        }

        .map-section {
            background: #fff;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            min-height: 500px;
        }

        .map-placeholder {
            width: 100%;
            height: 450px;
            background: #f0f0f0;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            border: 2px dashed #ccc;
        }

        .sidebar-section {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .info-card {
            background: white;
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }

        .info-card h3 {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--secondary);
            margin-bottom: 15px;
            font-size: 18px;
        }

        .contact-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .status-pill {
            background: #e6fffa;
            color: #2c7a7b;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <div class="navbar">
        <div class="logo">🛡️ Protocol Secure</div>
        <div class="nav-links">
            <a href="accommodation.php">Back to Rooms</a>
            <span class="user-name" style="color: #d4af37;">Log: <?php echo $_SESSION['user_name']; ?></span>
            <a href="logout.php" class="btn logout-btn">Secure Logout</a>
        </div>
    </div>

    <div class="protocol-main">
        <div class="protocol-header">
            <h1>Official Protocol Route Map</h1>
            <p>Real-time traffic clearance and secure zones for <strong>Godavari Pushkaralu 2026</strong>.</p>
        </div>

        <div class="protocol-grid">
            <!-- MAIN MAP AREA -->
            <div class="map-section">
                <h3><i data-lucide="map-pin"></i> Live Route Clearance</h3>
                <div class="map-placeholder">
                    <i data-lucide="navigation" style="width: 50px; height: 50px; color: #d4af37;"></i>
                    <p style="margin-top: 15px; font-weight: 600;">Satellite Feed Loading...</p>
                    <span style="font-size: 12px; color: #888;">Clearance active for Route Blue-4</span>
                </div>
            </div>

            <!-- SIDEBAR INFO -->
            <div class="sidebar-section">
                <div class="info-card">
                    <h3><i data-lucide="shield-check"></i> Security Detail</h3>
                    <div class="contact-row">
                        <span>Convoy Lead</span>
                        <span class="status-pill">Active</span>
                    </div>
                    <div class="contact-row">
                        <span>DSP Kakinada</span>
                        <b>+91 98XXX XXX01</b>
                    </div>
                </div>

                <div class="info-card">
                    <h3><i data-lucide="clock"></i> Today's Schedule</h3>
                    <p style="font-size: 14px; line-height: 1.6;">
                        <b>11:00 AM:</b> VIP Ghat Entry<br>
                        <b>12:30 PM:</b> Official Meeting (Collectorate)<br>
                        <b>06:00 PM:</b> Godavari Harathi (Main Deck)
                    </p>
                </div>

                <div class="info-card" style="border: 2px solid #fed7d7;">
                    <h3 style="color: #c53030;"><i data-lucide="alert-triangle"></i> Emergency</h3>
                    <p style="font-size: 13px; color: #666;">One-tap connection to Local Command Center.</p>
                    <button class="btn" style="width: 100%; background: #c53030; margin-top: 10px;">Call Command Center</button>
                </div>
            </div>
        </div>
    </div>

    <script>lucide.createIcons();</script>
</body>
</html>