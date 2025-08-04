<?php 
include 'session_check.php';
include 'header.php';
include 'includes/db_conn.php';

$uploadDir = "uploads/property/";

// Fetch existing project data for editing
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM projects WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $project = $result->fetch_assoc();
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $name = trim($_POST['name']);
    $developer = trim($_POST['developer']);
    $category = trim($_POST['category']);
    $slug = trim($_POST['slug']);

    if (empty($slug)) {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name), '-'));
    }

    // Initialize image paths
    $imagePath = $project['image'];
    $logoPath = $project['logo_img'];
    $mobileimagepath = $project['mobile_image'];

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
    
    // Handle mbile view Image Upload
    if (!empty($_FILES['mobile_image']['name']) && $_FILES['mobile_image']['error'] === UPLOAD_ERR_OK) {
        $mobimagepath = time() . '_' . basename($_FILES['mobile_image']['name']);
        $mobileimagepath = $uploadDir . $mobimagepath;
        move_uploaded_file($_FILES['mobile_image']['tmp_name'], $mobileimagepath);
    }

    // Update project details
    $sql = "UPDATE projects SET name=?, slug=?, image=?, logo_img=?, mobile_image=?, developer=?, category=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("sssssssi", $name, $slug, $imagePath, $logoPath, $mobileimagepath, $developer, $category, $id);

    if ($stmt->execute()) {
        echo '<script>window.location.href = "property.php";</script>';
        exit();
    } else {
        echo "Error executing statement: " . $stmt->error;
    }

    $stmt->close();
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
            <input type="hidden" name="id" value="<?php echo $project['id']; ?>">
        
            <div class="mb-3">
                <label class="form-label">Slug Name:</label>
                <input type="text" class="form-control" name="slug" value="<?php echo $project['slug']; ?>" required>
            </div>
        
            <div class="mb-3">
                <label class="form-label">Logo Image:</label>
                <input type="file" class="form-control" name="logo_img">
                <img src="<?php echo $project['logo_img']; ?>" width="100" alt="Logo">
            </div>
        
            <div class="mb-3">
                <label class="form-label">Banner Image:</label>
                <input type="file" class="form-control" name="image">
                <img src="<?php echo $project['image']; ?>" width="100" alt="Banner">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Banner Image (for mobile image):</label>
                <input type="file" class="form-control" name="mobile_image">
                <img src="<?php echo $project['mobile_image']; ?>" width="100" alt="Banner">
            </div>
        
            <div class="mb-3">
                <label class="form-label">Project Name:</label>
                <input type="text" class="form-control" name="name" value="<?php echo $project['name']; ?>" required>
            </div>
        
            <div class="mb-3">
                <label class="form-label">Developer Name:</label>
                <input type="text" class="form-control" name="developer" value="<?php echo $project['developer']; ?>" required>
            </div>
        
            <div class="mb-3">
                <label class="form-label">Select Category:</label>
                <select class="form-select" name="category" required>
                    <option value="Residential" <?php echo ($project['category'] == 'Residential') ? 'selected' : ''; ?>>Residential</option>
                    <option value="Commercial" <?php echo ($project['category'] == 'Commercial') ? 'selected' : ''; ?>>Commercial</option>
                </select>
            </div>
        
            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

<?php 
include 'footer.php';
?>
