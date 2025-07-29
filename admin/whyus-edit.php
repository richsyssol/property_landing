<?php 
include 'session_check.php';
include 'header.php';
include 'includes/db_conn.php';

// Check if 'id' is provided in the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM `whyus` WHERE `id` = $id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $existing_image = $row['image'];
        $title = $row['title'];
        $status = $row['status'];
        $property_type = $row['property_type'];
    } else {
        echo "<script>alert('whyus not found'); window.location.href='whyus.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Invalid request'); window.location.href='whyus.php';</script>";
    exit();
}

// Handle form submission
if (isset($_POST['update'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $status = $_POST['status'];
    $property_type = $_POST['property_type'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    
    // Upload directory
    $upload_dir = 'uploads/why_us/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    if (!empty($image)) {
        // Validate file type and size
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $file_extension = pathinfo($image, PATHINFO_EXTENSION);

        if (!in_array(strtolower($file_extension), $allowed_extensions)) {
            echo "Invalid file type. Only JPG, JPEG, PNG, and GIF allowed.";
        } elseif ($_FILES['image']['size'] > 5000000) { // 5MB limit
            echo "File size exceeds the limit of 5MB.";
        } else {
            // Move uploaded file and update database
            $upload_file = $upload_dir . basename($image);
            move_uploaded_file($image_tmp, $upload_file);

            // Update database with new image
            $update_query = "UPDATE `whyus` SET `image` = '$upload_file', `title` = '$title', `status` = '$status', property_type = '$property_type' WHERE `id` = $id";
        }
    } else {
        // Update database without changing the image
        $update_query = "UPDATE `whyus` SET `title` = '$title', `status` = '$status', property_type = '$property_type' WHERE `id` = $id";
    }

    $update_result = mysqli_query($conn, $update_query);
    
    if ($update_result) {
        echo '<script>window.location.href = "whyus.php";</script>';
        exit();
    } else {
        echo "Failed: " . mysqli_error($conn);
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
                    Edit Why Us
                    <div class="page-title-subheading">
                        <a href="index.php">Dashboard</a> /
                        <a href="whyus.php">Why Us</a> /
                        <a href="#">Edit Why Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Current Image:</label><br>
                <img src="<?php echo $existing_image; ?>" alt="whyus Image" width="150">
            </div>

            <div class="mb-3">
                <label class="form-label">Change Image (optional):</label>
                <input type="file" class="form-control" name="image">
            </div>

            <div class="mb-3">
                <label class="form-label">Title:</label>
                <input type="text" class="form-control" name="title" value="<?php echo htmlspecialchars($title); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Property Type:</label>
                <select class="form-select" name="property_type" required>
                    <option value="commercial" <?php if ($property_type == 'commercial') echo 'selected'; ?>>Commercial</option>
                    <option value="residential" <?php if ($property_type == 'residential') echo 'selected'; ?>>Residential</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select class="form-select" name="status" required>
                    <option value="Active" <?php if ($status == 'Active') echo 'selected'; ?>>Active</option>
                    <option value="Inactive" <?php if ($status == 'Inactive') echo 'selected'; ?>>Inactive</option>
                </select>
            </div>

            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

<?php 
include 'footer.php';
?>
