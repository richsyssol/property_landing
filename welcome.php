<?php
$property_type = $_GET['property_type'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container text-center mt-5">
        <div class="alert alert-success">
            <h1>Thank You!</h1>
            <p>Your inquiry has been submitted successfully.</p>
            <a href="/index/<?php echo htmlspecialchars($property_type); ?>" class="btn btn-primary">Back to Property List Page </a>
        </div>
    </div>
</body>
</html>
