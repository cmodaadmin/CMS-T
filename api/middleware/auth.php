<?php
require "vendor/autoload.php";
use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;

function validate_token($jwt) {
    $key = "YOUR_SECRET_KEY";
    try {
        $decoded = JWT::decode($jwt, new Key($key, 'HS256'));
        return $decoded->data;
    } catch (Exception $e) {
        return false;
    }
}
?>