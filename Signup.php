<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish connection to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "databases";

    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number= $_POST['number'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into database
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo '<p <a href="" style="color: #f2eded;">Signup successful!</p>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="banner">
        <div class="navbar">
            <a href=""><img src="unerground aberdeen.png" width="200" class="logo"></a>
            <ion-icon name="call-outline"></ion-icon>
            <ul>
                <li><a href="Homepage.html">Home</a></li>
                 <li><a href="#">Help & Support</a>    <ion-icon name="call-outline" style= "font-size: 20px; color: #fff;"  ></ion-icon></li>
                <li><a href="about.html">About</a></li>
            </ul>
        </div>

<div class="container">
    <form action="#" method="POST">
        <h2>Sign Up</h2>
        <div class="form-group">
            <label for="name">Full name</label>
            <input type="text" id="username" name="username" placeholder="Full Name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="Enter your email address"  required>
            
        </div>
         <div class="form-group">
            <label for="mobile">Phone Number</label>
            <input type="text" id="number" name="number" placeholder="Your phone number" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>
       
        <div class="form-group">
            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="password" name="password" placeholder="Confirm your password" required>
        </div>
        <p><input type="checkbox">Agree to the terms & conditions</p>
        <button type="submit">Sign Up</button>
        <p>Already have an account? <a href="loginabb.html">Log In</a></p>
    </form>
</div>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>
