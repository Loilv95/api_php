<?php
error_reporting(0);
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');
include('function.php');
$requestMethod = $_SERVER["REQUEST_METHOD"];

if ($requestMethod == "DELETE"){
    $deleteCustomer = deleteCustomer($_GET);
    echo $deleteCustomer;
}
else{
    $data = [
        'status' => 405,
        'message' => $requestMethod.' Method not allowed',
    ];
    header("HTTP/1.0 405 Method not allowed");
    echo json_encode($data);
}
?>