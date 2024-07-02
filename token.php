<?php

$sandbox_url = "https://sandbox.monnify.com";
$api_endpoint = "/api/v1/auth/login";
$api_key = "MK_TEST_9FAXKD8DAN";
$api_secret = "HJ9VJQD3DCA3782RSQVS3EV1TV18V6MH";

// Base64 encode apiKey:clientSecret
$base64_credentials = base64_encode("$api_key:$api_secret");

// Request headers
$headers = array(
    "Content-Type: application/json",
    "Authorization: Basic $base64_credentials"
);

// Request body parameters (empty in this case)
$request_data = array();

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $sandbox_url . $api_endpoint);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request_data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute cURL session
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
}

// Close cURL session
curl_close($ch);

// Output the API response
echo $response;

?>
