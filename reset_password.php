<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Database connection
include "connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the email from the form
    $email = $_POST['email'];
    
    // Generate a unique token
    $token = bin2hex(random_bytes(32));
    
    // Update the user's record with the token
    $update_query = "UPDATE users SET reset_token = '$token' WHERE email = '$email'";
    mysqli_query($conn, $update_query);

    // Send password reset link to the user's email
    $reset_link = "http://localhost/reset_password.php?token=$token";

    // Send email using PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $phpmailer = new PHPMailer();
$phpmailer->isSMTP();
$phpmailer->Host = 'sandbox.smtp.mailtrap.io';
$phpmailer->SMTPAuth = true;
$phpmailer->Port = 2525;
$phpmailer->Username = '29319907f7d437';
$phpmailer->Password = 'ae48444da35b05';
        // Recipients
        $mail->setFrom('vinayreddy029@gmail.com', 'vinay Reddy');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Password Reset';
        $mail->Body    = "Click the link to reset your password: <a href='$reset_link'>$reset_link</a>";

        $mail->send();
        echo 'Password reset link has been sent to your email.';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
