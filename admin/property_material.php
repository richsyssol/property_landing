<?php 
include 'session_check.php';
include 'header.php';
include 'includes/db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($project_id > 0) {
        $conn->begin_transaction(); // Start transaction for data integrity

        try {
            // Prepare SQL statement
            $stmt = $conn->prepare("INSERT INTO project_materials (project_id, video_file, btn_name) VALUES (?, ?, ?)");

            if (!$stmt) {
                die("SQL Error: " . $conn->error);
            }

            // Validate YouTube URL
            $youtubeLink = trim($_POST['video_file']);
            $btn_name = trim($_POST['btn_name']) ?? '';

            if (!empty($youtubeLink) && preg_match('/^(https?\:\/\/)?(www\.youtube\.com|youtu\.?be)\/.+$/', $youtubeLink)) {
                // Insert into database
                $stmt->bind_param("iss", $project_id, $youtubeLink, $btn_name);
                $stmt->execute();
            } else {
                throw new Exception("Invalid YouTube URL!");
            }

            $stmt->close();
            $conn->commit(); // Commit transaction if successful
            echo "<script>alert('YouTube video link added successfully!'); window.location.href='property.php';</script>";
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

    <form action="property_material.php?id=<?= isset($_GET['id']) ? intval($_GET['id']) : 0 ?>" method="POST" >
    <div class="container">
        <h3>Upload Project Videos</h3>

        <div id="videoFields" class="mt-3">  
            <div class="mb-3">
                <label class="form-label">Upload YouTube Video URL:</label>
                <input type="text" class="form-control" name="video_file">
            </div>
            <div class="mb-3">
                <label class="form-label">Description (Optional):</label>
                <input type="text" class="form-control" name="btn_name">
            </div>
            
        </div>

        <div class="mt-5">
            <button type="submit" name="submit" class="btn btn-success mt-3">Submit</button>
        </div>
    </div>
</form>




    </div>



</div>



<?php 
include 'footer.php';
?>
