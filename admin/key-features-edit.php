<?php 
include 'session_check.php';
include 'header.php';
include 'includes/db_conn.php';

$project_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($_SERVER["REQUEST_METHOD"] == "POST" && $project_id > 0) {
    $conn->begin_transaction(); // Start transaction

    try {
        // Check if key features already exist
        $stmt = $conn->prepare("SELECT id FROM key_features WHERE project_id = ?");
        $stmt->bind_param("i", $project_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $existingFeatures = [];
        
        while ($row = $result->fetch_assoc()) {
            $existingFeatures[] = $row['id'];
        }

        $stmt->close();

        // Prepare SQL statements
        $updateStmt = $conn->prepare("UPDATE key_features SET icon_html = ?, key_heading = ?, key_describ = ? WHERE id = ?");
        $insertStmt = $conn->prepare("INSERT INTO key_features (project_id, icon_html, key_heading, key_describ) VALUES (?, ?, ?, ?)");

        if (!$updateStmt || !$insertStmt) {
            throw new Exception("SQL Error: " . $conn->error);
        }

        // Process each key feature input
        if (!empty($_POST['icon_html']) && is_array($_POST['icon_html'])) {
            foreach ($_POST['icon_html'] as $key => $icon_html) {
                $icon_html = trim($icon_html);
                $key_heading = isset($_POST['key_heading'][$key]) ? trim($_POST['key_heading'][$key]) : '';
                $key_describ = isset($_POST['key_describ'][$key]) ? trim($_POST['key_describ'][$key]) : '';

                if (!empty($icon_html) && !empty($key_heading) && !empty($key_describ)) {
                    if (!empty($existingFeatures[$key])) {
                        // Update existing record
                        $updateStmt->bind_param("sssi", $icon_html, $key_heading, $key_describ, $existingFeatures[$key]);
                        $updateStmt->execute();
                    } else {
                        // Insert new record
                        $insertStmt->bind_param("isss", $project_id, $icon_html, $key_heading, $key_describ);
                        $insertStmt->execute();
                    }
                }
            }
        } else {
            throw new Exception("Error: No data received.");
        }

        $updateStmt->close();
        $insertStmt->close();
        $conn->commit(); // Commit transaction

        echo "<script>alert('Key Features updated successfully!'); window.location.href='property.php';</script>";
    } catch (Exception $e) {
        $conn->rollback(); // Rollback on error
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }

    $conn->close();
}

// Fetch existing key features for display
$features = [];
if ($project_id > 0) {
    $stmt = $conn->prepare("SELECT id, icon_html, key_heading, key_describ FROM key_features WHERE project_id = ?");
    $stmt->bind_param("i", $project_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $features[] = $row;
    }

    $stmt->close();
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
        <form action="key-features-edit.php?id=<?= $project_id ?>" method="POST" id="multiStepForm">
            <h3>Key Features :</h3>
            <div id="dynamicFields">
                <?php if (!empty($features)): ?>
                    <?php foreach ($features as $index => $feature): ?>
                        <div class="row mb-2">
                            <input type="hidden" name="feature_id[]" value="<?= $feature['id'] ?>">
                            <div class="col-md-4">
                                <label class="form-label">Icon Image:</label>
                                <input type="text" class="form-control" name="icon_html[]" value="<?= htmlspecialchars($feature['icon_html']) ?>" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Heading:</label>
                                <input type="text" class="form-control" name="key_heading[]" value="<?= htmlspecialchars($feature['key_heading']) ?>" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Description:</label>
                                <textarea class="form-control" name="key_describ[]" rows="4" required><?= htmlspecialchars($feature['key_describ']) ?></textarea>
                            </div>
                            <div class="col-md-2 mt-4">
                                <button type="button" class="btn btn-danger" onclick="removeField(this)">Remove</button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
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

<?php include 'footer.php'; ?>
