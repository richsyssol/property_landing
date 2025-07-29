<?php 
include 'session_check.php';
include 'header.php';
include 'includes/db_conn.php';

// Check if 'id' is provided in the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM `web_heading` WHERE `id` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $project_list_name = $row['project_list_name'];
        $whyus_name = $row['whyus_name'];
        $whyinvest_name = $row['whyinvest_name'];
        $contact_form_name = $row['contact_form_name'];
        $property_type = $row['property_type'];
    } else {
        echo "<script>alert('web_heading not found'); window.location.href='web_header.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Invalid request'); window.location.href='web_header.php';</script>";
    exit();
}

// Handle form submission
// Handle form submission
if (isset($_POST['update'])) {
    // Allow HTML content
    $project_list_name = trim($_POST['project_list_name']);
    $whyus_name = trim($_POST['whyus_name']);
    $whyinvest_name = trim($_POST['whyinvest_name']);
    $contact_form_name = trim($_POST['contact_form_name']);
    $property_type = trim($_POST['property_type']);

    // Use prepared statement to prevent SQL injection
    $update_query = "UPDATE `web_heading` 
                    SET `project_list_name` = ?, `whyus_name` = ?, `whyinvest_name` = ?, `contact_form_name` = ?, `property_type` = ? 
                    WHERE `id` = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("sssssi", $project_list_name, $whyus_name, $whyinvest_name, $contact_form_name, $property_type, $id);

    if ($stmt->execute()) {
        echo '<script>alert("Update successful"); window.location.href = "web_header.php";</script>';
        exit();
    } else {
        echo "<script>alert('Failed to update: " . mysqli_error($conn) . "');</script>";
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

    <form action="web_header_edit.php?id=<?= intval($_GET['id'] ?? 0) ?>" method="POST" enctype="multipart/form-data" id="multiStepForm">
    
    <div class="step" id="step5">
        <h3>Project List Section Heading:</h3>
        <div class="mb-3">
            <label class="form-label">Section Name:</label>
            <textarea class="form-control ckeditor" name="project_list_name" placeholder="Enter Description"><?php echo $project_list_name; ?></textarea>
        </div>
    </div>

    <div>
        <h3>Why Us Section Heading:</h3>
        <div class="mb-3">
            <label class="form-label">Section Name:</label>
            <textarea class="form-control ckeditor" name="whyus_name" placeholder="Enter Description"><?php echo $whyus_name ?></textarea>
        </div>
    </div>

    <div>
        <h3>Why Invest In Us Heading:</h3>
        <div class="mb-3">
            <label class="form-label">Section Name:</label>
            <textarea class="form-control ckeditor" name="whyinvest_name" placeholder="Enter Description"> <?php echo $whyinvest_name ?></textarea>
        </div>
    </div>

    <div>
        <h3>Contact Form Heading:</h3>
        <div class="mb-3">
            <label class="form-label">Section Name:</label>
            <textarea class="form-control ckeditor" name="contact_form_name" placeholder="Enter Description"><?php echo $contact_form_name ?></textarea>
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Property Type:</label>
        <select class="form-select" name="property_type" required>
            <option value="commercial" <?php if ($property_type == 'commercial') echo 'selected'; ?>>Commercial</option>
            <option value="residential" <?php if ($property_type == 'residential') echo 'selected'; ?>>Residential</option>
        </select>
    </div>
    
    <div class="step pt-5">
        <button type="submit" name="update" class="btn btn-success">Update</button>
    </div>

</form>




    </div>



</div>




<?php 
include 'footer.php';
?>
