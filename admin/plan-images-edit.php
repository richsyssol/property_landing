<?php 
include 'session_check.php';
include 'header.php';
include 'includes/db_conn.php';

$project_id = isset($_GET['id']) ? intval($_GET['id']) : 0; // Get project ID from URL

// Fetch existing images
$existing_images = [];
if ($project_id > 0) {
    $stmt = $conn->prepare("SELECT id, image_path FROM plan_images WHERE project_id = ?");
    $stmt->bind_param("i", $project_id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $existing_images[] = $row;
    }
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn->begin_transaction(); // Start transaction

    try {
        $uploadDir = "uploads/plan_images/";

        // Handle image deletion
        if (!empty($_POST['delete_images'])) {
            foreach ($_POST['delete_images'] as $image_id) {
                $stmt = $conn->prepare("SELECT image_path FROM plan_images WHERE id = ?");
                $stmt->bind_param("i", $image_id);
                $stmt->execute();
                $stmt->bind_result($imagePath);
                $stmt->fetch();
                $stmt->close();

                if ($imagePath && file_exists($imagePath)) {
                    unlink($imagePath); // Delete file
                }

                // Delete from database
                $stmt = $conn->prepare("DELETE FROM plan_images WHERE id = ?");
                $stmt->bind_param("i", $image_id);
                $stmt->execute();
                $stmt->close();
            }
        }

        // Handle new image uploads
        if (!empty($_FILES['plan_image']['name'][0])) {
            $stmt = $conn->prepare("INSERT INTO plan_images (project_id, image_path) VALUES (?, ?)");

            foreach ($_FILES['plan_image']['name'] as $key => $imageName) {
                $imageTmp = $_FILES['plan_image']['tmp_name'][$key];
                $uniqueName = time() . "_" . basename($imageName);
                $imagePath = $uploadDir . $uniqueName;

                if (move_uploaded_file($imageTmp, $imagePath)) {
                    $stmt->bind_param("is", $project_id, $imagePath);
                    $stmt->execute();
                }
            }
            $stmt->close();
        }

        $conn->commit(); // Commit transaction
        echo "<script>alert('Plan Images updated successfully!'); window.location.href='property.php';</script>";
    } catch (Exception $e) {
        $conn->rollback(); // Rollback on error
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }

    $conn->close();
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

    
    <!-- Progress Bar -->
    <div class="progress-container">
        <div class="progress-bar" id="progressBar"></div>
    </div>

    <form action="plan-images-edit.php?id=<?= $project_id ?>" method="POST" enctype="multipart/form-data">
        <h3>Update Plans Image:</h3>
    
        <!-- Display existing images with delete checkboxes -->
        <?php if (!empty($existing_images)): ?>
            <div class="mb-3">
                <label class="form-label">Existing Images:</label>
                <div class="d-flex flex-wrap">
                    <?php foreach ($existing_images as $image): ?>
                        <div class="image-box" style="margin: 10px; text-align: center;">
                            <img src="<?= $image['image_path'] ?>" alt="Plan Image" width="100" height="100">
                            <br>
                            <input type="checkbox" name="delete_images[]" value="<?= $image['id'] ?>"> Delete
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php else: ?>
            <p>No images uploaded yet.</p>
        <?php endif; ?>
    
        <!-- Upload new images -->
        <div class="mb-3">
            <label class="form-label">Upload New Plans Images:</label>
            <input type="file" class="form-control" name="plan_image[]" multiple>
        </div>
    
        <!-- Submit Button -->
        <button type="submit" name="submit" class="btn btn-success">Update</button>
    </form>






    </div>



</div>




<?php 
include 'footer.php';
?>
