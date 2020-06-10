<?php

$headers = [
    'Authorization: key=<<FCM_SERVER_KEY>>',
    'Content-Type: application/json',
];

$registrationIds = [
    // device ids...
];

$msg = [
    'title' => $subject,
    'body' => $message,
    'icon' => '',
    'image' => '',
];

/**
 * You can find the full list of pre-defined keys for making notification messages in README.md file
 * 
 * @example
 * Notification message:
 * $payload = [
 *   'notification' => $msg
 *   'condition' => '\'<<TOPIC_NAME>>\' in topics',  // topic
 *   'registration_ids' => $registrationIds, // hardware id
 * ];
 * 
 * Data message:
 * $payload = [
 *   'data' => $msg
 *   'condition' => '\'<<TOPIC_NAME>>\' in topics',  // topic
 *   'registration_ids' => $registrationIds, // hardware id
 * ];
 */ 
$payload = [
    // ....
]

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

$response = curl_exec($ch);
$err = curl_error($ch);

curl_close($ch);

return ($err) ? ['err' => $err] : ['response' => $response];