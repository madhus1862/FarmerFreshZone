<?php
$host = 'localhost:3307';
$dbname = 'farmerfreshzone';
$username = 'root'; 
$password = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $phoneNumber = $_POST['Mobilenumber'];
        $password = $_POST['password'];
        $stmt = $pdo->prepare("INSERT INTO farmer1 (Mobilenumber, password) VALUES (:Mobilenumber, :password)");
        $stmt->bindParam(':Mobilenumber', $phoneNumber);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            echo "Registration successful!";
            header('Location: homepage.html');
            exit;
        } else {
            echo "Failed to insert data.";
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
