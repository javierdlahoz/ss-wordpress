<?php

namespace Request\Request;

require_once "IRequest.php";
use Request\Request\IRequest;

class GetRequest implements IRequest{  

/**
*
* @param  string    $param
* @return The get param
*/ 
  public function get($param){
    $response = $_GET[$param];

    return $response;
  }

/**
*
* @param  String   $url     The url to be requested
* @param  Array    $params  An associative array with all parameters to send
* @return Reponse of the requested URL
*/ 
  public function set($url, $params = null){
    $paramsToUrl = ""; 
    if($params != null){
      $paramsToUrl = "?"; 
      foreach ($params as $param => $value) {
          $paramsToUrl .= $param . "=" .$value ."&";
        }
      $paramsToUrl = substr($paramsToUrl, 0, -1);  
    }
    $response = file_get_contents($url.$paramsToUrl);
    return $response;
  }
}