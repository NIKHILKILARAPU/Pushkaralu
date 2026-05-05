<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Godavari Pushkaralu 2026 | Official Portal</title>
    <link rel="stylesheet" href="style.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <style>
        /* HERO SECTION */
        .hero {
            height: 90vh;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), 
                        url('Godavari.png') no-repeat center/cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            padding: 0 20px;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(40px, 8vw, 80px);
            margin-bottom: 20px;
            text-shadow: 0 5px 15px rgba(0,0,0,0.5);
        }

        .hero p {
            font-size: 1.2rem;
            max-width: 700px;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .cta-group {
            display: flex;
            gap: 20px;
        }

        /* QUICK STATS */
        .stats-bar {
            background: white;
            padding: 40px;
            width: 80%;
            margin: -60px auto 0;
            border-radius: 20px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            text-align: center;
            position: relative;
            z-index: 10;
        }

        .stat-item h3 { color: var(--primary); font-size: 28px; margin-bottom: 5px; }
        .stat-item p { color: #666; font-size: 14px; font-weight: 600; }

        /* SERVICES SECTION */
        .services {
            padding: 100px 50px;
            text-align: center;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .service-card {
            padding: 40px;
            background: #fdfdfd;
            border-radius: 20px;
            border-bottom: 4px solid #eee;
            transition: 0.3s;
        }

        .service-card:hover {
            transform: translateY(-10px);
            border-color: var(--primary);
            box-shadow: 0 15px 30px rgba(0,0,0,0.05);
        }

        .service-card i { color: var(--primary); margin-bottom: 20px; }
        .service-card h4 { margin-bottom: 15px; color: var(--secondary); font-size: 20px; }

        .btn-outline {
            background: transparent;
            border: 2px solid white;
            padding: 12px 30px;
            border-radius: 50px;
            color: white;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-outline:hover { background: white; color: var(--secondary); }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <?php include 'navbar.php'; ?>

    <!-- HERO -->
    <section class="hero">
        <h1>Celestial Godavari</h1>
        <p>Join millions in the holy dip. Experience the spiritual grandeur of the Godavari Pushkaralu 2026 at the historic banks of Kakinada and Rajahmundry.</p>
        <div class="cta-group">
            <a href="accommodation.php" class="btn">Book Stay</a>
            <a href="login.php" class="btn-outline">Official Access</a>
        </div>
    </section>

    <!-- STATS -->
    <div class="stats-bar">
        <div class="stat-item"><h3>12</h3><p>Days of Festival</p></div>
        <div class="stat-item"><h3>100+</h3><p>Holy Ghats</p></div>
        <div class="stat-item"><h3>2M+</h3><p>Expected Pilgrims</p></div>
        <div class="stat-item"><h3>24/7</h3><p>Security Detail</p></div>
    </div>

    <!-- SERVICES -->
    <section class="services">
        <h2 class="section-title">Pilgrim Services</h2>
        <div class="services-grid">
            <div class="service-card">
                <i data-lucide="map"></i>
                <h4>Ghat Finder</h4>
                <p>Find the nearest bathing ghat with real-time crowd density updates.</p>
            </div>
            <div class="service-card">
                <i data-lucide="hotel"></i>
                <h4>Accommodation</h4>
                <p>Verified stays ranging from budget lodges to VVIP guest houses.</p>
            </div>
            <div class="service-card">
                <i data-lucide="shield"></i>
                <h4>Safety & Help</h4>
                <p>Emergency contacts, medical camps, and police assistance points.</p>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer style="background: var(--secondary); color: white; padding: 60px 50px; text-align: center;">
        <p>&copy; 2026 Government of Andhra Pradesh | Godavari Pushkaralu Organizing Committee</p>
    </footer>

    <script>lucide.createIcons();</script>
</body>
</html>