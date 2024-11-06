<!DOCTYPE html>
<html>
<head>
    <title>FARMERS FRESH ZONE</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main">
        <h1>LOGIN</h1>
        <h3>Enter your login credentials</h3>
        <form action="server.php" method="POST">
            <label for="Mobilenumber">Phone Number:</label>
            <input type="text" id="Mobilenumber" name="Mobilenumber" placeholder="Enter your phone number" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your Password" required>
            <div class="wrap">
                <button type="submit" onclick="solve()">Submit</button>
            </div>
        </form>
        <p>Not registered? 
              <a href="#"  style="text-decoration: none;">Create an account</a>
        </p>
    </div>
</body>

</html>