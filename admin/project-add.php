<?php 
include 'session_check.php';
include 'header.php';
include 'includes/db_conn.php';

if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $remark = mysqli_real_escape_string($conn, $_POST['remark']);
    $property_type = mysqli_real_escape_string($conn, $_POST['property_type']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    // Convert `starting_from` to JSON
    if (!empty($_POST['starting_from'])) {
        $starting_from = json_encode(array_map('trim', $_POST['starting_from']));
    } else {
        $starting_from = json_encode([]);
    }

    // Insert project details
    $sql = "INSERT INTO `property_list` (`title`, `description`, `starting_from`, `remark`, `property_type`, `status`) 
            VALUES ('$title', '$description', '$starting_from', '$remark', '$property_type', '$status')";

    if (mysqli_query($conn, $sql)) {
        $property_id = mysqli_insert_id($conn);

        // Handling multiple images
        if (!empty($_FILES['images']['name'][0])) {
            $upload_dir = 'uploads/projects/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true); // Create directory if not exists
            }

            foreach ($_FILES['images']['name'] as $key => $image_name) {
                $image_tmp = $_FILES['images']['tmp_name'][$key];
                $image_path = $upload_dir . basename($image_name);

                if (move_uploaded_file($image_tmp, $image_path)) {
                    $insert_image = "INSERT INTO `property_list_images` (`property_id`, `image_path`) 
                                    VALUES ('$property_id', '$image_path')";
                    if (!mysqli_query($conn, $insert_image)) {
                        echo "Error inserting image: " . mysqli_error($conn);
                    }
                } else {
                    echo "Image upload failed for: " . $image_name . "<br>";
                }
            }
        }

        echo '<script>alert("Project added successfully!"); window.location.href = "project.php";</script>';
    } else {
        echo "Error: " . mysqli_error($conn);
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
                    Project
                    <div class="page-title-subheading">
                        <a href="index.php">Dashboard</a> /
                        <a href="project.php">Project</a> /
                        <a href="">Project Add</a>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <div class="container">
            <form action="project-add.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Images (Select Multiple):</label>
                    <input type="file" class="form-control" name="images[]" multiple required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Title:</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter Title" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Description:</label>
                    <textarea class="form-control" name="description" placeholder="Enter Description" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Starting From (Add Multiple):</label>
                    <div id="list-items">
                        <input type="text" class="form-control mb-2" name="starting_from[]" placeholder="Enter List Item">
                    </div>
                    <button type="button" onclick="addListItem()" class="btn btn-secondary btn-sm">Add More</button>
                </div>

                <div class="mb-3">
                    <label class="form-label">Remark:</label>
                    <input type="text" class="form-control" name="remark" placeholder="Enter Remark" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Property Type:</label>
                    <select class="form-select" name="property_type" required>
                        <option value="commercial">Commercial</option>
                        <option value="residential">Residential</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="status" required>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>



    </div>
</div>


<script>
    function addListItem() {
        let div = document.createElement("div");
        div.innerHTML = '<input type="text" class="form-control mb-2" name="starting_from[]" placeholder="Enter List Item">';
        document.getElementById("list-items").appendChild(div);
    }
</script>

<?php 
include 'footer.php';
?>
