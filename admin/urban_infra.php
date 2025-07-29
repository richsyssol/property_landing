<?php 
include 'session_check.php';
include 'header.php';
include 'includes/db_conn.php';




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_id = isset($_GET['id']) ? intval($_GET['id']) : 0; // Get project ID from URL

    if ($project_id > 0) {
        $conn->begin_transaction(); // Start transaction for data integrity

        try {
            $uploadDir = "uploads/urban_infra/";

            // Prepare SQL statement to insert data
            $stmt = $conn->prepare("INSERT INTO urban_infrastructure (project_id, image_path, description) VALUES (?, ?, ?)");

            // Handle multiple image uploads
            if (!empty($_FILES['infra_images']['name'][0])) {
                foreach ($_FILES['infra_images']['name'] as $key => $imageName) {
                    $imageTmp = $_FILES['infra_images']['tmp_name'][$key];
                    $uniqueName = time() . "_" . basename($imageName);
                    $imagePath = $uploadDir . $uniqueName;

                    if (move_uploaded_file($imageTmp, $imagePath)) {
                        $description = $_POST['infra_descriptions'][$key] ?? ''; // Get corresponding description
                        
                        // Insert each image and description into the database
                        $stmt->bind_param("iss", $project_id, $imagePath, $description);
                        $stmt->execute();
                    }
                }
            }

            $stmt->close();
            $conn->commit(); // Commit transaction if successful
            echo "<script>alert('Urban Infrastructure data added successfully!'); window.location.href='property.php';</script>";
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

    <form action="urban_infra.php?id=<?= isset($_GET['id']) ? intval($_GET['id']) : 0 ?>" method="POST" enctype="multipart/form-data" id="multiStepForm">
    
    <div class="step" id="step4">
        <h3>Urban Infrastructure :</h3>
        <div id="dynamicFields">
            <div class="row mb-2">
                <div class="col-md-5">
                    <input type="file" name="infra_images[]" class="form-control" required>
                </div>
                <div class="col-md-5">
                    <input type="text" name="infra_descriptions[]" class="form-control" placeholder="Enter Description (p)" required>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger" onclick="removeField(this)">Remove</button>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-info mt-2" onclick="addField()">Add More</button>
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
                <input type="file" name="infra_images[]" class="form-control" required>
            </div>
            <div class="col-md-5">
                <input type="text" name="infra_descriptions[]" class="form-control" placeholder="Enter Description (p)" required>
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
