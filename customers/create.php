<?php
    error_reporting(0);
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST');
    header("Access-Control-Allow-Headers: X-Requested-With");
    header('Content-Type: application/json');
    include('function.php');
    $requestMethod = $_SERVER["REQUEST_METHOD"];

    if ($requestMethod == "POST"){
        $inputData = json_decode(file_get_contents("php://input"), true);
        if (empty($inputData)){
            $storeCustomer = storeCustomer($_POST);
        }
        else{
            $storeCustomer = storeCustomer($inputData);
        }
        echo $storeCustomer;
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