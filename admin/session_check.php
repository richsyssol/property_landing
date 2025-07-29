<?php
// Start session only if it's not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Set session duration (e.g., 5 hours = 18000 seconds)
$session_duration = 18000;

// If user is not logged in, redirect to login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

// Initialize session start time if not already set
if (!isset($_SESSION['session_start'])) {
    $_SESSION['session_start'] = time();
}

// Calculate elapsed time
$elapsed_time = time() - $_SESSION['session_start'];
$remaining_time = $session_duration - $elapsed_time;

// If session has expired
if ($elapsed_time >= $session_duration) {
    session_unset();
    session_destroy();
    header("Location: login.php?timeout=true");
    exit();
}

// If requested via AJAX to fetch time
if (isset($_GET['fetch']) && $_GET['fetch'] === 'time') {
    header('Content-Type: application/json');
    echo json_encode(["remaining_time" => max($remaining_time, 0)]);
    exit();
}
?>
