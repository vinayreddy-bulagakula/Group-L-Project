<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST["token"];
    $password = $_POST["password"];
    
    // Update password in the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET password='$hashed_password', reset_token=NULL, reset_token_expiry=NULL WHERE reset_token='$token'";
    mysqli_query($conn, $sql);

    echo "Password updated successfully.";
}
?>
