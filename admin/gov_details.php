<?php 
include 'session_check.php';
include 'header.php';
include 'includes/db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_id = isset($_GET['id']) ? intval($_GET['id']) : 0; // Get project ID from URL

    if ($project_id > 0) {
        $conn->begin_transaction(); // Start transaction for data integrity

        try {
            // Prepare data
            $heading = $_POST['heading'];
            $gov_link = $_POST['gov_link'];
            $maha_rera_no = $_POST['maha_rera_no'];

            // Handle file uploads
            $uploadDir = "uploads/gov_details/";
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            
            $qr_img_path = "";
            if (!empty($_FILES['qr_img']['name'])) {
                $qr_img_name = time() . "_" . basename($_FILES['qr_img']['name']);
                $qr_img_path = $uploadDir . $qr_img_name;
                move_uploaded_file($_FILES['qr_img']['tmp_name'], $qr_img_path);
            }
            
            $gov_logo_path = "";
            if (!empty($_FILES['gov_logo']['name'])) {
                $gov_logo_name = time() . "_" . basename($_FILES['gov_logo']['name']);
                $gov_logo_path = $uploadDir . $gov_logo_name;
                move_uploaded_file($_FILES['gov_logo']['tmp_name'], $gov_logo_path);
            }

            // Insert into `gov_details`
            $stmt = $conn->prepare("INSERT INTO gov_details (project_id, heading, qr_img, gov_logo, gov_link, maha_rera_no) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("isssss", $project_id, $heading, $qr_img_path, $gov_logo_path, $gov_link, $maha_rera_no);

            $stmt->execute();
            $conn->commit(); // Commit transaction if everything is successful

            echo "<script>alert('Government details added successfully!'); window.location.href='property.php';</script>";
        } catch (Exception $e) {
            $conn->rollback(); // Rollback on error
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
                    Gov Details QR
                    <div class="page-title-subheading">
                        <a href="index.php">Dashboard</a> /
                        <a href="property.php">Property</a> /
                        <a href="">Gov Details QR</a>
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

    <form action="gov_details.php?id=<?= isset($_GET['id']) ? intval($_GET['id']) : 0 ?>" method="POST" enctype="multipart/form-data" id="multiStepForm">
    
    <!-- Step 2: About Property -->
    <div class="step" id="step2">
        <h3>Gov Details QR :</h3>
        <div class="mb-3">
            <label class="form-label">Heading :</label>
            <input type="text" class="form-control" name="heading" placeholder="Enter Heading">
        </div>
        
        <div class="mb-3">
            <label class="form-label">QR Image :</label>
            <input type="file" class="form-control" name="qr_img">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Gov Logo Image :</label>
            <input type="file" class="form-control" name="gov_logo">
        </div>

        <div class="mb-3">
            <label class="form-label">Gov Link :</label>
            <input type="text" class="form-control" name="gov_link" placeholder="Enter Gov Link">
        </div>

        <div class="mb-3">
            <label class="form-label">Maha RERA NO :</label>
            <input type="text" class="form-control" name="maha_rera_no" placeholder="Enter Maha RERA NO">
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
                <input type="text" name="prop_datails[]" class="form-control" placeholder="Enter Title (h4)" required>
            </div>
            <div class="col-md-5">
                <input type="text" name="prop_details_describ[]" class="form-control" placeholder="Enter Description (p)" required>
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
