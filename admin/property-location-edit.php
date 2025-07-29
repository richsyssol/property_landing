<?php 
include 'session_check.php';
include 'header.php';
include 'includes/db_conn.php';

$project_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$section_name = $location_head = $location_descri = $location_map = "";

// Fetch existing data if available
if ($project_id > 0) {
    $query = $conn->prepare("SELECT section_name, location_head, location_descri, location_map FROM property_location WHERE project_id = ?");
    if ($query) {
        $query->bind_param("i", $project_id);
        $query->execute();
        $result = $query->get_result();
        if ($row = $result->fetch_assoc()) {
            $section_name = $row['section_name'];
            $location_head = $row['location_head'];
            $location_descri = $row['location_descri'];
            $location_map = $row['location_map'];
        }
        $query->close();
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($project_id > 0) {
        try {
            $conn->begin_transaction();

            // Get form inputs
            $section_name = trim($_POST['section_name']);
            $location_head = trim($_POST['location_head']);
            $location_descri = trim($_POST['location_descri']);
            $location_map = trim($_POST['location_map']);

            // Check if data already exists
            $check_query = $conn->prepare("SELECT COUNT(*) FROM property_location WHERE project_id = ?");
            $check_query->bind_param("i", $project_id);
            $check_query->execute();
            $check_query->bind_result($count);
            $check_query->fetch();
            $check_query->close();

            if ($count > 0) {
                // Update existing record
                $stmt = $conn->prepare("UPDATE property_location SET section_name=?, location_head=?, location_descri=?, location_map=? WHERE project_id=?");
            } else {
                // Insert new record
                $stmt = $conn->prepare("INSERT INTO property_location (section_name, location_head, location_descri, location_map, project_id) VALUES (?, ?, ?, ?, ?)");
            }

            if ($stmt) {
                $stmt->bind_param("ssssi", $section_name, $location_head, $location_descri, $location_map, $project_id);
                $stmt->execute();
                $stmt->close();
                $conn->commit();
                echo "<script>alert('Property location saved successfully!'); window.location.href='property.php';</script>";
            }
        } catch (Exception $e) {
            $conn->rollback();
            echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
        }
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

    <form action="property-location-edit.php?id=<?= isset($_GET['id']) ? intval($_GET['id']) : 0 ?>" method="POST" enctype="multipart/form-data" id="multiStepForm">
    
    <!-- Step 1: Property Details -->
    <div class="step" id="step5">
        <h3>Property Location :</h3>

        <div class="mb-3">
            <label class="form-label">Section Name :</label>
            <input type="text" class="form-control" name="section_name" value="<?= htmlspecialchars($section_name) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Heading :</label>
            <input type="text" class="form-control" name="location_head" value="<?= htmlspecialchars($location_head) ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Description :</label>
            <textarea class="form-control" id="froala-editor" name="location_descri"><?= htmlspecialchars($location_descri) ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Google Map Iframe :</label>
            <input type="text" class="form-control" name="location_map" value="<?= htmlspecialchars($location_map) ?>">
        </div>
    </div>
    <!-- Submit Button -->
    <div class="step pt-5">
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </div>

</form>



    </div>



</div>



<?php 
include 'footer.php';
?>
