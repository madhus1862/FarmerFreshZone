<?php
require 'config.php'; // Include your database configuration

$result = $conn->query("SELECT * FROM vegetables");
$vegetables = [];

while ($row = $result->fetch_assoc()) {
    $vegetables[] = $row;
}

header('Content-Type: application/json');
echo json_encode($vegetables);
?>
