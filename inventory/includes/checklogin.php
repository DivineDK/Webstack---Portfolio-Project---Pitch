<?php
function check_login()
{
    // Start session if not already started
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Check if the session ID is set and not empty
    if (empty($_SESSION['id'])) {
        // Construct the URL for redirection
        $host = $_SERVER['HTTP_HOST'];
        $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = "index.php";
        $redirect_url = "http://$host$uri/$extra";

        // Clear the session ID
        $_SESSION["id"] = "";

        // Redirect to the login page
        header("Location: $redirect_url");
        exit;
    }
}
?>
