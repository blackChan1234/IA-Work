<?php
    // Start session if not already started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Unset the user session variable
    unset($_SESSION['username']);

    // Destroy the session
    session_destroy();

    // Clear the cookie
    setcookie("user_logged_in", "", time() - 3600);

    // Redirect to the login page
    header("Location: index.php");
    exit();
?>
