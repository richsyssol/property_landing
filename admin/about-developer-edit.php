<?php 
include 'session_check.php';
include 'header.php';
include 'includes/db_conn.php';

$project_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$about_developer_id = null; // Initialize about_developer_id

if ($project_id > 0) {
    // Fetch existing about developer details
    $stmt = $conn->prepare("SELECT * FROM about_developer WHERE project_id = ?");
    $stmt->bind_param("i", $project_id);
    $stmt->execute();
    $developerData = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if ($developerData) {
        $about_developer_id = $developerData['id']; // Get about_developer_id if exists
    }

    // Fetch existing developer projects
    $developerProjects = [];
    $stmt = $conn->prepare("SELECT * FROM about_developer_projects WHERE project_id = ?");
    $stmt->bind_param("i", $project_id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $developerProjects[] = $row;
    }
    $stmt->close();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn->begin_transaction(); // Start transaction

    try {
        // Capture developer details from form
        $dev_head = trim($_POST['dev_head']);
        $dev_describ = trim($_POST['dev_describ']);
        $section_name = trim($_POST['section_name']);
        $section_head = trim($_POST['section_head']);

        if (!empty($developerData)) {
            // Update existing record in about_developer
            $stmt = $conn->prepare("UPDATE about_developer SET dev_head=?, dev_describ=?, section_name=?, section_head=? WHERE project_id=?");
            $stmt->bind_param("ssssi", $dev_head, $dev_describ, $section_name, $section_head, $project_id);
        } else {
            // Insert new record if not found
            $stmt = $conn->prepare("INSERT INTO about_developer (project_id, dev_head, dev_describ, section_name, section_head) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("issss", $project_id, $dev_head, $dev_describ, $section_name, $section_head);
            $stmt->execute();
            $about_developer_id = $stmt->insert_id; // Get newly inserted ID
        }
        $stmt->execute();
        $stmt->close();

        // Ensure about_developer_id is set before inserting projects
        if (empty($about_developer_id)) {
            throw new Exception("Error: Developer details not found.");
        }

        // Handle developer projects
        if (!empty($_POST['dev_title']) && is_array($_POST['dev_title'])) {
            // Remove old projects before inserting new ones
            $stmt = $conn->prepare("DELETE FROM about_developer_projects WHERE project_id = ?");
            $stmt->bind_param("i", $project_id);
            $stmt->execute();
            $stmt->close();

            // Insert new project data
            $stmtProject = $conn->prepare("INSERT INTO about_developer_projects (about_developer_id, project_id, dev_title, dev_description) VALUES (?, ?, ?, ?)");

            foreach ($_POST['dev_title'] as $key => $title) {
                if (!empty($title) && !empty($_POST['dev_description'][$key])) {
                    $description = trim($_POST['dev_description'][$key]);
                    $stmtProject->bind_param("iiss", $about_developer_id, $project_id, $title, $description);
                    $stmtProject->execute();
                }
            }
            $stmtProject->close();
        }

        $conn->commit(); // Commit transaction
        echo "<script>alert('Developer details updated successfully!'); window.location.href='property.php';</script>";
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

  <form action="about-developer-edit.php?id=<?= $project_id ?>" method="POST" enctype="multipart/form-data">
            <h3>Update About Developer:</h3>

            <div class="mb-3">
                <label class="form-label">Section Name :</label>
                <input type="text" class="form-control" name="section_name" value="<?= htmlspecialchars($developerData['section_name'] ?? '') ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Heading :</label>
                <input type="text" class="form-control" name="section_head" value="<?= htmlspecialchars($developerData['section_head'] ?? '') ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Sub Heading :</label>
                <input type="text" class="form-control" name="dev_head" value="<?= htmlspecialchars($developerData['dev_head'] ?? '') ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description :</label>
                <textarea class="form-control" name="dev_describ"><?= htmlspecialchars($developerData['dev_describ'] ?? '') ?></textarea>
            </div>

            <div id="dynamicFields">
                <label class="form-label">Developer Project Count:</label>

                <?php if (!empty($developerProjects)): ?>
                    <?php foreach ($developerProjects as $project): ?>
                        <div class="row mb-2">
                            <div class="col-md-5">
                                <input type="text" name="dev_title[]" class="form-control" value="<?= htmlspecialchars($project['dev_title']) ?>" required>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="dev_description[]" class="form-control" value="<?= htmlspecialchars($project['dev_description']) ?>" required>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger" onclick="removeField(this)">Remove</button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <button type="button" class="btn btn-info mt-2" onclick="addField()">Add More</button>

            <div class="pt-5">
                <button type="submit" name="submit" class="btn btn-success">Update</button>
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
                <input type="text" name="dev_title[]" class="form-control" placeholder="Enter Heading" required>
            </div>
            <div class="col-md-5">
                <input type="text" name="dev_description[]" class="form-control" placeholder="Enter Description" required>
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
