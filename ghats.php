<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ghats Page</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .container{
            width: 90%;
            Max-width: 1200px;
            margin: 40px auto ;
            background: white;
            border: 2px solid black;
            padding: 30px;
            min-height: 500px;
            border-radius: 20px;
            box-shadow:0 4px 15px rgba(0,0,0,0.3);
        }
   .scroll-message{
      width: 500px;
      margin-top: orange; 
      color: black;
      padding: 12px;
      border-radius: 12px;
      font-size: 18px; 
      font-weight: bold;
      box-shadow: 0 4px 12px rgba(255,140,0,0.5);
      margin-bottom: 30px;
}


        h2{
            color: #FF5F1F;
            margin-bottom: 40px;
        }

        h3{
            color: #FF8C00;
            margin-bottom: 40px;
        }


        label{
            font-size: 18px;
        }

        select{
            width: 250px;
            padding: 8px;
            margin-top: 10px;
            margin-bottom: 30px;
            font-size: 16px;
            border-radius: 20px;
             }

        .result{
            margin-top: 20px;
        }

        .result h3{
            margin-bottom: 20px;
        }

        ul{
            line-height: 2;
            font-size: 17px;
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



    <h2> Ghats:</h2>
<div class="scroll-message">
   <marquee behavior="scroll" direction="left">
      TOTAL 373 Ghats are available for the godavari pushkaralu 2027</marquee>
</div>

    <form method="POST">

        <label>Select Place</label><br>

        <select name="place" onchange="this.form.submit()">
            <option value="">-- Select --</option>

            <option value="nashik"
            <?php
            if(isset($_POST['place']) && $_POST['place']=="vizag")
                echo "selected";
            ?>>
            NASHIK
            </option>

            <option value="kovvuru"
            <?php
            if(isset($_POST['place']) && $_POST['place']=="vijayawada")
                echo "selected";
            ?>>
            KOVVURU
            </option>

            <option value="rajahmundry"
            <?php
            if(isset($_POST['place']) && $_POST['place']=="rajahmundry")
                echo "selected";
            ?>>
            Rajahmundry
            </option>
        </select>

    </form>

    <div class="result">

        <h3 color: orange>Available Ghats :</h3>

        <ul>

        <?php

        if(isset($_POST['place']))
        {
            $place = $_POST['place'];

            if($place == "nashik")
            {
                echo "<li>Ramakund - Nashik</li>";
                echo "<li>Kushavatra- Trimbakeswaram</li>";
            }

            elseif($place == "kovvuru")
            {
                echo "<li>subrahmanyeswara swamy ghat -Goshpadakshetram  </li>";
                echo "<li>seetharama bathing ghat - kovvuru</li>";
            }

            elseif($place == "rajahmundry")
            {
                echo "<li>Kotilingala Ghat - Rajahmundry</li>";
                echo "<li>Pushkar Ghat - Rajahmundry</li>";
            }

            else
            {
                echo "<li>No Ghats Available</li>";
            }
        }

        ?>

        </ul>

    </div>

</div>

</body>
</html>