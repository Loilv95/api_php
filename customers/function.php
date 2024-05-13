<?php
    require '../inc/dbcon.php';
    function getCustomerList(){
        global $conn;
        $query = "SELECT * FROM data";
        $query_run = mysqli_query($conn, $query);
        if ($query_run){
            if (mysqli_num_rows($query_run) > 0){
                $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
                $data = [
                    'status' => 200,
                    'message' => 'Customer list fetched successfully',
                    'data' => $res,
                ];
                header("HTTP/1.0 200 SUCCESS");
                echo json_encode($data);
            }else{
                $data = [
                    'status' => 404,
                    'message' => 'No customer found',
                ];
                header("HTTP/1.0 404 No customer found");
                echo json_encode($data);
            }
        }
        else{
            $data = [
                'status' => 500,
                'message' => 'Internal service error',
            ];
            header("HTTP/1.0 500 Internal service error");
            echo json_encode($data);
        }
    }

    function storeCustomer($customerInput){
        global $conn;

        $name = mysqli_real_escape_string($conn, $customerInput['name']);
        $age = mysqli_real_escape_string($conn, $customerInput['age']);
        $mail = mysqli_real_escape_string($conn, $customerInput['email']);

        if (empty(trim($name))){

            return error422('Enter your name');
        }else if (empty(trim($age))){

            return error422('Enter your age');
        }else if (empty(trim($mail))){

            return error422('Enter your email');
        }
        else{
            $query = "INSERT INTO data (name, age, email) VALUES ('$name', '$age', '$mail')";
            $result = mysqli_query($conn, $query);
            if ($result){
                $customerList = getCustomerList();
                $data = [
                    'status' => 201,
                    'message' => 'Customer created Successfully',
                    'data' => $customerList,
                ];
                header("HTTP/1.0 201 CREATED");
                echo json_encode($data);
            }
            else{
                $data = [
                    'status' => 500,
                    'message' => 'Internal service error',
                ];
                header("HTTP/1.0 500 Internal service error");
                echo json_encode($data);
            }
        }
    }

    function error422($messageError){
        $data = [
            'status' => 422,
            'message' => $messageError,
        ];
        header("HTTP/1.0 422 Unprocessable Entity");
        echo json_encode($data);
        exit();
    }

    function getCustomer($id){
        global $conn;
        if ($id['id'] == null){
            return error422("Enter your cutomer id");
        }
        $customerId = mysqli_real_escape_string($conn, $id['id']);
        $query = "SELECT * FROM data WHERE id = '$customerId' LIMIT 1";
        $result = mysqli_query($conn, $query);
        if ($result){
            if (mysqli_num_rows($result) == 1){
                $res = mysqli_fetch_assoc($result);
                $data = [
                    'status' => 200,
                    'message' => 'Customer fetched Successfully',
                    'data' => $res,
                ];
                header("HTTP/1.0 201 SUCCESS");
                echo json_encode($data);
            }
            else{
                $data = [
                    'status' => 404,
                    'message' => 'No customer found',
                ];
                header("HTTP/1.0 404 No customer found");
                echo json_encode($data);
            }

        }
        else{
            $data = [
                'status' => 500,
                'message' => 'Internal service error',
            ];
            header("HTTP/1.0 500 Internal service error");
            echo json_encode($data);
        }
    }

?>