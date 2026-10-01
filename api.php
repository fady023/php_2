<?php 

require "conn.php";
require "emp.php";

$emp_obj = new emp($con);

$method = $_SERVER['REQUEST_METHOD'];

header("content-type:application/json");

switch($method){
    case "GET" :echo  json_encode($emp_obj->get_emps())  ;
}