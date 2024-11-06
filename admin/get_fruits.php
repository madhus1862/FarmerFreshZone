<?php
// Database configuration
$host = 'localhost:3307'; // Typically, this is 'localhost'
$user = 'root';      // Default XAMPP username
$password = '';      // Default XAMPP password (usually empty)
$database = 'adminfarmer'; // Your database name

// Create connection
$mysqli = new mysqli($host, $user, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Query to fetch fruits
$query = "SELECT * FROM fruits";
$result = $mysqli->query($query);

// Check for query error
if (!$result) {
    die("Query failed: " . $mysqli->error);
}

// Fetch data and return as JSON
$fruits = [];
while ($row = $result->fetch_assoc()) {
    $fruits[] = $row;
}

echo json_encode($fruits);

// Close connection
$mysqli->close();
?>
