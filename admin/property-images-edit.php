<?php 
include 'session_check.php';
include 'header.php';
include 'includes/db_conn.php';

$project_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch existing images
$existingImages = [];
$displayImage = "";

if ($project_id > 0) {
    $stmt = $conn->prepare("SELECT images, display_image FROM property_images WHERE project_id = ?");
    $stmt->bind_param("i", $project_id);
    $stmt->execute();
    $stmt->bind_result($imagesJSON, $displayImage);
    $stmt->fetch();
    $stmt->close();

    if (!empty($imagesJSON)) {
        $existingImages = json_decode($imagesJSON, true);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn->begin_transaction(); // Start transaction for safety

    try {
        $uploadDir = "uploads/property/";
        $imagePaths = $existingImages; // Start with existing images

        // **Handle selected images for deletion**
        if (!empty($_POST['delete_images'])) {
            foreach ($_POST['delete_images'] as $deleteImage) {
                if (($key = array_search($deleteImage, $existingImages)) !== false) {
                    unset($existingImages[$key]); // Remove from array
                    unlink($deleteImage); // Delete from folder
                }
            }
        }

        // Handle multiple new property images
        if (!empty($_FILES['property_images']['name'][0])) {
            foreach ($_FILES['property_images']['name'] as $key => $imageName) {
                $imageTmp = $_FILES['property_images']['tmp_name'][$key];
                $uniqueName = time() . "_" . basename($imageName);
                $imagePath = $uploadDir . $uniqueName;

                if (move_uploaded_file($imageTmp, $imagePath)) {
                    $existingImages[] = $imagePath; // Store new image path in array
                }
            }
        }

        // Convert updated image array to JSON
        $imageJSON = json_encode(array_values($existingImages));

        // Handle single display image update
        if (!empty($_FILES['display_image']['name'])) {
            $displayImageName = time() . "_" . basename($_FILES['display_image']['name']);
            $newDisplayImagePath = $uploadDir . $displayImageName;

            if (move_uploaded_file($_FILES['display_image']['tmp_name'], $newDisplayImagePath)) {
                // Delete old display image if it exists
                if (!empty($displayImage) && file_exists($displayImage)) {
                    unlink($displayImage);
                }
                $displayImage = $newDisplayImagePath;
            }
        }

        // Check if project exists in DB
        $stmt = $conn->prepare("SELECT id FROM property_images WHERE project_id = ?");
        $stmt->bind_param("i", $project_id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Update existing record
            $stmt->close();
            $updateStmt = $conn->prepare("UPDATE property_images SET images = ?, display_image = ? WHERE project_id = ?");
            $updateStmt->bind_param("ssi", $imageJSON, $displayImage, $project_id);
            $updateStmt->execute();
            $updateStmt->close();
        } else {
            // Insert new record
            $stmt->close();
            $insertStmt = $conn->prepare("INSERT INTO property_images (project_id, images, display_image) VALUES (?, ?, ?)");
            $insertStmt->bind_param("iss", $project_id, $imageJSON, $displayImage);
            $insertStmt->execute();
            $insertStmt->close();
        }

        $conn->commit(); // Commit transaction if successful
        echo "<script>alert('Property images updated successfully!'); window.location.href='property.php';</script>";
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

        <form action="property-images-edit.php?id=<?= $project_id ?>" method="POST" enctype="multipart/form-data">
            <h3>Property Images :</h3>
            
            <div class="mb-3">
                <label class="form-label">Add New Property Images :</label>
                <input type="file" class="form-control" name="property_images[]" multiple>
            </div>
        
            <h4>Existing Images (Select to Delete)</h4>
            <div class="row">
                <?php if (!empty($existingImages)): ?>
                    <?php foreach ($existingImages as $image): ?>
                        <div class="col-md-3 text-center">
                            <img src="<?= $image ?>" alt="Property Image" class="img-fluid" style="height: 100px;">
                            <br>
                            <input type="checkbox" name="delete_images[]" value="<?= $image ?>"> Delete
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No images uploaded yet.</p>
                <?php endif; ?>
            </div>
        
            <h4>Change Display Image</h4>
            <div>
                <?php if (!empty($displayImage)): ?>
                    <img src="<?= $displayImage ?>" alt="Display Image" class="img-fluid" style="height: 100px;">
                <?php else: ?>
                    <p>No display image uploaded yet.</p>
                <?php endif; ?>
                <br>
                <input type="file" class="form-control mt-2" name="display_image">
            </div>
        
            <!-- Submit Button -->
            <button type="submit" name="submit" class="btn btn-success mt-3">Update</button>
        </form>

    </div>



</div>

<script>
    function addField() {
        let container = document.getElementById("dynamicFields");
        let newField = document.createElement("div");
        newField.classList.add("row", "mb-2");

        newField.innerHTML = `
            <div class="col-md-5">
                <input type="text" name="prop_title[]" class="form-control" placeholder="Enter Title (h4)" required>
            </div>
            <div class="col-md-5">
                <input type="text" name="prop_description[]" class="form-control" placeholder="Enter Description (p)" required>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger" onclick="removeField(this)">Remove</button>
            </div>
        `;
        container.appendChild(newField);
    }

    function removeField(button) {
        button.parentElement.parentElement.remove();
    }
</script>


<?php 
include 'footer.php';
?>
