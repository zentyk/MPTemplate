<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data);
    http_response_code(200);

    echo json_encode([
        'message' => 'Data received successfully',
        'body' => $data
    ]);
} else {
    http_response_code(400);
    echo json_encode([
        'error' => 'Invalid request method. Please use POST.'
    ]);
}