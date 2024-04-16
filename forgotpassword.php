<?php
// Include database connection
include "connection.php";

if(isset($_POST['email'])) {
    $email = $_POST['email'];
    
    // Check if email exists in the database
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) {
        // Generate a unique token
        $token = bin2hex(random_bytes(32));
        
        // Update the user's record with the token
        $update_query = "UPDATE users SET reset_token = '$token' WHERE email = '$email'";
        mysqli_query($conn, $update_query);
        
        // Send password reset link to the user's email
        $reset_link = "http://localhost/reset_password.php?token=$token";
        // Mail function to send email with the reset link
        // mail($email, "Password Reset", "Click the link to reset your password: $reset_link");
        
        echo "Password reset link has been sent to your email.";
    } else {
        echo "The email address provided is not associated with any account. Please double-check your email address and try again.";
    }
    
    
}
?>
