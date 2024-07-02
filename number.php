<?php

// NumVerify API key
$api_key = 'af318bdf1bca4dfeaa5d358bf11c6c6c';

// Phone number to lookup
$phone_number = '+2349051598073';  // Replace with the desired phone number

// NumVerify API endpoint
$api_endpoint = "http://apilayer.net/api/validate?access_key=$api_key&number=$phone_number";

// Initialize cURL session
$ch = curl_init($api_endpoint);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute cURL session
$response = curl_exec($ch);

// Close cURL session
curl_close($ch);

// Parse the response
$data = json_decode($response, true);

// Check if the request was successful
if ($data && isset($data['carrier'])) {
    $carrier_name = $data['carrier'];
    echo "Carrier: $carrier_name";
} else {
    echo "Unable to determine carrier.";
}
?>
