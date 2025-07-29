<?php 
include 'session_check.php';
include 'header.php';
include 'includes/db_conn.php';

$project_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$videoData = null;

if ($project_id > 0) {
    // Fetch existing video details
    $stmt = $conn->prepare("SELECT * FROM project_materials WHERE project_id = ?");
    $stmt->bind_param("i", $project_id);
    $stmt->execute();
    $videoData = $stmt->get_result()->fetch_assoc();
    $stmt->close();
}

// Handle form submission for updating video
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($project_id > 0) {
        $conn->begin_transaction(); // Start transaction

        try {
            $youtubeLink = trim($_POST['video_file']);
            $btn_name = trim($_POST['btn_name']) ?? '';

            if (!empty($youtubeLink) && preg_match('/^(https?\:\/\/)?(www\.youtube\.com|youtu\.?be)\/.+$/', $youtubeLink)) {
                if ($videoData) {
                    // Update existing record
                    $stmt = $conn->prepare("UPDATE project_materials SET video_file = ?, btn_name = ? WHERE project_id = ?");
                    $stmt->bind_param("ssi", $youtubeLink, $btn_name, $project_id);
                } else {
                    // Insert new record if not found
                    $stmt = $conn->prepare("INSERT INTO project_materials (project_id, video_file, btn_name) VALUES (?, ?, ?)");
                    $stmt->bind_param("iss", $project_id, $youtubeLink, $btn_name);
                }
                
                $stmt->execute();
                $stmt->close();

                $conn->commit(); // Commit transaction
                echo "<script>alert('YouTube video link updated successfully!'); window.location.href='property.php';</script>";
            } else {
                throw new Exception("Invalid YouTube URL!");
            }
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

<form action="property-material-edit.php?id=<?= isset($_GET['id']) ? intval($_GET['id']) : 0 ?>" method="POST">
        <div id="videoFields" class="mt-3">  
            <div class="mb-3">
                <label class="form-label">YouTube Video URL:</label>
                <input type="text" class="form-control" name="video_file" value="<?= htmlspecialchars($videoData['video_file'] ?? '') ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description (Optional):</label>
                <input type="text" class="form-control" name="btn_name" value="<?= htmlspecialchars($videoData['btn_name'] ?? '') ?>">
            </div>
        </div>

        <div class="mt-5">
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </div>
    </form>



    </div>



</div>



<?php 
include 'footer.php';
?>
