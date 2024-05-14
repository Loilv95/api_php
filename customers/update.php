<?php
    error_reporting(0);
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: PUT');
    header("Access-Control-Allow-Headers: X-Requested-With");
    header('Content-Type: application/json');
    include('function.php');
    $requestMethod = $_SERVER["REQUEST_METHOD"];

    if ($requestMethod == "PUT"){
        $inputData = json_decode(file_get_contents("php://input"), true);
        if (empty($inputData)){
            $update = updateCustomer($_POST, $_GET);
        }
        else{
            $update = updateCustomer($inputData, $_GET);
        }
        echo $update;
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