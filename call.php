<?php
$fromNumber = "Any Number in these World"; //919999912345 Any Number in the World
$toNumber = "Your Number with Country Code"; // Your Number with Plivo

$authId = "XXXXXXXXX"; // Auth ID from  Plivo
$authToken = "Auth Token Id"; // Auth Token From Plivo

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.plivo.com/v1/Account/".$authId."/Call/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"to\": \"$toNumber\",\"from\": $fromNumber, \"answer_url\": \"https://s3.amazonaws.com/static.plivo.com/answer.xml\", \"answer_method\": \"GET\"}");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_USERPWD, $authId . ":" . $authToken);

$headers = array();
$headers[] = "Content-Type: application/json";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

echo $result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);
