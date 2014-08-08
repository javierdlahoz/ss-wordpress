<?php

namespace Request\Request;

require_once "IRequest.php";
use Request\Request\IRequest;

class PostRequest implements IRequest{  

  /**
  *
  * @param  string    $param
  * @return The POST param
  */ 
  public function get($param){
    $response = $_POST[$param];

    return $response;
  }

  /**
  *
  * @param  String   $url     The url to be requested
  * @param  Array    $params  An associative array with all parameters to send
  * @param  Boolean  $isJson  Tells the method if the array must be threaten as a json request
  * @return Reponse of the requested URL
  */ 
  public function set($url, $params = null, $isJson = false){
    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, count($params));

    if($isJson){
      $params = json_encode($params);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($params))    
        );

    }

    curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
    $curl_response = curl_exec($curl);
    if ($curl_response === false) {
        $info = curl_getinfo($curl);
        curl_close($curl);

        throw new \Exception("Error Processing Request", 1);
    }
    curl_close($curl);
  
    return json_decode($curl_response);
  }
  
}