<?php
// Include database connection
require __DIR__ . '/../includes/configs/db.php';

header('Content-Type: application/json');

try {
    // Example: Fetch data from a 'users' table
    $query = "SELECT id, username, email FROM users LIMIT 5";
    $result = $conn->query($query);

    if (!$result) {
        throw new Exception("Query failed: " . $conn->error);
    }

    $users = [];
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }

    // Return JSON response
    echo json_encode([
        'status' => 'success',
        'data' => $users
    ]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}

$conn->close(); // Close connection
?>