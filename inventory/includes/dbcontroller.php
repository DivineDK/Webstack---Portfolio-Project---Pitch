<?php
$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "inventory";  // Corrected the database name

try {
    // Create a new PDO instance and set error mode
    $DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}", $DB_user, $DB_pass);
    $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Optionally, set the character set
    $DB_con->exec("set names utf8mb4");
} catch (PDOException $e) {
    // Display or log the error message
    die("Database connection failed: " . $e->getMessage());
}
?>
