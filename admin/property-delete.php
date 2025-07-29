<?php


include 'includes/db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);

    if ($id <= 0) {
        echo json_encode(["status" => "error", "message" => "Invalid project ID."]);
        exit();
    }

    // Delete project (child records are deleted automatically)
    $stmt = $conn->prepare("DELETE FROM projects WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Project deleted successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error deleting project: " . $conn->error]);
    }

    $stmt->close();
    $conn->close();
}
?>
