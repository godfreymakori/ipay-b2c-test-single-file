<?php
$base_url = 'https://apis.staging.ipayafrica.com/b2c/v3';
$vid = 'demo';
$security_key = 'demo';
$channel = 'MPESA';
$phone_number = '254720000000';

//Request
$params = [
    'vid' => $vid,
    'reference' => uniqid() . '-' . time(),
    'phone' => $phone_number,
    'amount' => 1,
];

$hash = hash('ripemd160', json_encode($params));

$params = array_push($params, $hash);
try {
    $ch = curl_init($base_url . '/mobile/mpesa');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    $response = curl_exec($ch);
    curl_close($ch);
} catch (Exception $e) {
    throw new Exception("Unable to connect", 0, $e);
}




