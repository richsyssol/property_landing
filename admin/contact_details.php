<?php 
include 'session_check.php';
include 'header.php';
include 'includes/db_conn.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($project_id > 0) {
        $conn->begin_transaction(); // Start transaction for data integrity

        try {
            // Get form inputs
            $address = trim($_POST['address']);
            $email = trim($_POST['email']);
            $contact = trim($_POST['contact']);
            $youtube = trim($_POST['youtube']);
            $facebook = trim($_POST['facebook']);
            $linkdin = trim($_POST['linkdin']);
            $instagram = trim($_POST['instagram']);

            // Validate email format
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Invalid email format");
            }

            // Validate contact number (Only digits, max length 15)
            if (!preg_match('/^\d{10,15}$/', $contact)) {
                throw new Exception("Invalid contact number. Only digits allowed (10-15 characters).");
            }

            // Prepare SQL statement
            $stmt = $conn->prepare("INSERT INTO contact_details (project_id, address, email, contact, youtube, facebook, linkdin, instagram) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            if (!$stmt) {
                die("SQL Error: " . $conn->error);
            }

            // Bind and execute statement
            $stmt->bind_param("isssssss", $project_id, $address, $email, $contact, $youtube, $facebook, $linkdin, $instagram);
            $stmt->execute();
            $stmt->close();

            $conn->commit(); // Commit transaction if successful
            echo "<script>alert('Contact details added successfully!'); window.location.href='property.php';</script>";
        } catch (Exception $e) {
            $conn->rollback(); // Rollback on error
            echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
        }

        $conn->close();
    } else {
        echo "<script>alert('Invalid Project ID!'); window.history.back();</script>";
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
                    Property
                    <div class="page-title-subheading">
                        <a href="index.php">Dashboard</a> /
                        <a href="property.php">Property</a> /
                        <a href="">Property Add</a>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <div class="container">

    
    <!-- Progress Bar -->
    <div class="progress-container">
        <div class="progress-bar" id="progressBar"></div>
    </div>

    <form action="contact_details.php?id=<?= isset($_GET['id']) ? intval($_GET['id']) : 0 ?>" method="POST" id="multiStepForm">
    
    <div class="step" id="step10">
        <h3>Contact Details :</h3>
        <div class="mb-3">
            <label class="form-label">Address:</label>
            <input type="text" class="form-control" name="address">
        </div>
        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label class="form-label">Contact:</label>
            <input type="text" class="form-control" name="contact">
        </div>
        <div class="mb-3">
            <label class="form-label">Youtube Link:</label>
            <input type="text" class="form-control" name="youtube">
        </div>
        <div class="mb-3">
            <label class="form-label">Facebook Link:</label>
            <input type="text" class="form-control" name="facebook">
        </div>
        <div class="mb-3">
            <label class="form-label">Linkdin Link:</label>
            <input type="text" class="form-control" name="linkdin">
        </div>
        <div class="mb-3">
            <label class="form-label">Instagram Link:</label>
            <input type="text" class="form-control" name="instagram">
        </div>
    </div>

    <!-- Submit Button -->
    <div class="step pt-5">
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </div>

</form>







    </div>



</div>

<script>
    function addField() {
        let container = document.getElementById("dynamicFields");
        let newField = document.createElement("div");
        newField.classList.add("row", "mb-2");

        newField.innerHTML = `
            <div class="col-md-4">
                <label class="form-label">Icon Image:</label>
                <input type="file" class="form-control" name="icon_html[]" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Heading:</label>
                <input type="text" class="form-control" name="key_heading[]" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Description:</label>
                <textarea class="form-control" name="key_describ[]" rows="4" required></textarea>
            </div>
            <div class="col-md-2 mt-4">
                <button type="button" class="btn btn-danger" onclick="removeField(this)">Remove</button>
            </div>
        `;
        container.appendChild(newField);
    }

    function removeField(button) {
        button.parentElement.parentElement.remove();
    }
</script>


<?php 
include 'footer.php';
?>
