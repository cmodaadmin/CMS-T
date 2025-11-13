<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'config/database.php';
include_once 'models/user.php';

require "vendor/autoload.php";
use \Firebase\JWT\JWT;

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$data = json_decode(file_get_contents("php://input"));

$user->email = $data->email;
$email_exists = $user->emailExists();

if($email_exists && password_verify($data->password, $user->password)) {
    $key = "YOUR_SECRET_KEY";
    $payload = array(
        "iat" => time(),
        "exp" => time() + (60*60),
        "data" => array(
            "id" => $user->id,
            "name" => $user->name,
            "email" => $user->email,
            "role_id" => $user->role_id
        )
    );

    http_response_code(200);

    $jwt = JWT::encode($payload, $key, 'HS256');
    echo json_encode(
        array(
            "message" => "Successful login.",
            "jwt" => $jwt
        )
    );
} else {
    http_response_code(401);
    echo json_encode(array("message" => "Login failed."));
}
?>