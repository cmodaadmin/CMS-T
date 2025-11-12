<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'config/database.php';
include_once 'models/user.php';
include_once 'models/vendor.php';
include_once 'middleware/auth.php';

$database = new Database();
$db = $database->getConnection();

$authHeader = $_SERVER['HTTP_AUTHORIZATION'];
$arr = explode(" ", $authHeader);
$jwt = $arr[1];
$user_data = validate_token($jwt);

if(!$user_data || $user_data->role_id != 1) { // Assuming role_id 1 is Super Admin
    http_response_code(401);
    echo json_encode(array("message" => "Unauthorized."));
    exit();
}

$request_method = $_SERVER["REQUEST_METHOD"];
$resource = $_GET['resource'];

switch($resource) {
    case 'users':
        // Handle user management
        break;
    case 'vendors':
        $vendor = new Vendor($db);
        if($request_method == 'GET') {
            $stmt = $vendor->read();
            $num = $stmt->rowCount();

            if($num > 0) {
                $vendors_arr = array();
                $vendors_arr["records"] = array();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $vendor_item = array(
                        "id" => $id,
                        "user_id" => $user_id,
                        "business_name" => $business_name,
                        "contact_person" => $contact_person,
                        "primary_category" => $primary_category,
                        "kyc_info" => $kyc_info,
                        "status" => $status
                    );
                    array_push($vendors_arr["records"], $vendor_item);
                }
                http_response_code(200);
                echo json_encode($vendors_arr);
            } else {
                http_response_code(404);
                echo json_encode(array("message" => "No vendors found."));
            }
        }
        break;
    // Add cases for other resources
}
?>