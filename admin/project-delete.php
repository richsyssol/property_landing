<?php
include 'session_check.php';
include 'includes/db_conn.php';

if (isset($_POST['property_id'])) {
    $property_id = $_POST['property_id'];

    // **Fetch Images to Delete**
    $img_query = "SELECT image_path FROM property_list_images WHERE property_id='$property_id'";
    $img_result = mysqli_query($conn, $img_query);
    while ($img_row = mysqli_fetch_assoc($img_result)) {
        $image_path = $img_row['image_path'];
        if (file_exists($image_path)) {
            unlink($image_path); // Delete image from folder
        }
    }

    // **Delete Images from Database**
    mysqli_query($conn, "DELETE FROM property_list_images WHERE property_id='$property_id'");

    // **Delete property_list from Database**
    $delete_query = "DELETE FROM property_list WHERE id='$property_id'";
    if (mysqli_query($conn, $delete_query)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
