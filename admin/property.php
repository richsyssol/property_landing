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
                    Property
                    <div class="page-title-subheading">
                        <a href="index.php">Dashboard</a> /
                        <a href="property.php">Property</a>
                    </div>
                </div>
                
            </div>
            
        </div>
        
    </div> 

    <div>

        <div>
            <a href="url-add.php" class="btn btn-success">Add Slug</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Logo Image</th>
                <th scope="col">Banner Image</th>
                <th scope="col">Banner Image(mob view)</th>
                <th scope="col">Property Name</th>
                <th scope="col">Developer Name</th>
                <th scope="col">Category</th>
                <th scope="col">Slug</th>
                <th scope="col">Links</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include 'includes/db_conn.php';
                $sql = "SELECT * FROM `projects`";
                $result = mysqli_query($conn , $sql);
                if(mysqli_num_rows($result) > 0) {
                    $serial_number = 1; // Initialize serial number
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $serial_number++; ?></th>
                        <td>
                            <img src="<?php echo htmlspecialchars($row['logo_img']); ?>" 
                                alt="Logo Image" 
                                style="width: 50px; height: 50px;">
                        </td>
                        <td>
                            <img src="<?php echo htmlspecialchars($row['image']); ?>" 
                                alt="Banner Image" 
                                style="width: 50px; height: 50px;">
                        </td>
                        <td>
                            <img src="<?php echo htmlspecialchars($row['mobile_image']); ?>" 
                                alt="Banner Image" 
                                style="width: 50px; height: 50px;">
                        </td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['developer']); ?></td>
                        <td><?php echo htmlspecialchars($row['category']); ?></td>
                        <td><?php echo htmlspecialchars($row['slug']); ?></td>
                        <td>
                            <a target="_blank" href="https://property.roongtagroup.co.in/<?php echo htmlspecialchars($row['slug']); ?>">
                                <?php echo htmlspecialchars($row['slug']); ?>
                            </a>
                        </td>
                        
                        
                        <td>
                            
                            <div>
                                <div>
                                    <a href="#" data-id="<?php echo $row['id']; ?>" class="deleteBtn text-decoration-none text-dark">
                                        <i class="fa-solid fa-trash"></i> Delete Property
                                    </a>
                                </div>
        
                                
                                 <div>
                                     <a href="property-edit.php?id=<?php echo $row['id']; ?>" class="text-decoration-none text-dark">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit Property
                                    </a>
                                 </div>
                                 
                                <div class="dropdown">
                                    <a class=" dropdown-toggle text-decoration-none text-dark" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-square-plus"></i> Add Property Data
                                    </a>
    
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item" href="heading.php?id=<?php echo $row['id']; ?>">All Section Heading</a></li>
                                        <li><a class="dropdown-item" href="property-details.php?id=<?php echo $row['id']; ?>&action=add_more">Add Property Details</a></li>
                                        <li><a class="dropdown-item" href="about_property.php?id=<?php echo $row['id']; ?>">Add About Property</a></li>
                                        <li><a class="dropdown-item" href="property-images.php?id=<?php echo $row['id']; ?>">Property Images</a></li>
                                        <li><a class="dropdown-item" href="urban_infra.php?id=<?php echo $row['id']; ?>">Urban Infrastructure</a></li>
                                        <li><a class="dropdown-item" href="property_location.php?id=<?php echo $row['id']; ?>">Property Location</a></li>
                                        <!--<li><a class="dropdown-item" href="gov_details.php?id=<?php //echo $row['id']; ?>">Gov QR</a></li>-->
                                        <li><a class="dropdown-item" href="plan_images.php?id=<?php echo $row['id']; ?>">Stages Image</a></li>
                                        <li><a class="dropdown-item" href="about_developer.php?id=<?php echo $row['id']; ?>">About Developer</a></li>
                                        <li><a class="dropdown-item" href="property_material.php?id=<?php echo $row['id']; ?>">Project Video</a></li>
                                        <li><a class="dropdown-item" href="key_features.php?id=<?php echo $row['id']; ?>">Key Features</a></li>
                                        <li><a class="dropdown-item" href="contact_details.php?id=<?php echo $row['id']; ?>">Contact Details</a></li>
                                        <li><a class="dropdown-item" href="form-section.php?id=<?php echo $row['id']; ?>">Form Section</a></li>
                                        
                                    </ul>
                                </div>
                                
                                 
                                
                                <div class="dropdown">
                                    <a class=" dropdown-toggle text-decoration-none text-dark" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-pen-to-square"></i> Update Property Data
                                    </a>
    
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item" href="heading-edit.php?id=<?php echo $row['id']; ?>">All Section Heading</a></li>
                                        <li><a class="dropdown-item" href="property-details-edit.php?id=<?php echo $row['id']; ?>">Add Property Details</a></li>
                                        <li><a class="dropdown-item" href="about-property-edit.php?id=<?php echo $row['id']; ?>">Add About Property</a></li>
                                        <li><a class="dropdown-item" href="property-images-edit.php?id=<?php echo $row['id']; ?>">Property Images</a></li>
                                        <li><a class="dropdown-item" href="urban-infra-edit.php?id=<?php echo $row['id']; ?>">Urban Infrastructure</a></li>
                                        <li><a class="dropdown-item" href="property-location-edit.php?id=<?php echo $row['id']; ?>">Property Location</a></li>
                                        <!--<li><a class="dropdown-item" href="gov_details-edit.php?id=<?php //echo $row['id']; ?>">Gov QR</a></li>-->
                                        <li><a class="dropdown-item" href="plan-images-edit.php?id=<?php echo $row['id']; ?>">Stages Image</a></li>
                                        <li><a class="dropdown-item" href="about-developer-edit.php?id=<?php echo $row['id']; ?>">About Developer</a></li>
                                        <li><a class="dropdown-item" href="property-material-edit.php?id=<?php echo $row['id']; ?>">Project Video</a></li>
                                        <li><a class="dropdown-item" href="key-features-edit.php?id=<?php echo $row['id']; ?>">Key Features</a></li>
                                        <!--<li><a class="dropdown-item" href="contact-details-edit.php?id=<?php //echo $row['id']; ?>">Contact Details</a></li>-->
                                        <!--<li><a class="dropdown-item" href="form-section-edit.php?id=<?php //echo $row['id']; ?>">Form Section</a></li>-->
                                        
                                    </ul>
                                </div>
                            </div>

                        </td>
                    </tr>   
                <?php 
                    }
                } else {
                    echo "<tr><td colspan='6'>No records found</td></tr>";
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
        var id = $(this).data("id");

        if (confirm("Are you sure you want to delete this project? This action cannot be undone.")) {
            $.ajax({
                type: "POST",
                url: "property-delete.php",
                data: { id: id },
                dataType: "json",
                success: function(response) {
                    if (response.status === "success") {
                        alert(response.message);
                        location.reload(); // Refresh page after deletion
                    } else {
                        alert("Error: " + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    alert("AJAX error: " + error);
                }
            });
        }
    });
});
</script>





<?php 
include 'footer.php';
?>

