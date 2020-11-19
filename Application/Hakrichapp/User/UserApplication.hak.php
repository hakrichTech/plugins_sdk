<?php
namespace Hakrichapp\User;
/**
 *
 */
 use Library\Application as App;
class UserApplication extends App
{

  function __construct()
  {
    parent::__construct();
    self::$name = 'User';
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
