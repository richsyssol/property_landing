<?php 
include 'session_check.php';
include 'header.php';
include 'includes/db_conn.php';

$id = intval($_GET['id']);

// Fetch existing data securely
$query = "SELECT * FROM `about` WHERE `id` = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $about = $row['about'];
    $about_head = $row['about_head'];
    $existing_image = $row['image']; 
    $existing_mobile_image = $row['mob_image'];
    $property_type = $row['property_type'];
} else {
    echo "<script>alert('About record not found'); window.location.href='about.php';</script>";
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $about = trim($_POST['about']);
    $about_head = trim($_POST['about_head']);
    $property_type = trim($_POST['property_type']);

    // Image Upload Logic
    $upload_dir = 'uploads/about/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Handling Desktop Image Upload
    $new_image = $existing_image; 
    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . "_" . basename($_FILES['image']['name']);
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_path = $upload_dir . $image_name;

        if (move_uploaded_file($image_tmp, $image_path)) {
            $new_image = $image_path;
        } else {
            echo "<script>alert('Image upload failed');</script>";
        }
    }

    // Handling Mobile Image Upload
    $new_mobile_image = $existing_mobile_image; 
    if (!empty($_FILES['mob_image']['name'])) {
        $mob_image_name = time() . "_" . basename($_FILES['mob_image']['name']);
        $mob_image_tmp = $_FILES['mob_image']['tmp_name'];
        $mob_image_path = $upload_dir . $mob_image_name;

        if (move_uploaded_file($mob_image_tmp, $mob_image_path)) {
            $new_mobile_image = $mob_image_path;
        } else {
            echo "<script>alert('Mobile image upload failed');</script>";
        }
    }

    // Validate Required Fields
    if (empty($about) || empty($about_head) || empty($property_type)) {
        echo "<script>alert('Please fill in all required fields');</script>";
    } else {
        // Update database with new images
        $update_query = "UPDATE `about` SET `about` = ?, `about_head` = ?, `image` = ?, `mob_image` = ?, `property_type` = ? WHERE `id` = ?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("sssssi", $about, $about_head, $new_image, $new_mobile_image, $property_type, $id);

        if ($stmt->execute()) {
            echo "<script>alert('Update successful'); window.location.href = 'about.php';</script>";
            exit();
        } else {
            echo "<script>alert('Failed to update: " . mysqli_error($conn) . "');</script>";
        }
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
                    Edit About Chairman
                    <div class="page-title-subheading">
                        <a href="index.php">Dashboard</a> /
                        <a href="about.php">About Chairman</a> /
                        <a href="#">Edit About Chairman</a>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <div class="container">
        <form action="about-edit.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">About Background Image:</label>
                <input type="file" class="form-control" name="image">
                <?php if (!empty($existing_image)): ?>
                    <br>
                    <img src="<?php echo $existing_image; ?>" alt="Current Image" width="200">
                <?php endif; ?>
            </div>
            
            <div class="mb-3">
                <label class="form-label">About mobile Background Image:</label>
                <input type="file" class="form-control" name="mob_image">
                <?php if (!empty($existing_mobile_image)): ?>
                    <br>
                    <img src="<?php echo $existing_mobile_image; ?>" alt="Current Image" width="200">
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label class="form-label">About Heading:</label>
                <input type="text" class="form-control" name="about_head" value="<?php echo $about_head; ?>" required>
            </div>

            
            
            <div class="mb-3">
                <label class="form-label">About Chairman:</label>
                <textarea class="form-control ckeditor" name="about" rows="5" placeholder="enter About Chairman:" id="txtEditor"><?php echo $about; ?></textarea>
                
            </div>

            <div class="mb-3">
                <label class="form-label">Property Type:</label>
                <select class="form-select" name="property_type" required>
                    <option value="commercial" <?php if ($property_type == 'commercial') echo 'selected'; ?>>Commercial</option>
                    <option value="residential" <?php if ($property_type == 'residential') echo 'selected'; ?>>Residential</option>
                </select>
            </div>

            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>



    </div>
</div>

<?php 
include 'footer.php';
?>
