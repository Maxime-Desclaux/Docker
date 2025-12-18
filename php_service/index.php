<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$prenom = getenv('PRENOM') ?: 'Maxime';

echo json_encode([
    'prenom' => $prenom,
    'service' => 'PHP Microservice',
    'timestamp' => date('Y-m-d H:i:s'),
    'status' => 'OK'
]);
?>