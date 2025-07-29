<?php 
include 'session_check.php';
include 'header.php';
include 'includes/db_conn.php';

if (isset($_POST['submit'])) {
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $title = mysqli_real_escape_string($conn, $_POST['title']); // Prevent SQL injection
    $status = $_POST['status'];
    $property_type = $_POST['property_type'];

    // Ensure upload directory exists 
    $upload_dir = 'uploads/why_us/'; 
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $upload_file = $upload_dir . basename($image);
    
    // Validate file upload
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $file_extension = pathinfo($upload_file, PATHINFO_EXTENSION);

    if (!in_array(strtolower($file_extension), $allowed_extensions)) {
        echo "Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.";
    } elseif ($_FILES['image']['size'] > 5000000) { // 5MB limit
        echo "File size exceeds the limit of 5MB.";
    } elseif (move_uploaded_file($image_tmp, $upload_file)) {
        // Insert into database (removed undefined `$url`)
        $sql = "INSERT INTO `whyus`(`image`, `title`, `status`,`property_type`) VALUES ('$upload_file', '$title', '$status', '$property_type')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<script>window.location.href = "whyus.php";</script>';
            exit();
        } else {
            echo "Database Error: " . mysqli_error($conn);
        }
    } else {
        echo "Failed to upload file.";
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
                    Why Us
                    <div class="page-title-subheading">
                        <a href="index.php">Dashboard</a> /
                        <a href="whyus.php">Why Us</a> /
                        <a href="">Why Us Add</a>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <div class="container">
        <form action="whyus-add.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Image :</label>
                <input type="file" class="form-control" name="image" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Title :</label>
                <input type="text" class="form-control" name="title" placeholder="Enter Title" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Property Type:</label>
                <select class="form-select" name="property_type" required>
                    <option value="commercial">Commercial</option>
                    <option value="residential">Residential</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select class="form-select" name="status" required>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?php 
include 'footer.php';
?>
