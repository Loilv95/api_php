<?php
//    $con = mysqli_connect("localhost", "root", "", "api_demo");
//    $response = array();
//    if($con){
//        echo "Database connect success";
//        $sql = "select * from data";
//        $result = mysqli_query($con,$sql);
//        if($result){
//            $i = 0;
//            while ($row = mysqli_fetch_assoc(@$result)){
//                $response[$i]['id'] = $row['id'];
//                $response[$i]['name'] = $row['name'];
//                $response[$i]['age'] = $row['age'];
//                $response[$i]['email'] = $row['email'];
//                $i++;
//            }
//            echo json_encode($response,JSON_PRETTY_PRINT);
//
//        }
//    }
//    else echo "Database connect failed";
//?>