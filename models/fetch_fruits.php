<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "ipfarmer";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM fruits";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="container4">
                <div class="greenchilli">
                    <div class="image-container">
                        <img src="' . $row["image"] . '" width="150" height="130">
                    </div>
                    <p id="greenchilli-name">' . $row["name"] . ' </p><br>
                    <p>' . $row["description"] . '</p>
                    <p id="greenchilli"> MRP: ₹' . $row["price"] . '</p>
                    <p id="greenchilli-mrp">MRP: ₹' . $row["original_price"] . '</p>
                    <button id="add-to-cart">Add to Cart</button>
                </div>
            </div>';
    }
} else {
    echo "0 results";
}
$conn->close();
?>
