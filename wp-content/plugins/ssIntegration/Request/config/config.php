<?php
require_once "requires.php";

function getConfig(){
  $config = array(
  "debugMode" => false,
  "StickyStreet" => array(
      "user_id" => "javier13",
      "user_password" => "8cb2237d0679ca88db6464eac60da96345513964",
      "url" => "http://ss.com/api.php",
      "version" => "1.5",
      "account_id" => "javier13",
      "output" => "JSON"
      )
  );
  
  return $config;
}