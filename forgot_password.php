<?php
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $resetLink = "http://localhost:63342//reset_password.php?token=" . generateToken();

    $mail = new PHPMailer;
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify Gmail SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'abcd20031007@gmail.com';  // SMTP username
    $mail->Password = 'yuki5b01';  // SMTP password
    $mail->SMTPSecure = 'tls';  // Enable TLS encryption
    $mail->Port = 587;  // TCP port to connect to

    $mail->setFrom('abcd20031007@gmail.com', 'Mailer');
    $mail->addAddress($email);  // Add recipient

    $mail->isHTML(true);  // Set email format to HTML

    $mail->Subject = 'Password Reset';
    $mail->Body    = "Click the following link to reset your password: $resetLink";

    if($mail->send()) {
        echo "Password reset link sent to your email.";
    } else {
        echo "Failed to send reset link.";
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}

function generateToken() {
    return uniqid();
}
?>