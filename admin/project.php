<?php 
include 'session_check.php';
include 'header.php';
?>



<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-car icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>
                    Project
                    <div class="page-title-subheading">
                        <a href="index.php">Dashboard</a> /
                        <a href="project.php">Project</a>
                    </div>
                </div>
                
            </div>
            
        </div>
        
    </div> 

    <div>

        <div>
            <a href="project-add.php" class="btn btn-success">Add Project</a>
        </div>

        <table class="table">
        <thead>
            <tr>
                <!-- <th scope="col">#</th> -->
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Starting From</th>
                <th scope="col">Remark</th>
                <th scope="col">Property Type</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
    <?php 
        include 'includes/db_conn.php';
        $query = "SELECT * FROM `property_list` ORDER BY `id` DESC";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <tr>
            <!-- Property Images -->
            <td>
                <?php
                    $images_query = "SELECT `image_path` FROM `property_list_images` WHERE `property_id` = {$row['id']}";
                    $images_result = mysqli_query($conn, $images_query);
                    
                    if (mysqli_num_rows($images_result) > 0) {
                        while ($image = mysqli_fetch_assoc($images_result)) {
                            $image_path = htmlspecialchars($image['image_path']); // Sanitize path
                            
                            // Check if file exists before displaying
                            if (file_exists($image_path)) {
                                echo "<img src='{$image_path}' width='150' style='margin-right:10px;'>";
                            } else {
                                echo "<p class='text-danger'>Image not found</p>";
                            }
                        }
                    } else {
                        echo "<p class='text-muted'>No images</p>";
                    }
                ?>
            </td>
            
            <!-- Property Title -->
            <td><?php echo htmlspecialchars($row['title']); ?></td>

            <!-- Property Description -->
            <td><?php echo nl2br(htmlspecialchars_decode($row['description'])); ?></td>

            <!-- Starting From -->
            <td>
                <?php 
                    $starting_from_list = json_decode($row['starting_from'], true);
                    if (!empty($starting_from_list) && is_array($starting_from_list)) {
                        echo "<p>" . implode(" | ", array_map('htmlspecialchars', $starting_from_list)) . "</p>";
                    } else {
                        echo "<p class='text-muted'>Not available</p>";
                    }
                ?>
            </td>

            <!-- Remark -->
            <td><?php echo htmlspecialchars($row['remark']); ?></td>
            <td><?php echo htmlspecialchars($row['property_type']); ?></td>

            <!-- Status -->
            <td><?php echo htmlspecialchars($row['status']); ?></td>

            <!-- Actions (Edit/Delete) -->
            <td>
                <a href="#" data-id="<?php echo $row['id']; ?>" class="deleteBtn text-danger">
                    <i class="fa-solid fa-trash"></i>
                </a>
                &nbsp; / &nbsp;
                <a href="project-edit.php?id=<?php echo $row['id']; ?>" class="text-primary">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
            </td>
        </tr>
    <?php 
        }
    ?>
</tbody>

        </table>

        

    </div>
    

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $(".deleteBtn").click(function(e) {
        e.preventDefault();
        var property_id  = $(this).data("id");

        if (confirm("Are you sure you want to delete this project? This action cannot be undone.")) {
            $.ajax({
                type: "POST",
                url: "project-delete.php",
                data: { property_id : property_id  },
                success: function(response) {
                    if (response == "success") {
                        alert("Project deleted successfully!");
                        location.reload();
                    } else {
                        alert("Error deleting project. Try again.");
                    }
                }
            });
        }
    });
});
</script>





<?php 
include 'footer.php';
?>