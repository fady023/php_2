<?php 
require_once "./curl_helper.php";
require_once "./conn.php";
require_once "./emp.php";

$emp = new emp($con);

$base_url = "https://dummyjson.com/users";

try{

$users = send_request($base_url);
$data= json_decode($users,true);

foreach($data['users'] as $user){
  $emp->store([
    "name"=>$user["firstName"],
    "email"=>$user["email"],
    "depart_id"=>"3"
  ]);
} 

/* echo "<pre>";
print_r($data['users']);
echo "</pre>"; */

}
catch(Exception $e){echo $e->getMessage();}



?>