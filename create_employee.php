<?php

require('db.php');
$rest_json = file_get_contents("php://input");

    $jsonData = json_decode($rest_json, true);

    if (isset($jsonData['emp_name']) && isset($jsonData['email']) && isset($jsonData['phone_number'])) {

        $query = "INSERT INTO employee_details( emp_name, email,phone_number ) VALUES ('$jsonData[emp_name]', '$jsonData[email]', '$jsonData[phone_number]') ";
        $connect->query($query);

        $query1 = "SELECT emp_id,emp_name, email,phone_number FROM employee_details  ";
        $result = $connect->query($query1);

        $feedData = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $feedData = json_encode($feedData[0]);


        echo ($feedData);
    }

