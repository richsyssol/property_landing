<?php 
include 'session_check.php';
include 'header.php';
include 'includes/db_conn.php';

// Check if 'id' is provided in the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM `banner` WHERE `id` = $id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $existing_image = $row['image'];
        $existing_phone_img = $row['phone_img']; // Store existing phone image
        $title = $row['title'];
        $status = $row['status'];
        $property_type = $row['property_type'];
    } else {
        echo "<script>alert('Banner not found'); window.location.href='banner.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Invalid request'); window.location.href='banner.php';</script>";
    exit();
}

// Handle form submission
if (isset($_POST['update'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $property_type = mysqli_real_escape_string($conn, $_POST['property_type']);
    
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    $phone_img = $_FILES['phone_img']['name'];
    $phone_img_tmp = $_FILES['phone_img']['tmp_name'];

    // Upload directory
    $upload_dir = 'uploads/banner/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Initialize update query
    $update_query = "UPDATE `banner` SET `title` = '$title', `status` = '$status', `property_type` = '$property_type'";

    // Process main banner image upload
    if (!empty($image)) {
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $file_extension = strtolower(pathinfo($image, PATHINFO_EXTENSION));

        if (!in_array($file_extension, $allowed_extensions)) {
            echo "<script>alert('Invalid file type for Banner Image. Only JPG, JPEG, PNG, GIF, and WEBP allowed.');</script>";
        } elseif ($_FILES['image']['size'] > 5000000) { // 5MB limit
            echo "<script>alert('File size exceeds the limit of 5MB for Banner Image.');</script>";
        } else {
            $image_path = $upload_dir . basename($image);
            move_uploaded_file($image_tmp, $image_path);
            $update_query .= ", `image` = '$image_path'";
        }
    }

    // Process phone banner image upload
    if (!empty($phone_img)) {
        $phone_ext = strtolower(pathinfo($phone_img, PATHINFO_EXTENSION));

        if (!in_array($phone_ext, $allowed_extensions)) {
            echo "<script>alert('Invalid file type for Phone Image. Only JPG, JPEG, PNG, GIF, and WEBP allowed.');</script>";
        } elseif ($_FILES['phone_img']['size'] > 5000000) { // 5MB limit
            echo "<script>alert('File size exceeds the limit of 5MB for Phone Image.');</script>";
        } else {
            $phone_path = $upload_dir . basename($phone_img);
            move_uploaded_file($phone_img_tmp, $phone_path);
            $update_query .= ", `phone_img` = '$phone_path'";
        }
    }

    // Finalize query
    $update_query .= " WHERE `id` = $id";

    $update_result = mysqli_query($conn, $update_query);

    if ($update_result) {
        echo '<script>window.location.href = "banner.php";</script>';
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
                    Edit Banner
                    <div class="page-title-subheading">
                        <a href="index.php">Dashboard</a> /
                        <a href="banner.php">Banner</a> /
                        <a href="#">Edit Banner</a>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Current Banner Image:</label><br>
        <img src="<?php echo htmlspecialchars($existing_image); ?>" alt="Banner Image" width="150">
    </div>

    <div class="mb-3">
        <label class="form-label">Change Banner Image (optional):</label>
        <input type="file" class="form-control" name="image">
    </div>
    
    <div class="mb-3">
        <label class="form-label">Current Phone Image:</label><br>
        <img src="<?php echo htmlspecialchars($existing_phone_img); ?>" alt="Phone Image" width="150">
    </div>

    <div class="mb-3">
        <label class="form-label">Change Phone Image (optional):</label>
        <input type="file" class="form-control" name="phone_img">
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
        <label class="form-label">Status:</label>
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
