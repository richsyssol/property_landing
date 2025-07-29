<?php
if (!function_exists('verifyRecaptcha')) {
    function verifyRecaptcha($recaptcha_response) {
        $secret_key = "6Lf7juwqAAAAAEESXTGeQ0PKNy0QaIHpcskwgXul"; // Replace with your actual secret key
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$recaptcha_response&remoteip=" . $_SERVER['REMOTE_ADDR']);
        $response_data = json_decode($response, true);

        return ($response_data && isset($response_data['success']) && $response_data['success'] && $response_data['score'] >= 0.5);
    }
}
?>
