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

// Handle adding and deleting fruits
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $original_price = $_POST['original_price'];
        $image = $_POST['image'];

        $stmt = $conn->prepare("INSERT INTO fruits (name, description, price, original_price, image) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('ssdds', $name, $description, $price, $original_price, $image);
        $stmt->execute();
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $stmt = $conn->prepare("DELETE FROM fruits WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }
}

// Fetch fruits from the database
$fruits = $conn->query("SELECT * FROM fruits");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Fruits</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Admin Panel - Fruits</a>
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
        <h2>Manage Fruits</h2>
        <div class="row">
            <div class="col-md-6">
                <form method="POST">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" step="0.01" id="price" name="price" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="original_price">Original Price:</label>
                        <input type="number" step="0.01" id="original_price" name="original_price" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Image URL:</label>
                        <input type="text" id="image" name="image" class="form-control" required>
                    </div>
                    <button type="submit" name="add" class="btn btn-primary">Add Fruit</button>
                </form>
            </div>
            <div class="col-md-6">
                <h3>Current Fruits</h3>
                <ul class="list-group">
                    <?php while ($row = $fruits->fetch_assoc()): ?>
                        <li class="list-group-item">
                            <img src="<?php echo $row['image']; ?>" width="50" height="50">
                            <strong><?php echo $row['name']; ?></strong> - <?php echo $row['description']; ?>
                            - ₹<?php echo $row['price']; ?> - ₹<?php echo $row['original_price']; ?>
                            <form method="POST" class="float-right">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                            </form>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
