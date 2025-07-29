<?php 
include 'session_check.php';
include 'header.php';
include 'includes/db_conn.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($project_id > 0) {
        $conn->begin_transaction(); // Start transaction for data integrity

        try {
            // Prepare SQL statement
            $stmt = $conn->prepare("INSERT INTO key_features (project_id, icon_html, key_heading, key_describ) VALUES (?, ?, ?, ?)");

            if (!$stmt) {
                die("SQL Error: " . $conn->error); // Debugging SQL errors
            }

            // Loop through each key feature input
            if (!empty($_POST['icon_html']) && is_array($_POST['icon_html'])) {
                foreach ($_POST['icon_html'] as $key => $icon_html) {
                    $icon_html = trim($icon_html); // Trim spaces
                    $key_heading = isset($_POST['key_heading'][$key]) ? trim($_POST['key_heading'][$key]) : '';
                    $key_describ = isset($_POST['key_describ'][$key]) ? trim($_POST['key_describ'][$key]) : '';

                    if (!empty($icon_html) && !empty($key_heading) && !empty($key_describ)) {
                        // Insert into database
                        $stmt->bind_param("isss", $project_id, $icon_html, $key_heading, $key_describ);
                        if (!$stmt->execute()) {
                            die("Execution Error: " . $stmt->error); // Debug execution errors
                        }
                    } else {
                        die("Error: Empty field detected.");
                    }
                }
            } else {
                die("Error: No data received.");
            }

            $stmt->close();
            $conn->commit(); // Commit transaction if successful
            echo "<script>alert('Key Features added successfully!'); window.location.href='property.php';</script>";
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

    <form action="key_features.php?id=<?= isset($_GET['id']) ? intval($_GET['id']) : 0 ?>" method="POST" enctype="multipart/form-data" id="multiStepForm">
    
    <div class="step" id="step9">
        <h3>Key Features :</h3>
        <div id="dynamicFields">
            <div class="row mb-2">
                <div class="col-md-4">
                    <label class="form-label">Icon Image:</label>
                    <input type="text" class="form-control" name="icon_html[]" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Heading:</label>
                    <input type="text" class="form-control" name="key_heading[]" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Description:</label>
                    <textarea class="form-control" name="key_describ[]" rows="4" required></textarea>
                </div>
                <div class="col-md-2 mt-4">
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
    var container = document.getElementById("dynamicFields");
    var newRow = document.createElement("div");
    newRow.classList.add("row", "mb-2");

    newRow.innerHTML = `
        <div class="col-md-4">
            <label class="form-label">Icon Image:</label>
            <input type="text" class="form-control" name="icon_html[]" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Heading:</label>
            <input type="text" class="form-control" name="key_heading[]" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Description:</label>
            <textarea class="form-control" name="key_describ[]" rows="4" required></textarea>
        </div>
        <div class="col-md-2 mt-4">
            <button type="button" class="btn btn-danger" onclick="removeField(this)">Remove</button>
        </div>
    `;

    container.appendChild(newRow);
}

function removeField(button) {
    button.closest(".row").remove();
}
</script>



<?php 
include 'footer.php';
?>
