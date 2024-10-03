<?php
// Include database connection
include('credentials.php');

// Handle registration form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password for security

    // Prepare SQL to insert the user
    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        echo "Registration successful!";
        // Optionally, redirect to login page or start session
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #eef2f7; }
        .register-container { width: 300px; margin: 0 auto; padding: 20px; background-color: #fff; border: 1px solid #ccc; border-radius: 10px; margin-top: 100px; box-shadow: 0px 4px 8px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #444; }
        label { display: block; margin-top: 10px; color: #777; }
        input { width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px; }
        button { width: 100%; padding: 10px; margin-top: 20px; background-color: #007bff; color: white; border: none; cursor: pointer; border-radius: 5px; }
        button:hover { background-color: #0056b3; }
        p { text-align: center; margin-top: 20px; color: #555; }
        a { color: #007bff; text-decoration: none; }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>
        <form action="register.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>

            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Please Login Here</a></p>
    </div>
</body>
</html>
