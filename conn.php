<?php 

$host = "localhost";
$user="root";
$pass="";
$db="api_2026";

$con = new mysqli($host,$user,$pass,$db);

if($con){echo "connected";}else{
   die($con->error);
}

?>