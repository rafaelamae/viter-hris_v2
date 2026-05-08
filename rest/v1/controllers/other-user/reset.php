<?php

require '../../core/header.php';
require '../../core/functions.php';

$conn = checkDbConnection();
$body = file_get_contents("php://input");
$data = json_decode($body, true);

if (!isset($_SERVER['HTTP_AUTHORIZATION'])) {
    checkAccess();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    checkEndpoint();
}

checkPayload($data);
$email = checkIndex($data, "item");

$query = $conn->prepare("select users_aid from settings_users where users_email = :users_email limit 1");
$query->execute(["users_email" => $email]);

if ($query->rowCount() === 0) {
    returnError("Invalid email.");
}

$resetKey = bin2hex(random_bytes(32));
$update = $conn->prepare("update settings_users set users_key = :users_key, users_updated = :users_updated where users_email = :users_email");
$update->execute([
    "users_key" => $resetKey,
    "users_updated" => date("Y-m-d H:i:s"),
    "users_email" => $email,
]);

sendResponse([
    "data" => ["key" => $resetKey],
    "count" => 1,
    "success" => true,
    "server_date" => date("Y-m-d"),
]);
