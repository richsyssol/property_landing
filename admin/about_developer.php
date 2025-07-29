<?php 
include 'session_check.php';
include 'header.php';
include 'includes/db_conn.php';




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($project_id > 0) {
        $conn->begin_transaction(); // Start transaction for data integrity

        try {
            // Capture main developer details
            $dev_head = trim($_POST['dev_head']);
            $dev_describ = trim($_POST['dev_describ']);
            $section_name = trim($_POST['section_name']);
            $section_head = trim($_POST['section_head']);

            // Insert main developer details
            $stmt = $conn->prepare("INSERT INTO about_developer (project_id, dev_head, dev_describ, section_name, section_head) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("issss", $project_id, $dev_head, $dev_describ, $section_name, $section_head);
            $stmt->execute();
            $about_developer_id = $stmt->insert_id; // Get inserted developer ID
            $stmt->close();

            // Prepare statement for multiple developer projects
            $stmtProject = $conn->prepare("INSERT INTO about_developer_projects (about_developer_id, project_id, dev_title, dev_description) VALUES (?, ?, ?, ?)");

            if (!empty($_POST['dev_title']) && is_array($_POST['dev_title'])) {
                foreach ($_POST['dev_title'] as $key => $title) {
                    if (!empty($title) && !empty($_POST['dev_description'][$key])) {
                        $description = trim($_POST['dev_description'][$key]);

                        // Insert each developer project count
                        $stmtProject->bind_param("iiss", $about_developer_id, $project_id, $title, $description);
                        $stmtProject->execute();
                    }
                }
            }

            $stmtProject->close();
            $conn->commit(); // Commit transaction if successful
            echo "<script>alert('Developer details added successfully!'); window.location.href='property.php';</script>";
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

    <form action="about_developer.php?id=<?= isset($_GET['id']) ? intval($_GET['id']) : 0 ?>" method="POST" enctype="multipart/form-data" id="multiStepForm">
    
    <div class="step" id="step7">
        <h3>About Developer :</h3>

        <div class="mb-3">
            <label class="form-label">Section Name :</label>
            <input type="text" class="form-control" name="section_name" placeholder="Enter Section Name" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Heading :</label>
            <input type="text" class="form-control" name="section_head" placeholder="Enter Heading" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Sub Heading :</label>
            <input type="text" class="form-control" name="dev_head" placeholder="Enter Sub Heading" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Description :</label>
            <textarea class="form-control" id="froala-editor" name="dev_describ" placeholder="Enter Description"></textarea>
        </div>

        <div id="dynamicFields">
            <div class="row mb-2">
                <label class="form-label">Developer project count :</label>

                <div class="col-md-5">
                    <input type="text" name="dev_title[]" class="form-control" placeholder="Enter Heading">
                </div>
                <div class="col-md-5">
                    <input type="text" name="dev_description[]" class="form-control" placeholder="Enter Description">
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
                <input type="text" name="dev_title[]" class="form-control" placeholder="Enter Heading">
            </div>
            <div class="col-md-5">
                <input type="text" name="dev_description[]" class="form-control" placeholder="Enter Description">
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
