<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'dbcon.php';
if (isset($_POST['send'])) {
    $email = htmlentities($_POST['email']);
    $stmt = $con->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $mail = new PHPMailer(true);
        // 伺服器設定
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;  // 啟用詳細偵錯輸出
        $token = bin2hex(random_bytes(32));
        $stmt = $con->prepare("INSERT INTO password_reset_requests(email, token, expiry_date) VALUES(?, ?, DATE_ADD(NOW(), INTERVAL 1 HOUR))");
        $stmt->bind_param('ss', $email, $token);
        if(!$stmt->execute()) {
            die("Error storing token: " . $stmt->error);
        }
        $mail->isSMTP();                         // 使用 SMTP
        $mail->Host = 'smtp.gmail.com';  // SMTP 伺服器地址
        $mail->SMTPAuth = true;                // 啟用 SMTP 認證
        $mail->Username = 'iawork720@gmail.com';  // SMTP 使用者名稱
        $mail->Password = 'nubrbbvkfbcryhvy';          // SMTP 密碼
        $mail->Port = 465;                 // TCP port
        $mail->SMTPSecure = 'ssl';
        $mail->isHTML(true);
        // 收件人和寄件人
        $mail->setFrom('iawork720@gmail.com', 'Mailer');
        $mail->addAddress($email);
        $mail->Subject = 'Password Reset';
        $resetLink = "https://localhost/IA-Work/reset_password.php?token=$token";
        $mail->Body = "Click <a href='$resetLink'>here</a> to reset your password.";

        if(!$mail->Send()) {
            echo "Error sending email: " . $mail->ErrorInfo;
        } else {
            echo "Reset link sent to your email.";
        }
    } else {
        echo "This email is not registered.";
    }
    $con->close();
header('Location: Login.php');
}
?>
