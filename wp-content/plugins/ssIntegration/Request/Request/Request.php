<?php

namespace Request;

use Request\Request\GetRequest;
use Request\Request\PostRequest;
use Request\Request\PutRequest;

require_once __DIR__.'/../Core/Core.php';
use Core\Core;

Class Request{

  private $post;
  private $get;
  private $put;
  private $debugMode;
  public $config;

  function __construct(){
    $config = Core::getConfig();
    $this->config = $config;
    $this->debugMode = $config['debugMode'];

    $this->post = new PostRequest();
    $this->get = new GetRequest();
    $this->put = new PutRequest();
  }

  /**
   * Gets the params sent thru a GET request
   * @param  String $param the param you want to get
   * @return String        The param's value
   */
  public function getParam($param){
    return $this->get->get($param);

  }

  /**
   * Gets the params sent thru a POST request
   * @param  String $param the param you want to get
   * @return String        The param's value
   */
  public function getPost($param){
    return $this->post->get($param);
  }

  /**
   * Gets the params sent thru a PUT request
   * @param  String $param the param you want to get
   * @return String        The param's value
   */
  public function getQuery($param){
    return $this->put->get($param);
  }

  /**
   * It allows you to send HTTP request
   * @param  String $method The HTTP request method (GET, POST, PUT)
   * @param  String $url    the requested url
   * @param  Array  $params the params you want to send in the HTTP request
   * @return String         it only returns a response if debug mode is active
   */
  public function sendRequest($method, $url, $params = null){
    switch ($method) {
      case 'GET':
        $response = $this->get->set($url, $params);
        $this->debugResponse($response);
        return $response;
        break;

      case 'POST':
        $response = $this->post->set($url, $params);
        $this->debugResponse($response);
        return $response;
        break;
      
      case 'PUT':
        $response = $this->put->set($url, $params);
        $this->debugResponse($response);
        return $response;
        break;

      default:
        throw new \Exception("Unsopported method", 1);
        break;
    }
  }

  /**
   * Returns a response if debug mode is active
   * @param  String $response 
   * @return String           
   */
  private function debugResponse($response){
    if($this->debugMode == true){
      echo $response;
    }
  }


  /**
   * Sends a json message as response
   * @param  Integer $message 
   * @param  String $code     
   * @return json             
   */
  public function sendJsonMessage($message, $code){
    
    $response = array(
      'code' => $code,
      'message' => $message
      );

    header($_SERVER["SERVER_PROTOCOL"]." ".$code, true);
    header('Content-Type: application/json');
    $jsonResponse = json_encode($response);
    echo $jsonResponse;
    die();

  }
}