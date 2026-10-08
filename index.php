<?php 
require_once "./curl_helper.php";

$base_url = "https://dummyjson.com/users";

try{

$users = send_request($base_url);
$data= json_decode($users,true);

foreach($data['users'] as $user){
    echo $user['firstName']."<br>";
} 

/* echo "<pre>";
print_r($data['users']);
echo "</pre>"; */

}
catch(Exception $e){echo $e->getMessage();}



?>