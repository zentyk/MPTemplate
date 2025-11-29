<?php
declare(strict_types=1);

header('Content-Type: application/json');
ini_set('display_errors', '0');
error_reporting(E_ALL & ~E_DEPRECATED & ~E_WARNING & ~E_NOTICE);

ob_start();

use logic\UserLogic;

require_once 'logic/UserLogic.php';
require_once 'common/JsonUtility.php';

$userLogic = new UserLogic();
$jsonUtility = new common\JsonUtility();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $jsonUtility->SendJson(400, ['error' => 'Invalid request method. Please use POST.']);
}


$raw = file_get_contents('php://input');
$data = json_decode($raw);

if(json_last_error() !== JSON_ERROR_NONE) {
    $jsonUtility->SendJson(400, ['error' => 'Invalid JSON.']);
}

try {
    $userName = $data->userName;
    $registered = $userLogic->CreateUser($data->query);

    if($registered) {
        $jsonUtility->SendJson(200, [
            'body' => $data
        ]);
    } else {
        $jsonUtility->SendJson(500, [
            'error' => 'Error creating user.'
        ]);
    }
} catch (Throwable $e) {
    error_log($e->getMessage());
    $jsonUtility->SendJson(500, ['error' => 'Internal server error.']);
}