<?php 
include 'session_check.php';
include 'header.php';
include 'includes/db_conn.php';

$project_id = isset($_GET['id']) ? intval($_GET['id']) : 0; // Get project ID from URL

// Fetch existing data
$existingData = null;
if ($project_id > 0) {
    $query = "SELECT * FROM about_property WHERE project_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $project_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $existingData = $result->fetch_assoc();
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($project_id > 0) {
        $conn->begin_transaction(); // Start transaction for data integrity
        try {
            // Prepare form data
            $prop_name = $_POST['prop_name'];
            $about_title = $_POST['about_title'];
            $about_description = $_POST['about_description'];
            $discount_line = $_POST['discount_line'];
            $prop_launching = $_POST['prop_launching'];
            $about_sub_description = $_POST['about_sub_description'];
            $maha_rera_no = $_POST['maha_rera_no'];

            // Handle brochure upload
            $brochure = $existingData['brochure'] ?? ''; // default to existing if no new file
            if (isset($_FILES['brochure']) && $_FILES['brochure']['error'] === 0) {
                $uploadDir = 'uploads/brochures/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }

                $fileName = time() . '_' . basename($_FILES['brochure']['name']);
                $targetFile = $uploadDir . $fileName;

                if (move_uploaded_file($_FILES['brochure']['tmp_name'], $targetFile)) {
                    $brochure = $targetFile; // Store full path
                } else {
                    throw new Exception("Failed to upload brochure image.");
                }
            }

            if ($existingData) {
                // Update existing entry
                $stmt = $conn->prepare("UPDATE about_property SET prop_name=?, about_title=?, about_description=?, discount_line=?, prop_launching=?, about_sub_description=?, maha_rera_no=?, brochure=? WHERE project_id=?");
                $stmt->bind_param("ssssssssi", $prop_name, $about_title, $about_description, $discount_line, $prop_launching, $about_sub_description, $maha_rera_no, $brochure, $project_id);
            } else {
                // Insert new entry
                $stmt = $conn->prepare("INSERT INTO about_property (project_id, prop_name, about_title, about_description, discount_line, prop_launching, about_sub_description, maha_rera_no, brochure) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("issssssss", $project_id, $prop_name, $about_title, $about_description, $discount_line, $prop_launching, $about_sub_description, $maha_rera_no, $brochure);
            }

            $stmt->execute();
            $conn->commit(); // Commit transaction
            echo "<script>alert('Property details updated successfully!'); window.location.href='property.php';</script>";
        } catch (Exception $e) {
            $conn->rollback();
            echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
        }

        $stmt->close();
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
        <form action="about-property-edit.php?id=<?= $project_id ?>" method="POST" enctype="multipart/form-data">
            <h3>About Property :</h3>
            <div class="mb-3">
                <label class="form-label">Property Name :</label>
                <input type="text" class="form-control" name="prop_name" value="<?= $existingData['prop_name'] ?? '' ?>" required>
            </div>
        
            <div class="mb-3">
                <label class="form-label">Property Title :</label>
                <input type="text" class="form-control" name="about_title" value="<?= $existingData['about_title'] ?? '' ?>" required>
            </div>
        
            <div class="mb-3">
                <label class="form-label">Property Launching Line :</label>
                <input type="text" class="form-control" name="prop_launching" value="<?= $existingData['prop_launching'] ?? '' ?>">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Property Sub Title :</label>
                <input type="text" class="form-control" name="about_description" value="<?= $existingData['about_description'] ?? '' ?>">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Property sub Description :</label>
                <textarea class="form-control ckeditor" name="about_sub_description"><?= $existingData['about_sub_description'] ?? '' ?></textarea>
            </div>
        
            
            <div class="mb-3">
                <label class="form-label">Maha RERA NO :</label>
                <input type="text" class="form-control" name="maha_rera_no" value="<?= $existingData['maha_rera_no'] ?? '' ?>">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Property QR (Brochure Image):</label>
                <input type="file" class="form-control" name="brochure" accept="image/*">
                <?php if (!empty($existingData['brochure'])): ?>
                    <img src="<?php echo $existingData['brochure']; ?>" alt="Current QR" style="width:100px; margin-top:10px;">
                <?php endif; ?>
            </div>
        
            <div class="mb-3">
                <label class="form-label">Heading Line :</label>
                <input type="text" class="form-control" name="discount_line" value="<?= $existingData['discount_line'] ?? '' ?>">
            </div>
        
            <button type="submit" class="btn btn-success">Submit</button>
            </form>
    </div>
</div>

<?php include 'footer.php'; ?>
