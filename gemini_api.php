<?php
header('Content-Type: application/json');
$input = json_decode(file_get_contents('php://input'), true);

$api_key = "AIzaSyBQADsXJLauzc9XFIHQI3lYAwXryejlfqc"; // Aman di server, tidak terlihat di browser
$url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=" . $api_key;

$data = ["contents" => [["parts" => [["text" => $input['prompt']]]]]];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
$response = curl_exec($ch);
curl_close($ch);

echo $response;
?>