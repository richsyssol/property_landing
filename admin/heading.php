<?php 
include 'session_check.php';
include 'header.php';
include 'includes/db_conn.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_id = isset($_GET['id']) ? intval($_GET['id']) : 0; // Get project ID from URL

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

            // Prepare SQL statement
            $stmt = $conn->prepare("INSERT INTO proweb_heading (project_id, urban_section_name, urban_head, urban_sub_head, plan_section_name, plan_head, finance_section_name, finance_head, finance_subhead, pro_section_name, pro_head, video_section_name, video_head, key_section_name, key_head) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            // Debugging: Check if the SQL statement is correct
            if (!$stmt) {
                die("SQL Error: " . $conn->error);
            }

            // Bind parameters and execute
            $stmt->bind_param("issssssssssssss", $project_id, $urban_section_name, $urban_head, $urban_sub_head, $plan_section_name, $plan_head, $finance_section_name, $finance_head, $finance_subhead, $pro_section_name, $pro_head, $video_section_name, $video_head, $key_section_name, $key_head);
            $stmt->execute();
            $stmt->close();

            $conn->commit(); // Commit transaction if successful
            echo "<script>alert('Property location added successfully!'); window.location.href='property.php';</script>";
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

    <form action="heading.php?id=<?= isset($_GET['id']) ? intval($_GET['id']) : 0 ?>" method="POST" enctype="multipart/form-data" id="multiStepForm">
    
    <!-- Step 1: Property Details -->
    <div class="step" id="step5">
        <h3>Urban Infrastructure Headings :</h3>

        <div class="mb-3">
            <label class="form-label">Section Name :</label>
            <input type="text" class="form-control" name="urban_section_name" placeholder="Enter Section Name">
        </div>

        <div class="mb-3">
            <label class="form-label">Heading :</label>
            <input type="text" class="form-control" name="urban_head" placeholder="Enter Heading">
        </div>
        <div class="mb-3">
            <label class="form-label">Sub Heading :</label>
            <input type="text" class="form-control" name="urban_sub_head" placeholder="Enter Sub Heading">
        </div>
        
    </div>

    <div>
        <h3>Plan Heading :</h3>

        <div class="mb-3">
            <label class="form-label">Section Name :</label>
            <input type="text" class="form-control" name="plan_section_name" placeholder="Enter Section Name">
        </div>

        <div class="mb-3">
            <label class="form-label">Heading :</label>
            <input type="text" class="form-control" name="plan_head" placeholder="Enter Heading">
        </div>
    </div>

    <div>
        <h3>Financial Information Heading :</h3>

        <div class="mb-3">
            <label class="form-label">Section Name :</label>
            <input type="text" class="form-control" name="finance_section_name" placeholder="Enter Section Name">
        </div>

        <div class="mb-3">
            <label class="form-label">Heading :</label>
            <input type="text" class="form-control" name="finance_head" placeholder="Enter Heading">
        </div>

        <div class="mb-3">
            <label class="form-label">Sub Heading :</label>
            <textarea class="form-control" id="froala-editor" name="finance_subhead" placeholder="Enter Sub Heading"></textarea>
        </div>
    </div>

    <div>
        <h3>More Projects Heading :</h3>

        <div class="mb-3">
            <label class="form-label">Section Name :</label>
            <input type="text" class="form-control" name="pro_section_name" placeholder="Enter Section Name">
        </div>

        <div class="mb-3">
            <label class="form-label">Heading :</label>
            <input type="text" class="form-control" name="pro_head" placeholder="Enter Heading">
        </div>
    </div>

    <div>
        <h3>Property video Heading :</h3>

        <div class="mb-3">
            <label class="form-label">Section Name :</label>
            <input type="text" class="form-control" name="video_section_name" placeholder="Enter Section Name">
        </div>

        <div class="mb-3">
            <label class="form-label">Heading :</label>
            <input type="text" class="form-control" name="video_head" placeholder="Enter Heading">
        </div>
    </div>

    <div>
        <h3>Key features Heading :</h3>

        <div class="mb-3">
            <label class="form-label">Section Name :</label>
            <input type="text" class="form-control" name="key_section_name" placeholder="Enter Section Name">
        </div>

        <div class="mb-3">
            <label class="form-label">Heading :</label>
            <input type="text" class="form-control" name="key_head" placeholder="Enter Heading">
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
