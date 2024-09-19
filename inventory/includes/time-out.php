<?php
session_start();

// Set the idle time limit in seconds (10 minutes in this example)
$idle_limit = 600; // 10 minutes

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

// Initialize the last activity time if not set
if (!isset($_SESSION['last_activity'])) {
    $_SESSION['last_activity'] = time();
}

// Update the last activity time
$_SESSION['last_activity'] = time();

// Check if the user has been idle for too long
if (time() - $_SESSION['last_activity'] > $idle_limit) {
    // Notify the user with JavaScript alert
    echo '<script>alert("You have been idle for too long. You will be redirected to the login page.");</script>';
    
    // Redirect to the login page after a short delay
    echo '<script>setTimeout(function(){ window.location.href = "login.php"; }, 2000);</script>';
    exit();
}

// Your regular page content goes here

?>
