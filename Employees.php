<?php

require('db.php');
        $query = "SELECT emp_id,emp_name, email,phone_number FROM employee_details  ";
        $result = $connect->query($query);
        $feedData = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $feedData = json_encode($feedData);


        echo ($feedData);
    

?>