<?php

namespace Request\Request;

interface IRequest{

  public function get($param);
  public function set($url, $params);

}