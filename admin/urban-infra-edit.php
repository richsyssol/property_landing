<?php 
include 'session_check.php';
include 'header.php';
include 'includes/db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($project_id > 0) {
        $conn->begin_transaction();
        try {
            $uploadDir = "uploads/urban_infra/";

            // ✅ Update existing records
            if (!empty($_POST['existing_ids'])) {
                foreach ($_POST['existing_ids'] as $key => $infra_id) {
                    $description = $_POST['existing_descriptions'][$key] ?? '';

                    // ✅ Check if a new image is uploaded for this ID
                    if (!empty($_FILES['existing_images']['name'][$key])) {
                        $imageTmp = $_FILES['existing_images']['tmp_name'][$key];
                        $uniqueName = time() . "_" . basename($_FILES['existing_images']['name'][$key]);
                        $imagePath = $uploadDir . $uniqueName;

                        if (move_uploaded_file($imageTmp, $imagePath)) {
                            // 🔴 Delete the old image
                            $oldImageQuery = $conn->query("SELECT image_path FROM urban_infrastructure WHERE id=$infra_id");
                            $oldImage = $oldImageQuery->fetch_assoc()['image_path'];
                            if (file_exists($oldImage)) {
                                unlink($oldImage);
                            }

                            // ✅ Update with new image and description
                            $stmt = $conn->prepare("UPDATE urban_infrastructure SET image_path=?, description=? WHERE id=? AND project_id=?");
                            $stmt->bind_param("ssii", $imagePath, $description, $infra_id, $project_id);
                        }
                    } else {
                        // ✅ Update only the description if no new image is uploaded
                        $stmt = $conn->prepare("UPDATE urban_infrastructure SET description=? WHERE id=? AND project_id=?");
                        $stmt->bind_param("sii", $description, $infra_id, $project_id);
                    }
                    $stmt->execute();
                    $stmt->close();
                }
            }

            // ✅ Insert new images and descriptions
            if (!empty($_FILES['infra_images']['name'][0])) {
                $stmt = $conn->prepare("INSERT INTO urban_infrastructure (project_id, image_path, description) VALUES (?, ?, ?)");
                foreach ($_FILES['infra_images']['name'] as $key => $imageName) {
                    $imageTmp = $_FILES['infra_images']['tmp_name'][$key];
                    $uniqueName = time() . "_" . basename($imageName);
                    $imagePath = $uploadDir . $uniqueName;

                    if (move_uploaded_file($imageTmp, $imagePath)) {
                        $description = $_POST['infra_descriptions'][$key] ?? '';
                        $stmt->bind_param("iss", $project_id, $imagePath, $description);
                        $stmt->execute();
                    }
                }
                $stmt->close();
            }

            $conn->commit();
            echo "<script>alert('Urban Infrastructure data updated successfully!'); window.location.href='property.php';</script>";
        } catch (Exception $e) {
            $conn->rollback();
            echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
        }
        $conn->close();
    } else {
        echo "<script>alert('Invalid Project ID!'); window.history.back();</script>";
    }
}

$project_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$existing_data = [];
if ($project_id > 0) {
    $result = $conn->query("SELECT id, image_path, description FROM urban_infrastructure WHERE project_id = $project_id");
    while ($row = $result->fetch_assoc()) {
        $existing_data[] = $row;
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

<form action="urban-infra-edit.php?id=<?= $project_id ?>" method="POST" enctype="multipart/form-data">
        <h3>Urban Infrastructure :</h3>
        <div id="dynamicFields">
            <?php foreach ($existing_data as $data) { ?>
                <div class="row mb-2">
                    <input type="hidden" name="existing_ids[]" value="<?= $data['id'] ?>">
                    <div class="col-md-2">
                        <img src="<?= $data['image_path'] ?>" width="50">
                    </div>
                    <div class="col-md-3">
                        <input type="file" name="existing_images[]" class="form-control mt-2">
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="existing_descriptions[]" class="form-control" value="<?= htmlspecialchars($data['description']) ?>" required>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger" onclick="removeField(this)">Remove</button>
                    </div>
                </div>
            <?php } ?>
        </div>

        <button type="button" class="btn btn-info mt-2" onclick="addField()">Add More</button>
        <button type="submit" class="btn btn-success">Submit</button>
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
                <input type="file" name="infra_images[]" class="form-control" required>
            </div>
            <div class="col-md-5">
                <input type="text" name="infra_descriptions[]" class="form-control" placeholder="Enter Description (p)" required>
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
