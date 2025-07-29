<?php 
include 'session_check.php';
include 'header.php';
include 'includes/db_conn.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_id = isset($_GET['id']) ? intval($_GET['id']) : 0; // Get project ID from URL

    if ($project_id > 0) {
        try {
            $conn->begin_transaction(); // Start transaction for data integrity

            // Get form inputs
            $location_head = trim($_POST['location_head']);
            $location_descri = trim($_POST['location_descri']);
            $location_map = trim($_POST['location_map']);
            $section_name = trim($_POST['section_name']);

            // Prepare SQL statement
            $stmt = $conn->prepare("INSERT INTO property_location (project_id, location_head, location_descri, location_map, section_name) VALUES (?, ?, ?, ?, ?)");

            // Debugging: Check if the SQL statement is correct
            if (!$stmt) {
                die("SQL Error: " . $conn->error);
            }

            // Bind parameters and execute
            $stmt->bind_param("issss", $project_id, $location_head, $location_descri, $location_map, $section_name);
            $stmt->execute();
            $stmt->close();

            $conn->commit(); // Commit transaction if successful
            echo "<script>alert('Property location added successfully!'); window.location.href='property.php';</script>";
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

    <form action="property_location.php?id=<?= isset($_GET['id']) ? intval($_GET['id']) : 0 ?>" method="POST" enctype="multipart/form-data" id="multiStepForm">
    
    <!-- Step 1: Property Details -->
    <div class="step" id="step5">
        <h3>Property Location :</h3>

        <div class="mb-3">
            <label class="form-label">Section Name :</label>
            <input type="text" class="form-control" name="section_name">
        </div>

        <div class="mb-3">
            <label class="form-label">Heading :</label>
            <input type="text" class="form-control" name="location_head">
        </div>
        <div class="mb-3">
            <label class="form-label">Description :</label>
            <textarea class="form-control" id="froala-editor" name="location_descri"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Google Map Iframe :</label>
            <input type="text" class="form-control" name="location_map">
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
