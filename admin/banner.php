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
                    Banner
                    <div class="page-title-subheading">
                        <a href="index.php">Dashboard</a> /
                        <a href="banner.php">Banner</a>
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
          <th scope="col">Image</th>
          <th scope="col">Mobile Image</th>
          <th scope="col">Title</th>
          <th scope="col">Property Type</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        include 'includes/db_conn.php';
            $sql = "SELECT * FROM `banner`";
            $result = mysqli_query($conn , $sql);
              if(mysqli_num_rows($result) > 0) {
                  $serial_number = 1; // Initialize serial number
            while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                <tr>
                    <th scope="row"><?php echo $serial_number++; ?></th>
                    <td><img src="<?php echo $row['image']; ?>" alt="Banner Image" style="width: 50px; height: 50px;"></td>
                    <td><img src="<?php echo $row['phone_img']; ?>" alt="Banner Image" style="width: 50px; height: 50px;"></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['property_type']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                        <!-- <a href="#" data-id="<?php echo $row['id']; ?>" class="deleteBtn"><i class="fa-solid fa-trash"></i></a> &nbsp; / &nbsp; -->
                        <a href="banner-edit.php?id=<?php echo $row['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
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