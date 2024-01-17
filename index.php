<?php
ob_start(); // Start output buffering

// Database credentials
$host = 'localhost'; // or your DB host
$user = 'username';  // your DB username
$pass = 'password';  // your DB password
$db   = 'database';  // your database name

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    http_response_code(500);
    echo "Database connection failed: " . $conn->connect_error . "\n";
    ob_end_flush(); // Send output buffer and turn off output buffering
    exit;
}

// Apache status
echo "Apache is up and running.\n";

// Query to test DB
$query = "SELECT 1 FROM DUAL";
$result = $conn->query($query);
if ($result) {
    echo "Database is up and running.\n";
    $result->free();
} else {
    http_response_code(500);
    echo "Error executing query: " . $conn->error . "\n";
}

// Server Time
echo "Server Time: " . date('Y-m-d H:i:s') . "\n";

$conn->close();
ob_end_flush(); // Send output buffer and turn off output buffering
?>
