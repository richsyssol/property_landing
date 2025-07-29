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

    
    $full_name = htmlspecialchars(strip_tags(trim($_POST['full_name'] ?? '')));
    $email = htmlspecialchars(strip_tags(trim($_POST['email'] ?? '')));
    $phone = htmlspecialchars(strip_tags(trim($_POST['phone'] ?? '')));
    $message = htmlspecialchars(strip_tags(trim($_POST['message'] ?? '')));
    
    // Identify which form was submitted
    $formType = $_POST['form_type'] ?? '';
    $slug = $_POST['slug'] ?? '';

    // Check if reCAPTCHA is valid
    

    if (empty($recaptchaResponse)) {
    die("<script>alert('reCAPTCHA token is missing.'); window.location.href='/$slug';</script>");
}

    
    
    
    if ($formType === "form1" || $formType === "form2" || $formType === "form3" || $formType === "form4") {
 // Validate Fields
    if (!empty($full_name) || !empty($email) || (!empty($phone) || (!empty($message) ))) {
        
        // Inquiry Form 1 Processing
        $stmt = $conn->prepare("INSERT INTO inquiries (full_name, email, phone, message, slug) VALUES (?, ?,?,?,?)");
        $stmt->bind_param("sssss", $full_name, $email, $phone, $message, $slug);
        
     
    } else {
        die("<script>alert('Invalid form submission!'); window.location.href='/$slug';</script>");
    }
    }

    // Execute and Check for Success
    if ($stmt->execute()) {
        header("Location: /wel-come/$slug");
    } else {
        echo "<script>alert('Database error, please try again!'); window.location.href='/$slug';</script>";
    }
    $stmt->close();
  
    
    }
    $conn->close();
?>
