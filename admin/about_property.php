<?php 
include 'session_check.php';
include 'header.php';
include 'includes/db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_id = isset($_GET['id']) ? intval($_GET['id']) : 0; // Get project ID from URL

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
            $brochure = '';
            if (isset($_FILES['brochure']) && $_FILES['brochure']['error'] === 0) {
                $uploadDir = 'uploads/brochures/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true); // Create folder if not exists
                }

                $fileName = time() . '_' . basename($_FILES['brochure']['name']);
                $targetFile = $uploadDir . $fileName;

                if (move_uploaded_file($_FILES['brochure']['tmp_name'], $targetFile)) {
                    $brochure = $targetFile; // Save only filename in DB
                } else {
                    throw new Exception("Failed to upload brochure image.");
                }
            }

            // Insert into database
            $stmt = $conn->prepare("INSERT INTO about_property 
                (project_id, prop_name, about_title, about_description, discount_line, prop_launching, about_sub_description, maha_rera_no, brochure) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $stmt->bind_param("issssssss", $project_id, $prop_name, $about_title, $about_description, $discount_line, $prop_launching, $about_sub_description, $maha_rera_no, $brochure);
            
            $stmt->execute();

            $conn->commit(); // Commit transaction
            echo "<script>alert('Property details added successfully!'); window.location.href='property.php';</script>";
        } catch (Exception $e) {
            $conn->rollback(); // Rollback on failure
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
        <form action="about_property.php?id=<?= isset($_GET['id']) ? intval($_GET['id']) : 0 ?>" method="POST" enctype="multipart/form-data">
    
        <h3>About Property :</h3>
        <div class="mb-3">
            <label class="form-label">Property Name :</label>
            <input type="text" class="form-control" name="prop_name" placeholder="Enter Property Name">
        </div>

        <div class="mb-3">
            <label class="form-label">Property Title :</label>
            <input type="text" class="form-control" name="about_title" placeholder="Enter Property Name">
        </div>

        <div class="mb-3">
            <label class="form-label">Property Launching Line :</label>
            <input type="text" class="form-control" name="prop_launching" placeholder="Enter Property Name">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Property Sub Title :</label>
            <input type="text" class="form-control" name="about_description" placeholder="Enter Property Sub Title">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Property sub Description :</label>
            <textarea class="form-control ckeditor" name="about_sub_description"></textarea>
        </div>

        
        <div class="mb-3">
            <label class="form-label">Maha RERA NO :</label>
            <input type="text" class="form-control" name="maha_rera_no" placeholder="Enter Maha RERA NO">
        </div>
        
        <div class="mb-3">
                <label class="form-label">Property QR:</label>
                <input type="file" class="form-control" name="brochure" required>
            </div>

        <div class="mb-3">
            <label class="form-label">Heading Line :</label>
            <input type="text" class="form-control" name="discount_line" placeholder="Enter Discount Line">
        </div>

        <!-- Submit Button -->
        <button type="submit" name="submit" class="btn btn-success">Submit</button>

        </form>
    </div>
</div>

<?php include 'footer.php'; ?>
