<?php

include 'dbcon.php';

if(isset($_POST['new_password'])) {
    $token = $_GET['token'];
    $new_password = $_POST['new_password'];

    // Check if token exists and hasn't expired
    $query = "SELECT email FROM password_reset_requests WHERE token = ? AND expiry_date > NOW()";
    $stmt = $con->prepare($query);
    $stmt->bind_param('s', $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        $email = $result->fetch_assoc()['email'];
        // Hash the new password and save it to the user table
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $stmt = $con->prepare("UPDATE user SET password = ? WHERE email = ?");
        $stmt->bind_param('ss', $hashed_password, $email);
        $stmt->execute();
        // Delete the token so it can't be used again
        $stmt = $con->prepare("DELETE FROM password_reset_requests WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();

        echo "Your password has been updated!";
        echo "<script>setTimeout(function(){ window.location.href = 'Login.php'; }, 10000);</script>";
        exit;
    } else {
        echo "Invalid or expired reset link.";
        echo "<script>setTimeout(function(){ window.location.href = 'Login.php'; }, 10000);</script>";
        exit;
    }
}

if(isset($_GET['token'])) {
    $token = $_GET['token'];

    // Check if token exists and hasn't expired (again, for form display)
    $query = "SELECT email FROM password_reset_requests WHERE token = ? AND expiry_date > NOW()";
    $stmt = $con->prepare($query);
    $stmt->bind_param('s', $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        $email = $result->fetch_assoc()['email'];

        // Display form to reset password for $email
        echo "Enter a new password for $email.";
    } else {
        echo "Invalid or expired reset link.";
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
<h2>Reset Password</h2>

<form action="reset_password.php?token=<?php echo $_GET['token']; ?>" method="post">
    <label for="new_password">New Password:</label>
    <input type="password" name="new_password" required>
    <br><br>
    <input type="submit" value="Reset Password">
</form>
</body>
</html>
