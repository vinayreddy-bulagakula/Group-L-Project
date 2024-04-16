<?php
session_start();

if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    header("Location: login1.php");
    exit();
}

?>

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
    </div>

    <div class="container">
        <h1>Payment Details</h1>
    </div>
</body>
</html>
