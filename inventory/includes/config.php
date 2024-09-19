<?php
$dbuser = "root";   // Database username
$dbpass = "";       // Database password (ensure to set this in a real environment)
$host = "localhost"; // Database host
$db = "inventory";  // Database name

// Create a new mysqli object and check for connection errors
$mysqli = new mysqli($host, $dbuser, $dbpass, $db);

// Check if the connection was successful
if ($mysqli->connect_error) {
    // Connection failed
    die("Connection failed: " . $mysqli->connect_error);
}

// Set the character set to UTF-8 for proper encoding
if (!$mysqli->set_charset("utf8mb4")) {
    echo "Error loading character set utf8mb4: " . $mysqli->error;
}
?>
