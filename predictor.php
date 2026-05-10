<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Godavari Pushkaralu Rush Predictor</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background: linear-gradient(to right,#f6d365,#fda085);
            margin:0;
            padding:0;
        }

        .container{
            width: 400px;
            margin: 60px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 5px 20px rgba(0,0,0,0.3);
        }

        h2{
            text-align:center;
            color:#ff6600;
            margin-bottom:25px;
        }

        label{
            font-weight:bold;
        }

        select,input[type="date"]{
            width:100%;
            padding:12px;
            margin-top:8px;
            margin-bottom:20px;
            border-radius:10px;
            border:1px solid #ccc;
            font-size:16px;
        }

        button{
            width:100%;
            padding:12px;
            background:#ff6600;
            color:white;
            border:none;
            border-radius:10px;
            font-size:18px;
            cursor:pointer;
            transition:0.3s;
        }

        button:hover{
            background:#e65c00;
        }

        .result{
            margin-top:25px;
            padding:15px;
            background:#fff3e6;
            border-left:5px solid orange;
            border-radius:10px;
            font-size:18px;
            font-weight:bold;
        }

        .rush-high{
            color:red;
        }

        .rush-medium{
            color:#ff9900;
        }

        .rush-low{
            color:green;
        }
    </style>
</head>
<body>
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

<div class="container">

    <h2>Godavari Pushkaralu Rush Predictor</h2>

    <form method="POST">

        <label>Select Date</label>
        <input type="date" name="date" required>

        <label>Select Ghat</label>
        <select name="ghat" required>
            <option value="">-- Select Ghat --</option>
            <option value="Kotilingala">Kotilingala Ghat</option>
            <option value="Pushkar">Pushkar Ghat</option>
            <option value="ISKCON">ISKCON Ghat</option>
            <option value="Saraswati">Saraswati Ghat</option>
            <option value="TTD">TTD Ghat</option>
        </select>

        <button type="submit" name="predict">Predict Rush</button>

    </form>

<?php

if(isset($_POST['predict'])){

    $date = $_POST['date'];
    $ghat = $_POST['ghat'];

    // Day extraction
    $day = date("l", strtotime($date));

    /*
       Sample Previous Rush Records
       (You can later replace with database values)
    */

    $rush = 0;

    // Weekend heavy rush
    if($day == "Sunday" || $day == "Saturday"){
        $rush += 50000;
    }
    // Friday medium heavy
    else if($day == "Friday"){
        $rush += 35000;
    }
    // Monday moderate
    else if($day == "Monday"){
        $rush += 25000;
    }
    // Normal weekdays
    else{
        $rush += 15000;
    }

    // Ghat based rush
    switch($ghat){

        case "Kotilingala":
            $rush += 20000;
            break;

        case "Pushkar":
            $rush += 30000;
            break;

        case "ISKCON":
            $rush += 15000;
            break;

        case "Saraswati":
            $rush += 10000;
            break;

        case "TTD":
            $rush += 25000;
            break;
    }

    // Random variation
    $rush += rand(1000,8000);

    // Rush Level
    if($rush > 70000){
        $level = "HIGH RUSH";
        $class = "rush-high";
    }
    else if($rush > 40000){
        $level = "MEDIUM RUSH";
        $class = "rush-medium";
    }
    else{
        $level = "LOW RUSH";
        $class = "rush-low";
    }

    echo "
    <div class='result'>
        Date : <b>$date</b><br><br>
        Ghat : <b>$ghat Ghat</b><br><br>

        Estimated Visitors :
        <span class='$class'>$rush People</span><br><br>

        Rush Level :
        <span class='$class'>$level</span>
    </div>
    ";
}

?>

</div>

</body>
</html>