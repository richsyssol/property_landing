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
                    Why Invest
                    <div class="page-title-subheading">
                        <a href="index.php">Dashboard</a> /
                        <a href="whyinvest.php">Why Invest</a>
                    </div>
                </div>
                
            </div>
            
        </div>
        
    </div> 

    <div>

        <div>
            <a href="whyinvest-add.php" class="btn btn-success">Add Why Invest</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Property Type</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include 'includes/db_conn.php';
                    $sql = "SELECT * FROM `whyinvest`";
                    $result = mysqli_query($conn , $sql);
                    if(mysqli_num_rows($result) > 0) {
                        $serial_number = 1; // Initialize serial number
                    while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                        <tr>
                            <th scope="row"><?php echo $serial_number++; ?></th>
                            <td><img src="<?php echo $row['image']; ?>" alt="Banner Image" style="width: 50px; height: 50px;"></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['property_type']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td>
                                <a href="#" data-id="<?php echo $row['id']; ?>" class="deleteBtn">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                &nbsp; / &nbsp;
                                <a href="whyinvest-edit.php?id=<?php echo $row['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                        </tr>
                    <?php 
                    }
                    } else {
                        echo "<tr><td colspan='5'>No records found</td></tr>";
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
                url: "whyinvest-delete.php",
                data: { id: id },
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