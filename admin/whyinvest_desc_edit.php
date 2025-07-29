<?php 
include 'session_check.php';
include 'header.php';
include 'includes/db_conn.php';

// Check if 'id' is provided in the URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<script>alert('Invalid request'); window.location.href='whyinvest_desc.php';</script>";
    exit();
}

$id = intval($_GET['id']);

// Fetch existing data securely
$query = "SELECT * FROM whyinvest_desc WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $about = $row['about']; // Contains HTML content
    $property_type = $row['property_type'];
} else {
    echo "<script>alert('Record not found'); window.location.href='whyinvest_desc.php';</script>";
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Get values from form
    $about = trim($_POST['about']);
    $property_type = trim($_POST['property_type']); // Fix property type update

    if (empty($about)) {
        $error = "Please enter content for 'About Chairman'.";
    } else {
        // Update the database securely
        $update_query = "UPDATE whyinvest_desc SET about = ?, property_type = ? WHERE id = ?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("ssi", $about, $property_type, $id);

        if ($stmt->execute()) {
            echo "<script>alert('Update successful'); window.location.href = 'whyinvest_desc.php';</script>";
            exit();
        } else {
            $error = "Failed to update: " . $conn->error;
        }
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
                    Edit About Chairman
                    <div class="page-title-subheading">
                        <a href="index.php">Dashboard</a> /
                        <a href="whyinvest_desc.php">Why Invest Description</a> /
                        <a href="#">Edit About Chairman</a>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <div class="container">
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="whyinvest_desc_edit.php?id=<?php echo $id; ?>" method="post">
            <div class="mb-3">
                <label class="form-label">About Chairman:</label>
                <textarea name="about" class="form-control ckeditor" rows="10"><?php echo $about; ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Property Type:</label>
                <select class="form-select" name="property_type" required>
                    <option value="commercial" <?php if ($property_type == 'commercial') echo 'selected'; ?>>Commercial</option>
                    <option value="residential" <?php if ($property_type == 'residential') echo 'selected'; ?>>Residential</option>
                </select>
            </div>

            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>
