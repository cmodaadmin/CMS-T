<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'config/database.php';
include_once 'models/rfq.php';
include_once 'middleware/auth.php';

$database = new Database();
$db = $database->getConnection();

$rfq = new Rfq($db);

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
        $rfq->customer_id = $user_data->id;
        $rfq->title = $data->title;
        $rfq->description = $data->description;
        $rfq->category = $data->category;
        $rfq->budget = $data->budget;
        $rfq->city = $data->city;
        $rfq->timeline = $data->timeline;
        $rfq->attachments = $data->attachments;

        if($rfq->create()) {
            http_response_code(201);
            echo json_encode(array("message" => "RFQ was created."));
        } else {
            http_response_code(503);
            echo json_encode(array("message" => "Unable to create RFQ."));
        }
        break;

    case 'GET':
        if(isset($_GET['id'])) {
            $rfq->id = $_GET['id'];
            $rfq->readOne();
            if($rfq->title != null) {
                $rfq_item = array(
                    "id" => $rfq->id,
                    "customer_id" => $rfq->customer_id,
                    "title" => $rfq->title,
                    "description" => $rfq->description,
                    "category" => $rfq->category,
                    "budget" => $rfq->budget,
                    "city" => $rfq->city,
                    "timeline" => $rfq->timeline,
                    "attachments" => $rfq->attachments,
                    "status" => $rfq->status
                );
                http_response_code(200);
                echo json_encode($rfq_item);
            } else {
                http_response_code(404);
                echo json_encode(array("message" => "RFQ not found."));
            }
        } else {
            $stmt = $rfq->read($user_data->id);
            $num = $stmt->rowCount();

            if($num > 0) {
                $rfqs_arr = array();
                $rfqs_arr["records"] = array();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $rfq_item = array(
                        "id" => $id,
                        "customer_id" => $customer_id,
                        "title" => $title,
                        "description" => $description,
                        "category" => $category,
                        "budget" => $budget,
                        "city" => $city,
                        "timeline" => $timeline,
                        "attachments" => $attachments,
                        "status" => $status
                    );
                    array_push($rfqs_arr["records"], $rfq_item);
                }
                http_response_code(200);
                echo json_encode($rfqs_arr);
            } else {
                http_response_code(404);
                echo json_encode(array("message" => "No RFQs found."));
            }
        }
        break;
}
?>