<?php
include 'session_check.php';
include 'includes/db_conn.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // **Delete Project from Database**
    $delete_query = "DELETE FROM whyinvest WHERE id='$id'";
    if (mysqli_query($conn, $delete_query)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
