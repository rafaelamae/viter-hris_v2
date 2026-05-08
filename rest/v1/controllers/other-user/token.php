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
$token = checkIndex($data, "token");

$sql = "select users.*, roles.* ";
$sql .= "from settings_users as users ";
$sql .= "left join settings_roles as roles on users.users_role_id = roles.role_aid ";
$sql .= "where users.users_key = :users_key ";
$sql .= "and users.users_is_active = 1 ";
$sql .= "limit 1";

$query = $conn->prepare($sql);
$query->execute(["users_key" => $token]);
$user = $query->fetch();

if (!$user) {
    returnError("Invalid token.");
}

sendResponse([
    "data" => mapOtherUser($user),
    "count" => 1,
    "success" => true,
    "server_date" => date("Y-m-d"),
]);

function mapOtherUser($user)
{
    return [
        "user_other_aid" => $user["users_aid"],
        "user_other_fname" => $user["users_first_name"],
        "user_other_lname" => $user["users_last_name"],
        "user_other_email" => $user["users_email"],
        "user_other_password" => $user["users_password"],
        "user_key" => $user["users_key"],
        "role" => $user["role_name"] ?? "developer",
        "role_name" => $user["role_name"] ?? "developer",
        "role_code" => $user["role_code"] ?? "",
        "role_description" => $user["role_description"] ?? "",
        "role_created" => $user["role_created"] ?? "",
        "role_datetime" => $user["role_updated"] ?? "",
    ];
}
