<?php

header('Content-Type: application/json');

echo json_encode([
    'status' => 'healthy',
    'service' => 'php-app',
    'timestamp' => gmdate('c')
]);
