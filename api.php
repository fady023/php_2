<?php

require "conn.php";
require "emp.php";

$emp_obj = new emp($con);

$method = $_SERVER['REQUEST_METHOD'];
$end_point = $_SERVER['PATH_INFO'];

header("Content-Type:application/json");

switch ($method) {
    case "GET":
        if ($end_point == '/emplo') {
           echo json_encode($emp_obj->get_emps());
        } else {
            $emp_id = $end_point[1];
            echo json_encode($emp_obj->show_emp($emp_id));
        };

        case "POST" :
            if($end_point == "/emplo"){
                $data= json_decode(file_get_contents("php://input"),true);
                $emp = $emp_obj->store($data);

                echo json_encode($emp);
                
                /* if($emp){echo json_encode(["success"=>"data inserted"]);}
                else{echo json_encode(["error"=>"data not inserted"]);} */
            }
}
?>