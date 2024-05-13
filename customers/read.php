<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST');
    header("Access-Control-Allow-Headers: X-Requested-With");
    header('Content-Type: application/json');
    include('function.php');
    $requestMethod = $_SERVER["REQUEST_METHOD"];

    if ($requestMethod == "GET"){
        if (isset($_GET['id'])){
            $customer = getCustomer($_GET);
            echo $customer;
        }
        else{
            $customerList = getCustomerList();
            echo $customerList;
        }

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