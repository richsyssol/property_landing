<?php 
include 'session_check.php';
include 'header.php';
include 'includes/db_conn.php';

$project_id = isset($_GET['id']) ? intval($_GET['id']) : 0; // Get project ID from URL

// Fetch existing data
$existingData = [];
if ($project_id > 0) {
    $stmt = $conn->prepare("SELECT * FROM proweb_heading WHERE project_id = ?");
    $stmt->bind_param("i", $project_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $existingData = $result->fetch_assoc();
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($project_id > 0) {
        try {
            $conn->begin_transaction(); // Start transaction for data integrity

            // Get form inputs
            $urban_section_name = trim($_POST['urban_section_name']);
            $urban_head = trim($_POST['urban_head']);
            $urban_sub_head = trim($_POST['urban_sub_head']);
            $plan_section_name = trim($_POST['plan_section_name']);
            $plan_head = trim($_POST['plan_head']);
            $finance_section_name = trim($_POST['finance_section_name']);
            $finance_head = trim($_POST['finance_head']);
            $finance_subhead = trim($_POST['finance_subhead']);
            $pro_section_name = trim($_POST['pro_section_name']);
            $pro_head = trim($_POST['pro_head']);
            $video_section_name = trim($_POST['video_section_name']);
            $video_head = trim($_POST['video_head']);
            $key_section_name = trim($_POST['key_section_name']);
            $key_head = trim($_POST['key_head']);

            // Update existing record
            $stmt = $conn->prepare("UPDATE proweb_heading SET urban_section_name=?, urban_head=?, urban_sub_head=?, plan_section_name=?, plan_head=?, finance_section_name=?, finance_head=?, finance_subhead=?, pro_section_name=?, pro_head=?, video_section_name=?, video_head=?, key_section_name=?, key_head=? WHERE project_id=?");
            $stmt->bind_param("ssssssssssssssi", $urban_section_name, $urban_head, $urban_sub_head, $plan_section_name, $plan_head, $finance_section_name, $finance_head, $finance_subhead, $pro_section_name, $pro_head, $video_section_name, $video_head, $key_section_name, $key_head, $project_id);
            $stmt->execute();
            $stmt->close();

            $conn->commit(); // Commit transaction if successful
            echo "<script>alert('Property location updated successfully!'); window.location.href='property.php';</script>";
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

<form action="heading-edit.php?id=<?= isset($_GET['id']) ? intval($_GET['id']) : 0 ?>" method="POST" enctype="multipart/form-data" id="multiStepForm">
    <div class="step" id="step5">
        <h3>Urban Infrastructure Headings :</h3>
            <label class="form-label">Section Name :</label>
            <input type="text" class="form-control" name="urban_section_name" value="<?= $existingData['urban_section_name'] ?? '' ?>" placeholder="Enter Section Name">
        </div>
        <div class="mb-3">
            <label class="form-label">Heading :</label>
            <input type="text" class="form-control" name="urban_head" value="<?= $existingData['urban_head'] ?? '' ?>" placeholder="Enter Heading">
        </div>
        <div class="mb-3">
            <label class="form-label">Sub Heading :</label>
            <input type="text" class="form-control" name="urban_sub_head" value="<?= $existingData['urban_sub_head'] ?? '' ?>" placeholder="Enter Sub Heading">
        </div>
    
    <div>
        <h3>Plan Heading :</h3>
        <div class="mb-3">
            <label class="form-label">Section Name :</label>
            <input type="text" class="form-control" name="plan_section_name" value="<?= $existingData['plan_section_name'] ?? '' ?>" placeholder="Enter Section Name">
        </div>
        <div class="mb-3">
            <label class="form-label">Heading :</label>
            <input type="text" class="form-control" name="plan_head" value="<?= $existingData['plan_head'] ?? '' ?>" placeholder="Enter Heading">
        </div>
    </div>
    <div>
        <h3>Financial Information Heading :</h3>
        <div class="mb-3">
            <label class="form-label">Section Name :</label>
            <input type="text" class="form-control" name="finance_section_name" value="<?= $existingData['finance_section_name'] ?? '' ?>" placeholder="Enter Section Name">
        </div>
        <div class="mb-3">
            <label class="form-label">Heading :</label>
            <input type="text" class="form-control" name="finance_head" value="<?= $existingData['finance_head'] ?? '' ?>" placeholder="Enter Heading">
        </div>
        <div class="mb-3">
            <label class="form-label">Sub Heading :</label>
            <textarea class="form-control" name="finance_subhead" placeholder="Enter Sub Heading"><?= $existingData['finance_subhead'] ?? '' ?></textarea>
        </div>
    </div>
    <div class="step pt-5">
        <button type="submit" name="submit" class="btn btn-success">Update</button>
    </div>
</form>

</div>
    </div>



</div>




<?php 
include 'footer.php';
?>
