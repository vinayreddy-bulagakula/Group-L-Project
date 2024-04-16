<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<?php
if(isset($_POST['register'])){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone= $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    if($password !== $confirm_password){
        echo "Passwords do not match!";
    } else {
        
        $sql = "INSERT INTO login1 (fullname, email, phone, password) VALUES ('$fullname', '$email', '$phone', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
            header("location:login1.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>
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
    <form action="" method="post">
        <h2>Sign Up</h2>
        <div class="form-group">
            <label for="text">Full name</label>
            <input type="text" id="name" name="fullname" placeholder="Full Name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="Enter your email address"  required>
            
        </div>
         <div class="form-group">
            <label for="mobile">Phone Number</label>
            <input type="text" id="phone number" name="phone" placeholder="Your phone number" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>
       
        <div class="form-group">
            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
        </div>
        <p><input type="checkbox">Agree to the terms & conditions</p>
        <button type="submit" name=register>Sign in</button>
        <p>Already have an account? <a href="login1.php">Log In</a></p>
    </form>
</div>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>
