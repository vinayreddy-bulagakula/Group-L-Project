<?php
include("connection.php"); 
    if(empty($_POST["email"]) || empty($_POST["password"]))
    {
        echo "";
    }
    else
    {
        $email=$_POST['email'];
        $password=$_POST['password'];
        $sql="SELECT email FROM login1 WHERE email='$email' and password='$password'";
        $result=mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) >0  )
        {
            header("location: homepage1.html"); 
        }
        else
        {
            echo "Incorrect email or password.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="unerground aberdeen.png">
    <link rel="stylesheet" href="loginabb.css">
    <title>Login</title>
</head>
<body>
    <div class="banner">
        <div class="navbar">
            <a href=""><img src="unerground aberdeen.png" width="200" class="logo"></a>
            <ul>
                <li><a href="Homepage.html">Home</a></li>
                 <li><a href="#">Help & Support</a>    <ion-icon name="call-outline" style= "font-size: 20px; color: #fff;"  ></ion-icon></li>
                <li><a href="#">About</a></li>
            </ul>
        </div>
    <div class="login" >
        <h1>Login</h1>
        <form action="" method="post">
            <div class="input-box">
            <input type="email" required placeholder="Your Email" id="email" class="form-control" name="email" >
            <ion-icon name="mail-outline"></ion-icon>
            </div>
            <div class="input-box">
                
            <input type="password" required placeholder="Your Password" id="password" class="form-control" name="password" >
            <ion-icon name="lock-closed-outline"></ion-icon>
            </div>
            <p><input type="checkbox">I agree to the terms of Services</p>
            <div>
            <button type="submit" class="log-btn"><span></span>Log in</button>
            <p class="text-divider">Or</p>
                <P>Forgot password?? <a href="forgotpassword.html">Click Here </a> </P>
            <p>Don't have an account?</p>
            <button type="button" class="log-btn"><a href="Signup.php" style="color: white; text-decoration: none;">Sign in</button></a>
            </div>
        </form>


    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    
</body>
</html>
