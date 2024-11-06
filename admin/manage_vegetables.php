<?php
session_start();
require __DIR__ . '/config.php'; // Ensure the config.php path is correct

// Redirect if not logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Logout logic
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: /ip/homepage.html");
    exit();
}

// Handle adding vegetables
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];

    $stmt = $conn->prepare("INSERT INTO vegetables (name, description, image_url) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $name, $description, $image_url);
    $stmt->execute();
}

// Fetch vegetables from the database
$vegetables = $conn->query("SELECT * FROM vegetables");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Vegetables</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Admin Panel - Vegetables</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <form method="POST">
                        <button type="submit" name="logout" class="btn btn-outline-light">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        <h2>Manage Vegetables</h2>
        <form method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required class="form-control"><br>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" required class="form-control"></textarea><br>
            </div>
            <div class="form-group">
                <label for="image_url">Image URL:</label>
                <input type="text" name="image_url" id="image_url" required class="form-control"><br>
            </div>
            <button type="submit" name="add" class="btn btn-primary">Add Vegetable</button>
        </form>
        <h3 class="mt-4">Current Vegetables</h3>
        <ul class="list-group">
            <?php while ($row = $vegetables->fetch_assoc()): ?>
                <li class="list-group-item">
                    <img src="<?php echo $row['image_url']; ?>" width="50" height="50">
                    <strong><?php echo $row['name']; ?></strong> - <?php echo $row['description']; ?>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
</body>
</html>
