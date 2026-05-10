<!DOCTYPE html>
<html lang="te">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Official Godavari Pushkaralu - Annadanam Management System</title>
    <style>
        :root {
            --gov-blue: #003366;
            --gov-orange: #ff9933;
            --gov-green: #138808;
            --light-gray: #f4f4f4;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Top Header */
        .gov-header {
            background-color: white;
            padding: 10px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px solid var(--gov-orange);
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .gov-logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .gov-logo img {
            height: 60px;
        }

        .header-text h1 {
            margin: 0;
            font-size: 20px;
            color: var(--gov-blue);
            text-transform: uppercase;
        }

        .header-text p {
            margin: 0;
            font-size: 12px;
            color: #666;
        }

        /* Main Container */
        .container {
            max-width: 900px;
            margin: 40px auto;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .banner {
            background-color: var(--gov-blue);
            color: white;
            padding: 20px;
            text-align: center;
        }

        .main-content {
            padding: 30px;
        }

        .section-title {
            border-left: 5px solid var(--gov-orange);
            padding-left: 15px;
            margin-bottom: 25px;
            color: var(--gov-blue);
        }

        /* Form Styling */
        .grid-form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            font-size: 14px;
        }

        input, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Slot Selection */
        .slot-wrapper {
            margin-top: 20px;
        }

        .slot-options {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }

        .slot-card {
            border: 2px solid #eee;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            transition: 0.3s;
        }

        .slot-card:hover {
            border-color: var(--gov-orange);
        }

        .slot-card.active {
            border-color: var(--gov-orange);
            background-color: #fff4e6;
        }

        .slot-card h4 {
            margin: 0 0 5px 0;
            color: var(--gov-blue);
        }

        .slot-card p {
            margin: 0;
            font-size: 12px;
            color: #777;
        }

        /* Instructions */
        .instructions {
            background-color: #fff9e6;
            border: 1px solid #ffeeba;
            padding: 15px;
            border-radius: 5px;
            margin-top: 30px;
            font-size: 13px;
        }

        .btn-submit {
            background-color: var(--gov-green);
            color: white;
            border: none;
            padding: 15px 40px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            margin-top: 30px;
        }

        /* Receipt Modal */
        #receipt {
            display: none;
            margin-top: 30px;
            border: 2px dashed #ccc;
            padding: 20px;
            background: #fafafa;
        }

        .receipt-header {
            text-align: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        @media (max-width: 600px) {
            .grid-form, .slot-options {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<div class="gov-header">
    <div class="gov-logo">
        <img src="ap.jpg" alt="AP Govt Logo">
        <div class="header-text">
            <h1>Government of Andhra Pradesh</h1>
            <p>Department of Endowments - Godavari Pushkaralu Management</p>
        </div>
    </div>
    <div class="header-text" style="text-align: right;">
        <p>Helpline: 1800-XXX-XXXX</p>
        <p>Pushkaralu Official Portal</p>
    </div>
</div>

<div class="container">
    <div class="banner">
        <h2>Annadanam (Free Meals) Slot Booking</h2>
        <p>Book your time slot for a hassle-free spiritual experience</p>
    </div>

    <div class="main-content">
        <div class="section-title">
            <h3>Pilgrim Registration</h3>
        </div>

        <div class="grid-form">
            <div class="form-group">
                <label for="pName">Full Name (as per ID)</label>
                <input type="text" id="pName" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="pMobile">Mobile Number</label>
                <input type="text" id="pMobile" placeholder="10-digit mobile number">
            </div>
            <div class="form-group">
                <label for="pCount">No. of Persons</label>
                <input type="number" id="pCount" value="1" min="1" max="5">
            </div>
            <div class="form-group">
                <label for="pGhat">Select Location (Ghat)</label>
                <select id="pGhat">
                    <option value="Saraswati Ghat, Rajahmundry">Saraswati Ghat, Rajahmundry</option>
                    <option value="Kotilingala Ghat, Rajahmundry">Kotilingala Ghat, Rajahmundry</option>
                    <option value="Pushkar Ghat, Rajahmundry">Pushkar Ghat, Rajahmundry</option>
                </select>
            </div>
        </div>

        <div class="slot-wrapper">
            <label>Available Food Slots</label>
            <div class="slot-options">
                <div class="slot-card" onclick="selectSlot(this, 'Breakfast', '07:00 AM - 09:30 AM')">
                    <h4>Breakfast</h4>
                    <p>07:00 AM - 09:30 AM</p>
                </div>
                <div class="slot-card" onclick="selectSlot(this, 'Lunch', '12:00 PM - 03:30 PM')">
                    <h4>Lunch</h4>
                    <p>12:00 PM - 03:30 PM</p>
                </div>
                <div class="slot-card" onclick="selectSlot(this, 'Dinner', '07:30 PM - 09:30 PM')">
                    <h4>Dinner</h4>
                    <p>07:30 PM - 09:30 PM</p>
                </div>
            </div>
        </div>

        <div class="instructions">
            <strong>Important Instructions:</strong>
            <ul>
                <li>Please arrive at the Annadanam center 15 minutes prior to your slot.</li>
                <li>Digital or Printed copy of this token is mandatory.</li>
                <li>Each token is valid for the specified number of persons only.</li>
            </ul>
        </div>

        <button class="btn-submit" onclick="generateReceipt()">Book Annadanam Slot</button>

        <div id="receipt">
            <div class="receipt-header">
                <h3>Booking Confirmation Receipt</h3>
                <p>Godavari Pushkaralu Official Token</p>
            </div>
            <div id="receiptContent"></div>
            <p style="text-align:center; font-size: 12px; margin-top: 20px;">This is a computer-generated token and does not require a physical signature.</p>
            <button onclick="window.print()" style="padding: 5px 15px; cursor:pointer;">Print Receipt</button>
        </div>
    </div>
</div>

<script>
    let activeSlotType = "";
    let activeSlotTime = "";

    function selectSlot(el, type, time) {
        const cards = document.querySelectorAll('.slot-card');
        cards.forEach(c => c.classList.remove('active'));
        el.classList.add('active');
        activeSlotType = type;
        activeSlotTime = time;
    }

    function generateReceipt() {
        const name = document.getElementById('pName').value;
        const mobile = document.getElementById('pMobile').value;
        const count = document.getElementById('pCount').value;
        const ghat = document.getElementById('pGhat').value;

        if(!name || !mobile || !activeSlotType) {
            alert("Please fill all details and select a slot.");
            return;
        }

        const tokenNo = "GP" + Math.floor(100000 + Math.random() * 900000);
        const receipt = document.getElementById('receipt');
        const content = document.getElementById('receiptContent');

        receipt.style.display = "block";
        content.innerHTML = `
            <table style="width:100%; border-collapse: collapse;">
                <tr><td style="padding: 8px; border-bottom: 1px solid #eee;"><strong>Token Number:</strong></td><td style="padding: 8px; border-bottom: 1px solid #eee; color: var(--gov-green); font-weight: bold;">${tokenNo}</td></tr>
                <tr><td style="padding: 8px; border-bottom: 1px solid #eee;"><strong>Pilgrim Name:</strong></td><td style="padding: 8px; border-bottom: 1px solid #eee;">${name}</td></tr>
                <tr><td style="padding: 8px; border-bottom: 1px solid #eee;"><strong>Meal Type:</strong></td><td style="padding: 8px; border-bottom: 1px solid #eee;">${activeSlotType}</td></tr>
                <tr><td style="padding: 8px; border-bottom: 1px solid #eee;"><strong>Time Slot:</strong></td><td style="padding: 8px; border-bottom: 1px solid #eee;">${activeSlotTime}</td></tr>
                <tr><td style="padding: 8px; border-bottom: 1px solid #eee;"><strong>Location:</strong></td><td style="padding: 8px; border-bottom: 1px solid #eee;">${ghat}</td></tr>
                <tr><td style="padding: 8px; border-bottom: 1px solid #eee;"><strong>Total Persons:</strong></td><td style="padding: 8px; border-bottom: 1px solid #eee;">${count}</td></tr>
            </table>
        `;
        receipt.scrollIntoView({behavior: 'smooth'});
    }
</script>

</body>
</html>