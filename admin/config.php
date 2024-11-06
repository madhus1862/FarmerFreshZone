<?php
$host = 'localhost:3307'; // Change this if your MySQL is running on a different host
$username = 'root'; // Default username for XAMPP
$password = ''; // Default password for root is usually empty in XAMPP
$dbname = 'adminfarmer'; // The name of the database you just created

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully"; // Optional: Test if the connection is successful
?>
