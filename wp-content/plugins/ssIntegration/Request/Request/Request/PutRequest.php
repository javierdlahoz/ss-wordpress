<?php

namespace Request\Request;

require_once "IRequest.php";
use Request\Request\IRequest;

class PutRequest implements IRequest{  

/**
*
* @param  string    $param
* @return The PUT param
*/ 
  public function get($param){
    $response = $_PUT[$param];

    return $response;
  }

/**
*
* @param  String   $url     The url to be requested
* @param  Array    $params  An associative array with all parameters to send
* @return Reponse of the requested URL
*/ 
public function set($url, $params = null, $isJson = true){
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

    if($isJson){
      $params = json_encode($params);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($params))    
        );

    }
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    $response = curl_exec($ch);
    if ($response === false) {
        $info = curl_getinfo($ch);
        curl_close($ch);
        throw new \Exception("Error Processing Request", 1);
      
    }
    curl_close($ch);
    return $response;
  }
  
}