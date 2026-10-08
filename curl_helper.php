<?php   

function send_request($url,$method="GET",$data=[]){
    $ch = curl_init();

    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

    switch($method){

        case "GET" : curl_setopt($ch,CURLOPT_HTTPGET,true);break;

    }
    $response = curl_exec($ch);
    
    return $response;
} 