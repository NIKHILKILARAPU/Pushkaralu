<div class="navbar">
    <div class="logo">🕉️ Godavari Pushkaralu</div>
    <div class="nav-links">
        <a href="index.php">Home</a>
        <a href="accommodation.php">Accommodation</a>

        <?php if (isset($_SESSION['user_role'])): ?>
            
            <!-- VVIP SECURE LINK -->
            <?php if ($_SESSION['user_role'] === 'VVIP'): ?>
                <a href="protocol.php" class="vvip-link">🛡️ Protocol Dashboard</a>
            <?php endif; ?>

            <!-- VIP & VVIP SHARED LINK -->
            <?php if ($_SESSION['user_role'] !== 'Normal'): ?>
                <a href="parking.php">🚗 Priority Parking</a>
            <?php endif; ?>

            <span class="user-name">Welcome, <?php echo $_SESSION['user_name']; ?></span>
            <a href="logout.php" class="btn logout-btn">Logout</a>
            
        <?php else: ?>
            <a href="login.php" class="btn login-btn">Login / Register</a>
        <?php endif; ?>
    </div>
</div>