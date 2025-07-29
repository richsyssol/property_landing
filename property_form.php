<?php
include 'includes/db_conn.php'; // Database connection

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
     // Google reCAPTCHA Secret Key
    $secretKey = "6LdlsgwrAAAAACZsdZdywxaL_VR4KWaEfCe8x-d0";
    $recaptchaResponse = $_POST['recaptcha_response'] ?? '';

    // Verify reCAPTCHA response
    $verifyURL = "https://www.google.com/recaptcha/api/siteverify";
$data = [
    'secret'   => $secretKey,
    'response' => $recaptchaResponse,
    'remoteip' => $_SERVER['REMOTE_ADDR']
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $verifyURL);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$verifyResponse = curl_exec($ch);
curl_close($ch);

$responseData = json_decode($verifyResponse);

    // Check if reCAPTCHA is valid
    if (!$responseData->success || $responseData->score < 0.5) {
        die("<script>alert('reCAPTCHA verification failed. Please try again!'); window.location.href='/index';</script>");
    }

    
    
    $first_name = htmlspecialchars(strip_tags(trim($_POST['first_name'] ?? '')));
    $last_name = htmlspecialchars(strip_tags(trim($_POST['last_name'] ?? '')));
    $email = htmlspecialchars(strip_tags(trim($_POST['email'] ?? '')));
    $contact = htmlspecialchars(strip_tags(trim($_POST['contact'] ?? '')));
    $property = htmlspecialchars(strip_tags(trim($_POST['property'] ?? '')));
    $budget = htmlspecialchars(strip_tags(trim($_POST['budget'] ?? '')));
    $slug = htmlspecialchars(strip_tags(trim($_POST['slug'] ?? '')));
    
    $property_type = $_POST['slug'] ?? '';
    
 // Validate Fields
    if (!empty($first_name) || !empty($email) || (!empty($last_name) || !empty($contact) || (!empty($property) || !empty($budget) || !empty($slug)))) {
        
        // Inquiry Form 1 Processing
        $stmt = $conn->prepare("INSERT INTO inquiries_property_list (first_name,last_name, contact, email,property, budget, slug) VALUES (?, ?,?,?,?,?,?)");
        $stmt->bind_param("sssssss", $first_name,$last_name, $contact, $email,$property, $budget, $slug);
        
     
    } else {
        die("<script>alert('Invalid form submission!'); window.location.href='/index/$property_type';</script>");
    }

    // Execute and Check for Success
    if ($stmt->execute()) {
        header("Location: /welcome/$property_type");
    } else {
        echo "<script>alert('Database error, please try again!'); window.location.href='/index/$property_type';</script>";
    }
    $stmt->close();
  
    
    }
    $conn->close();
?>