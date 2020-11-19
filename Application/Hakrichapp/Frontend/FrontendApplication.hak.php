<?php
namespace Hakrichapp\Frontend;
/**
 *
 */
 use Library\Application as App;
class FrontendApplication extends App
{

  function __construct()
  {
    parent::__construct();
    self::$name = 'Frontend';
  }

  public static function RUN()
  {
  $controller = self::GET_CONTROLLER();
  $controller::EXECUTE();
  self::$httpResponse::SET_PAGE($controller::PAGE());
  self::$httpResponse::SEND();
}

}


 ?>
