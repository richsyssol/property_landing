<?php 

include 'session_check.php';
include 'header.php';
include 'includes/db_conn.php';

// Check if 'id' is provided in the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM `social_media` WHERE `id` = $id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $instagram = $row['instagram'];
        $facebook = $row['facebook'];
        $linkedin = $row['linkedin'];
        $youtube = $row['youtube'];
        $twitter = $row['twitter'];
        $threat = $row['threat'];
        $property_type = $row['property_type'];
        
    } else {
        echo "<script>alert('social_media not found'); window.location.href='social_media.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Invalid request'); window.location.href='social_media.php';</script>";
    exit();
}

// Handle form submission
if (isset($_POST['update'])) {
    // Sanitize and assign new values from the form
    $instagram = trim(mysqli_real_escape_string($conn, $_POST['instagram']));
    $facebook = trim(mysqli_real_escape_string($conn, $_POST['facebook']));
    $linkedin = trim(mysqli_real_escape_string($conn, $_POST['linkedin']));
    $youtube = trim(mysqli_real_escape_string($conn, $_POST['youtube']));
    $twitter = trim(mysqli_real_escape_string($conn, $_POST['twitter']));
    $threat = trim(mysqli_real_escape_string($conn, $_POST['threat']));
    $property_type = trim(mysqli_real_escape_string($conn, $_POST['property_type']));
    

    // Check if fields are empty
    if (empty($instagram) || empty($facebook)) {
        echo "<script>alert('Please fill in both fields');</script>";
    } else {
        // Update the database with the new data
        $update_query = "UPDATE `social_media` SET `instagram` = '$instagram', `facebook` = '$facebook', `linkedin` = '$linkedin', `youtube` = '$youtube', `twitter` = '$twitter', `threat` = '$threat', `property_type` = '$property_type' WHERE `id` = $id";

        if (mysqli_query($conn, $update_query)) {
            echo '<script>alert("Update successful"); window.location.href = "social_media.php";</script>';
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
                    Edit Social Media
                    <div class="page-title-subheading">
                        <a href="index.php">Dashboard</a> /
                        <a href="social_media.php">Social Media</a> /
                        <a href="#">Edit Social Media</a>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <div class="container">
        <form action="social_media_edit.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Instagram :</label>
                <input type="text" class="form-control" name="instagram" value="<?php echo htmlspecialchars($instagram); ?>" >
            </div>

            <div class="mb-3">
                <label class="form-label">Facebook :</label>
                <input type="text" class="form-control" name="facebook" value="<?php echo htmlspecialchars($facebook); ?>" >
            </div>
            
            <div class="mb-3">
                <label class="form-label">Linkedin :</label>
                <input type="text" class="form-control" name="linkedin" value="<?php echo htmlspecialchars($linkedin); ?>" >
            </div>
            
            <div class="mb-3">
                <label class="form-label">Youtube :</label>
                <input type="text" class="form-control" name="youtube" value="<?php echo htmlspecialchars($youtube); ?>" >
            </div>
            
            <div class="mb-3">
                <label class="form-label">Twitter :</label>
                <input type="text" class="form-control" name="twitter" value="<?php echo htmlspecialchars($twitter); ?>" >
            </div>
            
            <div class="mb-3">
                <label class="form-label">Threat :</label>
                <input type="text" class="form-control" name="threat" value="<?php echo htmlspecialchars($threat); ?>" >
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
