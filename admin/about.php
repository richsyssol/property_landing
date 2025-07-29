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
                    About CHAIRMAN 
                    <div class="page-title-subheading">
                        <a href="index.php">Dashboard</a> /
                        <a href="about.php">About CHAIRMAN </a>
                    </div>
                </div>
                
            </div>
            
        </div>
        
    </div> 

    <div>

        

        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">BG Image</th>
                <th scope="col">Mob BG Image</th>
                <th scope="col">About Heading</th>
                <th scope="col">About</th>
                <th scope="col">Property Type</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include 'includes/db_conn.php';
                    $sql = "SELECT * FROM `about`";
                    $result = mysqli_query($conn , $sql);
                    if(mysqli_num_rows($result) > 0) {
                        $serial_number = 1; // Initialize serial number
                    while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                        <tr>
                            <th scope="row"><?php echo $serial_number++; ?></th>
                            <td><img src="<?php echo $row['image']; ?>" height="100px" width="100px"></td>
                            <td><img src="<?php echo $row['mob_image']; ?>" height="100px" width="100px"></td>
                            <td><?php echo $row['about_head']; ?></td>
                            <td><?php echo $row['about']; ?></td>
                            <td><?php echo $row['property_type']; ?></td>
                            <td>
                        
                                <a href="about-edit.php?id=<?php echo $row['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
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






<?php 
include 'footer.php';
?>