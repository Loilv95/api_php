<?php
    $host = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "api_demo";

    $conn = mysqli_connect($host, $userName, $password, $dbName);

    if (!$conn){
        die("Database connect failed".mysqli_connect_error());
    }
?>