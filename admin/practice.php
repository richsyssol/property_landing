<?php
include 'includes/db_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $slug = strtolower(str_replace(" ", "-", trim($name))); // Generate slug safely
    $description = $_POST['description'];
    $location = $_POST['location'];
    $price = $_POST['price'];

    // Upload Image
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        // Insert into database
        $sql = "INSERT INTO projects (name, slug, description, location, price, image)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $name, $slug, $description, $location, $price, $image);

        if ($stmt->execute()) {
            echo "Project added successfully! <a href='/Property/admin/practice_web.php?slug=$slug'>View Landing Page</a>";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Failed to upload image.";
    }
}
?>

<!-- Admin Form -->
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Project Name" required>
    <textarea name="description" placeholder="Project Description"></textarea>
    <input type="text" name="location" placeholder="Location" required>
    <input type="number" name="price" placeholder="Price" required>
    <input type="file" name="image" required>
    <button type="submit">Create Landing Page</button>
</form>


<?php
include 'includes/db_conn.php';

// Fetch all projects
$sql = "SELECT name, slug FROM projects";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Project List</title>
</head>
<body>
    <h1>All Projects</h1>
    <ul>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<li><a target='_blank' href='/Property/admin/practice_web.php?slug=" . htmlspecialchars($row['slug']) . "'>" . htmlspecialchars($row['name']) . "</a></li>";
            }
        } else {
            echo "<p>No projects found.</p>";
        }
        ?>
    </ul>
</body>
</html>
<a href="" target="_blank"></a>