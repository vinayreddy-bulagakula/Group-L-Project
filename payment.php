<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="payment.css">
</head>
<body>
    <div class="navbar">
        <a href=""><img src="unerground aberdeen.png" width="200" class="logo"></a>
        <ul>
            <li><a href="homepage1.html">Home</a></li>
            <li><a href="contact1.html">Help & Support</a> <ion-icon name="call-outline" style="font-size: 20px; color: #fff;"></ion-icon></li>
            <li><a href="about1.html">About</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <div class="container">
        <h1>Payment Details</h1>
        <?php
        if (isset($_GET['amount'])) {
            $amount = $_GET['amount'];
            echo "<p>Amount to Pay: £{$amount}</p>";

            if (isset($_GET['type'])) {
                $type = $_GET['type'];
                echo "<p>Ticket Type: $type</p>";
            } else {
                echo "<p>Error: Ticket type not specified</p>";
            }
        } else {
            echo "<p>Error: Amount not specified</p>";
        }
        ?>
        
        <form id="paymentForm" action="ticket.php" method="post">
            <input type="hidden" name="amount" value="<?php echo $amount; ?>"> <br>
            <input type="hidden" name="type" value="<?php echo $_GET['type']; ?>"> 
            <div class="form-group">
                <label for="card-number">Card Number</label>
                <input type="text" id="card-number" name="card-number" placeholder="Enter your card number" required>
                <div class="form-group">
                <label for="expiry-month">Expiry Month</label>
                <select id="expiry-month" name="expiry-month" required>
                    <option value="">Select Month</option>
                    <?php
                    for ($i = 1; $i <= 12; $i++) {
                        printf('<option value="%02d">%02d</option>', $i, $i);
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="expiry-year">Expiry Year</label>
                <select id="expiry-year" name="expiry-year" required>
                    <option value="">Select Year</option>
                    <?php
                    $currentYear = date("Y");
                    for ($i = $currentYear; $i <= $currentYear + 10; $i++) {
                        echo "<option value=\"$i\">$i</option>";
                    }
                    ?>
                </select>
            <div class="form-group">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="Enter CVV" required>
            </div>
            <div class="form-group">
                <label for="card-holder">Card Holder Name</label>
                <input type="text" id="card-holder" name="card-holder" placeholder="Enter card holder name" required>
            </div>
            <button type="submit">Submit Payment</button>
        </form>
    </div>

</body>
</html>
