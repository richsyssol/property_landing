<?php 
include 'session_check.php';
include 'header.php';
include 'includes/db_conn.php';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

$project_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch existing property details
$existing_properties = [];
if ($project_id > 0) {
    $stmt = $conn->prepare("SELECT * FROM property_details WHERE project_id = ?");
    $stmt->bind_param("i", $project_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $existing_properties = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
}

// Handle form submission (Add / Update)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn->begin_transaction(); 

    try {
        foreach ($_POST['prop_title'] as $key => $title) {
            $description = $_POST['prop_description'][$key];
            $prop_id = isset($_POST['prop_id'][$key]) ? intval($_POST['prop_id'][$key]) : 0;

            if (!empty($title) && !empty($description)) {
                if ($prop_id > 0) {
                    // Update existing property
                    $stmt = $conn->prepare("UPDATE property_details SET title = ?, description = ? WHERE id = ?");
                    $stmt->bind_param("ssi", $title, $description, $prop_id);
                } else {
                    // Insert new property
                    $stmt = $conn->prepare("INSERT INTO property_details (project_id, title, description) VALUES (?, ?, ?)");
                    $stmt->bind_param("iss", $project_id, $title, $description);
                }
                $stmt->execute();
                $stmt->close();
            }
        }

        $conn->commit(); 
        echo "<script>alert('Property details updated successfully!'); window.location.href='property.php';</script>";
    } catch (Exception $e) {
        $conn->rollback(); 
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }
    exit();
}
?>

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-home icon-gradient bg-mean-fruit"></i>
                </div>
                <div>
                    Property Details
                    <div class="page-title-subheading">
                        <a href="index.php">Dashboard</a> /
                        <a href="property.php">Property</a> /
                        <a href="#">Property Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <div class="container">
        <form action="property-details-edit.php?id=<?= $project_id ?>" method="POST">
            <div id="dynamicFields">
                <?php if (!empty($existing_properties)) { ?>
                    <?php foreach ($existing_properties as $property) { ?>
                        <div class="row mb-2">
                            <input type="hidden" name="prop_id[]" value="<?= $property['id'] ?>">
                            <div class="col-md-4">
                                <input type="text" name="prop_title[]" class="form-control" value="<?= htmlspecialchars($property['title']) ?>" required>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="prop_description[]" class="form-control" value="<?= htmlspecialchars($property['description']) ?>" required>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>

                <!-- Add New Property Fields -->
                <div class="row mb-2">
                    <input type="hidden" name="prop_id[]" value="0">
                    <div class="col-md-4">
                        <input type="text" name="prop_title[]" class="form-control" placeholder="Enter Title" required>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="prop_description[]" class="form-control" placeholder="Enter Description" required>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger" onclick="removeField(this)">Remove</button>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-info mt-2" onclick="addField()">Add More</button>
            <button type="submit" class="btn btn-success mt-2">Save Changes</button>
        </form>
    </div>
</div>

<script>
    function addField() {
        let container = document.getElementById("dynamicFields");
        let newField = document.createElement("div");
        newField.classList.add("row", "mb-2");

        newField.innerHTML = `
            <input type="hidden" name="prop_id[]" value="0">
            <div class="col-md-4">
                <input type="text" name="prop_title[]" class="form-control" placeholder="Enter Title" required>
            </div>
            <div class="col-md-4">
                <input type="text" name="prop_description[]" class="form-control" placeholder="Enter Description" required>
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

<?php include 'footer.php'; ?>
