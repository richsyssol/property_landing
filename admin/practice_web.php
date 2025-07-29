<?php
include 'includes/db_conn.php';

if (!isset($_GET['slug']) || empty($_GET['slug'])) {
    die("404 - Project Not Found");
}

$slug = $_GET['slug'];

// Prepare SQL statement
$sql = "SELECT * FROM projects WHERE slug = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $slug);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $project = $result->fetch_assoc();
} else {
    die("404 - Project Not Found");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($project['name']); ?></title>
</head>
<body>
    <h1><?php echo htmlspecialchars($project['name']); ?></h1>
    <img src="uploads/<?php echo htmlspecialchars($project['image']); ?>" width="400px">
    <p><?php echo nl2br(htmlspecialchars($project['description'])); ?></p>
    <p>Location: <?php echo htmlspecialchars($project['location']); ?></p>
    <p>Price: ₹<?php echo number_format($project['price'], 2); ?></p>
</body>
</html>
