<?php 
include 'session_check.php';
include 'header.php';
include 'includes/db_conn.php';

if (isset($_GET['id'])) {
    $property_id = $_GET['id'];
    
    // Fetch project details
    $query = "SELECT * FROM property_list WHERE id='$property_id'";
    $result = mysqli_query($conn, $query);
    $property_list = mysqli_fetch_assoc($result);

    // Fetch associated images
    $image_query = "SELECT * FROM property_list_images WHERE property_id='$property_id'";
    $image_result = mysqli_query($conn, $image_query);
    $images = [];
    while ($row = mysqli_fetch_assoc($image_result)) {
        $images[] = $row;
    }
} else {
    echo "property_list not found!";
    exit;
}

if (isset($_POST['update'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $remark = mysqli_real_escape_string($conn, $_POST['remark']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $property_type = mysqli_real_escape_string($conn, $_POST['property_type']);

    // Convert `starting_from` to JSON
    if (!empty($_POST['starting_from'])) {
        $starting_from = json_encode(array_map('trim', $_POST['starting_from']));
    } else {
        $starting_from = json_encode([]);
    }

    // **Update property_list Data**
    $update_query = "UPDATE property_list SET title='$title', description='$description', starting_from='$starting_from', remark='$remark', status='$status', property_type='$property_type' WHERE id='$property_id'";
    if (mysqli_query($conn, $update_query)) {

        // **Handle Image Deletion**
        if (!empty($_POST['delete_images'])) {
            foreach ($_POST['delete_images'] as $image_id) {
                // Fetch image path
                $img_query = "SELECT image_path FROM property_list_images WHERE id='$image_id'";
                $img_result = mysqli_query($conn, $img_query);
                $img_row = mysqli_fetch_assoc($img_result);
                $image_path = $img_row['image_path'];

                // Delete from database
                mysqli_query($conn, "DELETE FROM property_list_images WHERE id='$image_id'");

                // Delete from folder
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
        }

        // **Handle New Image Uploads**
        if (!empty($_FILES['images']['name'][0])) {
            $upload_dir = 'uploads/projects/';
            foreach ($_FILES['images']['name'] as $key => $image_name) {
                $image_tmp = $_FILES['images']['tmp_name'][$key];
                $image_path = $upload_dir . basename($image_name);

                if (move_uploaded_file($image_tmp, $image_path)) {
                    mysqli_query($conn, "INSERT INTO property_list_images (property_id, image_path) VALUES ('$property_id', '$image_path')");
                }
            }
        }

        echo '<script>alert("Project updated successfully!"); window.location.href = "project.php";</script>';
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
        <form action="project-edit.php?id=<?php echo $property_id; ?>" method="post" enctype="multipart/form-data">
        
            <div class="mb-3">
                <label class="form-label">Existing Images:</label>
                <div>
                    <?php foreach ($images as $img) { ?>
                        <div class="d-flex align-items-center">
                            <img src="<?php echo $img['image_path']; ?>" alt="Project Image" width="100">
                            <input type="checkbox" name="delete_images[]" value="<?php echo $img['id']; ?>"> Delete
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Upload New Images:</label>
                <input type="file" class="form-control" name="images[]" multiple>
            </div>

            <div class="mb-3">
                <label class="form-label">Title:</label>
                <input type="text" class="form-control" name="title" value="<?php echo $property_list['title']; ?>" required>
            </div>

           
            
            <div class="mb-3">
                <label class="form-label">Description:</label>
                <textarea class="form-control ckeditor" name="description" rows="5" placeholder="enter description:" id="txtEditor"><?php echo $property_list['description']; ?></textarea>
                
            </div>

            <div class="mb-3">
                <label class="form-label">Starting From:</label>
                <div id="list-items">
                    <?php 
                    $starting_from = json_decode($property_list['starting_from'], true);
                    foreach ($starting_from as $item) { ?>
                        <input type="text" class="form-control mb-2" name="starting_from[]" value="<?php echo $item; ?>">
                    <?php } ?>
                </div>
                <button type="button" onclick="addListItem()" class="btn btn-secondary btn-sm">Add More</button>
            </div>

            <div class="mb-3">
                <label class="form-label">Remark:</label>
                <input type="text" class="form-control" name="remark" value="<?php echo $property_list['remark']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Property Type:</label>
                <select class="form-select" name="property_type" required>
                    <option value="commercial" <?php if ($property_list['property_type'] == 'commercial') echo 'selected'; ?>>Commercial</option>
                    <option value="residential" <?php if ($property_list['property_type'] == 'residential') echo 'selected'; ?>>Residential</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Status:</label>
                <select class="form-select" name="status" required>
                    <option value="Active" <?php if ($property_list['status'] == 'Active') echo 'selected'; ?>>Active</option>
                    <option value="Inactive" <?php if ($property_list['status'] == 'Inactive') echo 'selected'; ?>>Inactive</option>
                </select>
            </div>

            

            <button type="submit" name="update" class="btn btn-primary">Update Project</button>
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
