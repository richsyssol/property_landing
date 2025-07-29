<?php

include 'includes/db_conn.php'; // Ensure database connection

// Check if slug is set
if (!isset($_GET['slug']) || empty($_GET['slug'])) {
    die("Error: Slug is missing!");
}

// Fetch and sanitize slug
$slug = trim($_GET['slug']);
$slug = preg_replace('/[^a-zA-Z0-9_-]/', '', $slug);

// Fetch project details
$sql = "SELECT * FROM projects WHERE slug = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $slug);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $project = $result->fetch_assoc();
    $project_id = $project['id']; // Assign project ID for further queries
    $category = $project['category']; // Assign category for similar projects
} else {
    die("Error: No project found for slug '$slug'");
}

// Function to fetch multiple rows
function fetchAll($conn, $query, $param_type = "", ...$params) {
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die("SQL Error: " . $conn->error);
    }

    if (!empty($params)) {
        $stmt->bind_param($param_type, ...$params);
    }

    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

// Function to fetch a single row
function fetchSingle($conn, $query, $param_type = "", ...$params) {
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die("SQL Error: " . $conn->error);
    }

    if (!empty($params)) {
        $stmt->bind_param($param_type, ...$params);
    }

    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// Fetch property details
$property_details = fetchAll($conn, "SELECT * FROM property_details WHERE project_id = ?", "i", $project_id);

// Fetch about property details
$aboutProperty = fetchSingle($conn, "SELECT * FROM about_property WHERE project_id = ?", "i", $project_id);

// Fetch about property details (multiple)
$about_property_details = fetchAll($conn, "SELECT * FROM about_property_details WHERE project_id = ?", "i", $project_id);

// Fetch property images
$propertyImages = fetchSingle($conn, "SELECT images, display_image FROM property_images WHERE project_id = ?", "i", $project_id);

// Decode images JSON
$imageArray = !empty($propertyImages['images']) ? json_decode($propertyImages['images'], true) : [];
$displayImage = $propertyImages['display_image'] ?? '';

// Fetch urban infrastructure data
$infraData = fetchAll($conn, "SELECT image_path, description FROM urban_infrastructure WHERE project_id = ?", "i", $project_id);

// Fetch property location
$locationData = fetchSingle($conn, "SELECT location_head, location_descri, location_map, section_name FROM property_location WHERE project_id = ?", "i", $project_id);

// Fetch plan images
$planImages = array_column(fetchAll($conn, "SELECT image_path FROM plan_images WHERE project_id = ?", "i", $project_id), 'image_path');

// Fetch developer details
$developerData = fetchSingle($conn, "SELECT * FROM about_developer WHERE project_id = ?", "i", $project_id);

// Fetch developer projects
$developerProjects = fetchAll($conn, "SELECT dev_title, dev_description FROM about_developer_projects WHERE project_id = ?", "i", $project_id);

// Fetch project materials
$materials = fetchAll($conn, "SELECT video_file, btn_name FROM project_materials WHERE project_id = ?", "i", $project_id);

// Fetch key features
$features = fetchAll($conn, "SELECT icon_html, key_heading, key_describ FROM key_features WHERE project_id = ?", "i", $project_id);

// Fetch contact details
$contactData = fetchSingle($conn, "SELECT address, email, contact, youtube, facebook, linkdin, instagram FROM contact_details WHERE project_id = ?", "i", $project_id);

// Fetch similar projects dynamically
$similarProjects = fetchAll($conn, "SELECT id, name, developer, image FROM projects WHERE category = ? AND id != ? LIMIT 3", "si", $category, $project_id);

// Fetch heading details
$headingData = fetchSingle($conn, "SELECT * FROM proweb_heading WHERE project_id = ?", "i", $project_id);

// Fetch sections data
$sectionData = fetchAll($conn, "SELECT * FROM proweb_heading WHERE project_id = ?", "i", $project_id);

// Fetch sections data
$settings = fetchSingle($conn, "SELECT * FROM website_settings WHERE project_id = ?", "i", $project_id);

// Fetch Gov details
$govdetails = fetchSingle($conn, "SELECT * FROM gov_details WHERE project_id = ?", "i", $project_id);

// Redirect after submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<script>alert('Inquiry submitted successfully!'); window.location.href='/property/$slug';</script>";
}

?>
