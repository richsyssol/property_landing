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
                    Social Media
                    <div class="page-title-subheading">
                        <a href="index.php">Dashboard</a> /
                        <a href="web_header.php">Social Media </a>
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
                    <th scope="col">Project List Section Heading</th>
                    <th scope="col">Why Us Section Heading</th>
                    <th scope="col">Why Invest In Us Heading</th>
                    <th scope="col">Contact Form Heading</th>
                    <th scope="col">Prperty Type</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include 'includes/db_conn.php';
                    $sql = "SELECT * FROM `web_heading`";
                    $result = mysqli_query($conn , $sql);
                    if(mysqli_num_rows($result) > 0) {
                        $serial_number = 1; // Initialize serial number
                    while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                        <tr>
                            <th scope="row"><?php echo $serial_number++; ?></th>
                            <td><?php echo $row['project_list_name']; ?></td>
                            <td><?php echo $row['whyus_name']; ?></td>
                            <td><?php echo $row['whyinvest_name']; ?></td>
                            <td><?php echo $row['contact_form_name']; ?></td>
                            <td><?php echo $row['property_type']; ?></td>
                            <td>
                                <a href="web_header_edit.php?id=<?php echo $row['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
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