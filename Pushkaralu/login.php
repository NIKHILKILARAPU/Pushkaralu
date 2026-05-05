<?php
session_start();

// 1. BACKEND AUTHENTICATION LOGIC (Simplified for testing)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    
    if ($username === "VVIP-ADMIN") {
        $_SESSION['user_name'] = "District Collector";
        $_SESSION['user_role'] = "VVIP";
        $_SESSION['user_origin'] = "Local";
    } elseif ($username === "VIP-GUEST") {
        $_SESSION['user_name'] = "State Representative";
        $_SESSION['user_role'] = "VIP";
        $_SESSION['user_origin'] = "Other State";
    } else {
        $_SESSION['user_name'] = $username ? $username : "General Pilgrim";
        $_SESSION['user_role'] = "Normal";
        $_SESSION['user_origin'] = "Local";
    }

    header("Location: accommodation.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Godavari Pushkaralu</title>
    <!-- Link to your main CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Google Fonts (Matching your project) -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        .login-wrapper {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), 
                        url('Godavari.png') no-repeat center/cover;
            position: relative;
        }

        /* The "Back to Home" Button */
        .back-home {
            position: absolute;
            top: 30px;
            left: 30px;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            background: rgba(255, 255, 255, 0.2);
            padding: 10px 20px;
            border-radius: 50px;
            backdrop-filter: blur(10px);
            transition: 0.3s;
            border: 1px solid rgba(255,255,255,0.3);
        }

        .back-home:hover {
            background: var(--primary);
            border-color: var(--primary);
        }

        .login-card {
            background: rgba(255, 255, 255, 0.98);
            padding: 45px;
            border-radius: 30px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.4);
            text-align: center;
        }

        .login-card h2 {
            font-family: 'Playfair Display', serif;
            color: var(--secondary);
            font-size: 32px;
            margin-bottom: 10px;
        }

        .login-card p {
            color: #666;
            margin-bottom: 30px;
            font-size: 14px;
        }

        .input-group {
            text-align: left;
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            font-size: 14px;
            color: #444;
        }

        .input-group input {
            width: 100%;
            padding: 14px;
            border: 1px solid #ddd;
            border-radius: 12px;
            outline: none;
            font-size: 16px;
            transition: 0.3s;
        }

        .input-group input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(255, 107, 0, 0.1);
        }

        .login-btn {
            width: 100%;
            padding: 15px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
        }

        .login-btn:hover {
            background: var(--secondary);
            transform: translateY(-2px);
        }

        .test-info {
            margin-top: 25px;
            font-size: 12px;
            color: #999;
            background: #f9f9f9;
            padding: 10px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

    <div class="login-wrapper">
        <!-- BACK BUTTON -->
        <a href="index.php" class="back-home">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
            Back to Home
        </a>

        <div class="login-card">
            <h2>Sign In</h2>
            <p>Access your Pushkaralu Dashboard</p>

            <form action="login.php" method="POST">
                <div class="input-group">
                    <label>ID Number or Name</label>
                    <input type="text" name="username" placeholder="Enter your ID" required>
                </div>
                <div class="input-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="••••••••" required>
                </div>
                <button type="submit" class="login-btn">Secure Login</button>
            </form>

            <div class="test-info">
                Use <b>VVIP-ADMIN</b> for Protocol view <br>
                Use <b>VIP-GUEST</b> for Premium view
            </div>
        </div>
    </div>

</body>
</html>