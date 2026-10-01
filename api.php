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
           var_dump( json_encode($emp_obj->get_emps()));
        } else {
            $emp_id = $end_point[1];
            echo json_encode($emp_obj->show_emp($emp_id));
        }
}
