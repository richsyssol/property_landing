<?php 
include 'session_check.php';
include 'header.php';
include 'includes/db_conn.php';

$project_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch settings for this project
$settingsQuery = "SELECT * FROM website_settings WHERE project_id = ?";
$stmt = $conn->prepare($settingsQuery);
$stmt->bind_param("i", $project_id);
$stmt->execute();
$result = $stmt->get_result();
$settings = $result->fetch_assoc() ?? [];

function getSetting($settings, $field, $default) {
    return isset($settings[$field]) ? $settings[$field] : $default;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fields = [];

    $upload_dir = 'uploads/sections/';
    if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);

    for ($i = 1; $i <= 3; $i++) {
        // Only process image uploads
        if (!empty($_FILES["section{$i}_image"]['name'])) {
            $image_name = time() . "_" . basename($_FILES["section{$i}_image"]['name']);
            $image_path = $upload_dir . $image_name;
            move_uploaded_file($_FILES["section{$i}_image"]['tmp_name'], $image_path);
            $fields["section{$i}_image"] = $image_path;
        } else {
            $fields["section{$i}_image"] = $settings["section{$i}_image"] ?? null;
        }
    }

    // Insert or update image fields only
    if ($settings) {
        $updateQuery = "UPDATE website_settings SET ";
        foreach ($fields as $key => $value) {
            $updateQuery .= "$key = '$value', ";
        }
        $updateQuery = rtrim($updateQuery, ", ") . " WHERE project_id = $project_id";
    } else {
        $updateQuery = "INSERT INTO website_settings (project_id, " . implode(", ", array_keys($fields)) . ") 
                        VALUES ($project_id, '" . implode("', '", $fields) . "')";
    }

    if (mysqli_query($conn, $updateQuery)) {
        echo "<script>alert('Images uploaded successfully!'); window.location.href='property.php';</script>";
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
                    Contact Section
                    <div class="page-title-subheading">
                        <a href="index.php">Dashboard</a> /
                        <a href="property.php">Property</a> /
                        <a href="">Contact Section</a>
                    </div>
                </div>
            </div>
        </div>
    </div> 

<div class="container mt-5">
    <form action="form-section.php?id=<?= isset($_GET['id']) ? intval($_GET['id']) : 0 ?>" method="post" enctype="multipart/form-data">
        <?php for ($i = 1; $i <= 3; $i++): ?>
            <h4>Section <?= $i ?></h4>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="section<?= $i ?>_show" id="section<?= $i ?>_show"
                    <?= getSetting($settings, "section{$i}_show", 1) ? 'checked' : ''; ?>>
                <label class="form-check-label" for="section<?= $i ?>_show">Show Section <?= $i ?></label>
            </div>

            <div class="mb-3">
                <label class="form-label">Section <?= $i ?> Image</label>
                <input type="file" class="form-control" name="section<?= $i ?>_image">
                <?php if (!empty($settings["section{$i}_image"])): ?>
                    <img src="<?= $settings["section{$i}_image"] ?>" class="img-thumbnail mt-2" width="150">
                <?php endif; ?>
            </div>

           

            <hr>
        <?php endfor; ?>

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>

</div>

<?php include 'footer.php'; ?>
