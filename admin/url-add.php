<?php 
include 'session_check.php';
include 'header.php';
include 'includes/db_conn.php';

$uploadDir = "uploads/property/";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'includes/db_conn.php'; // Ensure DB connection

    $name = trim($_POST['name']);
    $developer = trim($_POST['developer']);
    $category = trim($_POST['category']);
    $slug = trim($_POST['slug']); // Get slug input

    // Generate slug from name if it's empty
    if (empty($slug)) {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name), '-'));
    }

    // Define upload directory
    $uploadDir = "uploads/";

    // Initialize image paths
    $imagePath = $logoPath = "";

    // Handle Banner Image Upload
    if (!empty($_FILES['image']['name']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = time() . '_' . basename($_FILES['image']['name']);
        $imagePath = $uploadDir . $image;
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    }

    // Handle Logo Image Upload
    if (!empty($_FILES['logo_img']['name']) && $_FILES['logo_img']['error'] === UPLOAD_ERR_OK) {
        $logo = time() . '_' . basename($_FILES['logo_img']['name']);
        $logoPath = $uploadDir . $logo;
        move_uploaded_file($_FILES['logo_img']['tmp_name'], $logoPath);
    }

    // Ensure at least one image is uploaded
    if (!empty($imagePath) || !empty($logoPath)) {
        $sql = "INSERT INTO projects (name, slug, image, logo_img, developer, category) 
                VALUES (?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Error preparing statement: " . $conn->error);
        }

        $stmt->bind_param("ssssss", $name, $slug, $imagePath, $logoPath, $developer, $category);

        if ($stmt->execute()) {
            echo '<script>window.location.href = "property.php";</script>';
            exit();
        } else {
            echo "Error executing statement: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "<div class='alert alert-danger'>Please upload at least one image.</div>";
    }
}


?>

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-car icon-gradient bg-mean-fruit"></i>
                </div>
                <div>
                    Property
                    <div class="page-title-subheading">
                        <a href="index.php">Dashboard</a> /
                        <a href="property.php">Property</a> /
                        <a href="">Property Add</a>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <div class="container">
        <form method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label class="form-label">Slug Name:</label>
                <input type="text" class="form-control" name="slug" placeholder="Enter Project slug " required>
            </div>

            <div class="mb-3">
                <label class="form-label">Logo Image:</label>
                <input type="file" class="form-control" name="logo_img" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Banner Image:</label>
                <input type="file" class="form-control" name="image" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Project Name:</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Project Name" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Developer Name:</label>
                <input type="text" class="form-control" name="developer" placeholder="Enter Developer Name" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Select Category:</label>
                <select class="form-select" name="category" aria-label="Default select example">
                    <option value="" selected>Select Category</option>
                    <option value="Residential">Residential</option>
                    <option value="Commercial">Commercial</option>
                </select>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?php 
include 'footer.php';
?>
