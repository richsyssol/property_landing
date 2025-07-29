<?php
ob_start(); // Start output buffering
session_start(); // Start the session

include 'includes/db_conn.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Prepare and execute SQL securely
    $sql = "SELECT id, username, password FROM user WHERE username = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        // Verify password
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['logged_in'] = true;

            header("Location: index.php");
            exit();
        } else {
            $error_message = "Invalid credentials";
        }
        $stmt->close();
    } else {
        $error_message = "Something went wrong. Please try again.";
    }
}
?>

<?php include 'head.php'; // This contains your HTML starting tags ?>

<div class="login-container">
    <?php
    if (isset($_GET['timeout']) && $_GET['timeout'] == 'true') {
        echo "<script>alert('Your session has expired. Please log in again.');</script>";
    }
    if (!empty($error_message)) {
        echo "<script>alert('$error_message');</script>";
    }
    ?>

    <h3 class="text-center">Login</h3>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="email" name="username" class="form-control" placeholder="Enter your email" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="rememberMe">
            <label class="form-check-label" for="rememberMe">Remember me</label>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
    <!-- <p class="text-center mt-3"><a href="#">Forgot password?</a></p> -->
</div>

<?php ob_end_flush(); // Send output after everything is ready ?>
