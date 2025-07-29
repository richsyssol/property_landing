<?php 
include 'session_check.php';
include 'header.php';
include 'includes/db_conn.php';




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_id = isset($_GET['id']) ? intval($_GET['id']) : 0; // Get project ID from URL

    if ($project_id > 0) {
        $conn->begin_transaction(); // Start transaction for data integrity

        try {
            $uploadDir = "uploads/property/";
            $imagePaths = []; // Array to store image paths

            // Handle multiple property images
            if (!empty($_FILES['property_images']['name'][0])) {
                foreach ($_FILES['property_images']['name'] as $key => $imageName) {
                    $imageTmp = $_FILES['property_images']['tmp_name'][$key];
                    $uniqueName = time() . "_" . basename($imageName);
                    $imagePath = $uploadDir . $uniqueName;

                    if (move_uploaded_file($imageTmp, $imagePath)) {
                        $imagePaths[] = $imagePath; // Store file path in array
                    }
                }
            }

            // Convert image array to JSON
            $imageJSON = json_encode($imagePaths);

            // Handle single display image
            $displayImagePath = "";
            if (!empty($_FILES['display_image']['name'])) {
                $displayImageName = time() . "_" . basename($_FILES['display_image']['name']);
                $displayImagePath = $uploadDir . $displayImageName;
                move_uploaded_file($_FILES['display_image']['tmp_name'], $displayImagePath);
            }

            // Insert into `property_images` table
            $stmt = $conn->prepare("INSERT INTO property_images (project_id, images, display_image) VALUES (?, ?, ?)");
            $stmt->bind_param("iss", $project_id, $imageJSON, $displayImagePath);
            $stmt->execute();
            $stmt->close();

            $conn->commit(); // Commit transaction if successful
            echo "<script>alert('Property images uploaded successfully!'); window.location.href='property.php';</script>";
        } catch (Exception $e) {
            $conn->rollback(); // Rollback on error
            echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
        }

        $conn->close();
    } else {
        echo "<script>alert('Invalid Project ID!'); window.history.back();</script>";
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

    
    <!-- Progress Bar -->
    <div class="progress-container">
        <div class="progress-bar" id="progressBar"></div>
    </div>

    <form action="property-images.php?id=<?= isset($_GET['id']) ? intval($_GET['id']) : 0 ?>" method="POST" enctype="multipart/form-data" id="multiStepForm">
    
        <!-- Step 3: Property Images -->
        <div class="step" id="step3">
            <h3>Property Images :</h3>
            <div class="mb-3">
                <label class="form-label">Property Images :</label>
                <input type="file" class="form-control" name="property_images[]" multiple>
            </div>
            <div class="mb-3">
                <label class="form-label">Display Property Image :</label>
                <input type="file" class="form-control" name="display_image">
            </div>
        </div>

        <!-- Submit Button -->
        <div class="step pt-5">
            <button type="submit" name="submit" class="btn btn-success">Submit</button>
        </div>

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
