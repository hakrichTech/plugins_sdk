<?php
namespace Hakrichapp\Ajax;
/**
 *
 */
 use Library\Application as App;
class AjaxApplication extends App
{

  function __construct()
  {
    parent::__construct();
    self::$name = 'Ajax';
  }

  public static function RUN()
  {
  $controller = self::GET_CONTROLLER();
  $controller::EXECUTE();

  self::$httpResponse::SET_OUTPUT($controller::OUT_PUT());
  self::$out_put= self::$httpResponse::GET_OUTPUT();
  echo self::$out_put;

}

}


 ?>
