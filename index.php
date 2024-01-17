<?php
// Database credentials
$host = 'localhost'; // or your DB host
$user = 'username';  // your DB username
$pass = 'password';  // your DB password
$db   = 'database';  // your database name

// Since the script is running, Apache is up
echo "Apache is up and running.\n";

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    http_response_code(500); // Internal Server Error
    die("Database connection failed: " . $conn->connect_error);
}

// Query to test DB
$query = "SELECT 1 FROM DUAL"; // Simple query to test database

// Execute query
$result = $conn->query($query);
if ($result) {
    echo "Database is up and running.\n"; // Database is operational
    // Free result set
    $result->free();
} else {
    http_response_code(400); // Bad Request or any appropriate error code
    echo "Error: " . $conn->error;
}

// Display server time
echo "Server Time: " . date('Y-m-d H:i:s') . "\n";

// Close connection
$conn->close();
?>
