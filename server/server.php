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

$payload = [
    // 'condition' => '\'announcements\' in topics',
    // 'notification' => $msg
    // 'registration_ids' => $registrationIds,
    // 'data' => $msg
];

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