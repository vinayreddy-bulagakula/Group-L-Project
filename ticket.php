<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ticket.css">
    <title>Bus Ticket</title>
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
    <div class="ticket">
        <h1>Aberdeen Bus Ticket</h1>
        <div class="ticket-info">
            <?php
            if (isset($_POST['amount'])) {
                $amount = $_POST['amount'];
                echo "<p><strong>Amount:</strong> £{$amount}</p>";

                if (isset($_POST['type'])) {
                    $type = $_POST['type'];
                    echo "<p><strong>Ticket Type:</strong> {$type}</p>";
                } else {
                    echo "<p>Error: Ticket type not specified</p>";
                }
            } else {
                echo "<p>Error: Amount not specified</p>";
                exit();
            }
            ?>
        </div>
        <div class="qr-code">
            <?php
            $qr_code_url = "https://api.qrserver.com/v1/create-qr-code/?data=$amount&size=150x150";
            echo "<img src='$qr_code_url' alt='QR Code'>";
            ?>
        </div>
        <form action="download.php" method="post">
    <input type="hidden" name="amount" value="<?php echo htmlspecialchars($_POST['amount']); ?>">
    <input type="hidden" name="type" value="<?php echo htmlspecialchars($_POST['type']); ?>">
    <button type="submit">Download PDF</button>
</form>

    </div>
</body>
</html>
