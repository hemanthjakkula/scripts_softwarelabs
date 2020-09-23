<?php
require('db.php');
$rest_json = file_get_contents("php://input");

   if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
          $url = "https://";
     else
          $url = "http://";
     // Append the host(domain name, ip) to the URL.   
     $url .= $_SERVER['HTTP_HOST'];

     // Append the requested resource location to the URL   
     $url .= $_SERVER['REQUEST_URI'];


     $url_components = parse_url($url);
     parse_str($url_components['query'], $params);

     $jsonData = json_decode($params["filter"], true);
    if (isset($jsonData['id'])) {

        if (count($jsonData['id'], 1) >= 2) {
            $emp_ids = implode("','", $jsonData['id']);
        } else {
            if (count($jsonData['id'], 1) == 1) {
                $emp_ids = $jsonData['id'][0];
            }
        }
    }

    if (isset($emp_ids)) {

        $query = "DELETE FROM employee_details WHERE emp_id IN ('" . $emp_ids . "') ";
        $connect->query($query);

        $query1 = "SELECT emp_id,emp_name, email,phone_number FROM employee_details  ";

        $result = $connect->query($query1);

        $feedData1 = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $feedData1 = json_encode($feedData1);

        echo ($feedData1);
    }

