<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'config/database.php';
include_once 'models/user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$data = json_decode(file_get_contents("php://input"));

$user->name = $data->name;
$user->email = $data->email;
$user->mobile = $data->mobile;
$user->city = $data->city;
$user->password = $data->password;
$user->company = $data->company;
$user->gstin = $data->gstin;
$user->role_id = $data->role_id;

if(
    !empty($user->name) &&
    !empty($user->email) &&
    !empty($user->password) &&
    $user->create()
){
    http_response_code(200);
    echo json_encode(array("message" => "User was created."));
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Unable to create user."));
}
?>