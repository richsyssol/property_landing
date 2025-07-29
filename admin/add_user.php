<?php
include 'includes/db_conn.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash password

    // Insert user into the database
    $sql = "INSERT INTO user (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo "Registration successful. <a href='login.php'>Login here</a>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <form method="post" class="p-4 border rounded">
        <h3>Register</h3>
        <input type="text" name="username" class="form-control mb-2" placeholder="username" required>
        <input type="password" name="password" class="form-control mb-2" placeholder="password" required>
        <button type="submit" class="btn btn-primary w-100">Register</button>
    </form>
</body>
</html>
