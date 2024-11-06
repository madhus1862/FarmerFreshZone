<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Admin Panel</a>
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
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Manage Vegetables</div>
                    <div class="card-body">
                        <a href="manage_vegetables.php" class="btn btn-primary">Manage Vegetables</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Manage Fruits</div>
                    <div class="card-body">
                        <a href="manage_fruits.php" class="btn btn-primary">Manage Fruits</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
