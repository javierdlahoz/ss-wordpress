<?php
namespace Core;

require_once __DIR__.'/../config/config.php';
use Request\Request;

class Core{

  protected $request;
  protected static $instance;

  function __construct(){
    $this->request = new Request(); 
  }

  /**
   * gets the request object
   * @return Request
   */
  public function getRequest(){
    return $this->request;
  }

  /**
   * returns the singleton object
   * @return Core
   */
  public static function getSingleton(){
    if(!self::$instance instanceof self){
      self::$instance = new self;
    }
    return self::$instance;
  }

  /**
   * returns the config array
   * @return Array
   */
  public function getConfig(){
    return \getConfig();
  }

}