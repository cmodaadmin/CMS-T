<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'config/database.php';
include_once 'models/bid.php';
include_once 'middleware/auth.php';

$database = new Database();
$db = $database->getConnection();

$bid = new Bid($db);

$authHeader = $_SERVER['HTTP_AUTHORIZATION'];
$arr = explode(" ", $authHeader);
$jwt = $arr[1];
$user_data = validate_token($jwt);

if(!$user_data) {
    http_response_code(401);
    echo json_encode(array("message" => "Unauthorized."));
    exit();
}

$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method) {
    case 'POST':
        $data = json_decode(file_get_contents("php://input"));
        $bid->rfq_id = $data->rfq_id;
        $bid->vendor_id = $user_data->id;
        $bid->amount = $data->amount;
        $bid->timeline = $data->timeline;
        $bid->notes = $data->notes;

        if($bid->create()) {
            http_response_code(201);
            echo json_encode(array("message" => "Bid was created."));
        } else {
            http_response_code(503);
            echo json_encode(array("message" => "Unable to create bid."));
        }
        break;

    case 'GET':
        if(isset($_GET['rfq_id'])) {
            $stmt = $bid->readByRfq($_GET['rfq_id']);
        } else {
            $stmt = $bid->readByVendor($user_data->id);
        }

        $num = $stmt->rowCount();

        if($num > 0) {
            $bids_arr = array();
            $bids_arr["records"] = array();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $bid_item = array(
                    "id" => $id,
                    "rfq_id" => $rfq_id,
                    "vendor_id" => $vendor_id,
                    "amount" => $amount,
                    "timeline" => $timeline,
                    "notes" => $notes,
                    "status" => $status
                );
                array_push($bids_arr["records"], $bid_item);
            }
            http_response_code(200);
            echo json_encode($bids_arr);
        } else {
            http_response_code(404);
            echo json_encode(array("message" => "No bids found."));
        }
        break;
}
?>