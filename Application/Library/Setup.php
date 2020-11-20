<?php
namespace Library;

use \Library\Application as App;

/**
 *
 */
class Setup extends App
{

  function __construct($side)
  {
    $_ENV['APP_CONFIG_SIDE']=$side;
    parent::__construct();
    self::$name = $side;
  }

  public static function RUN()
  {
    if (self::$name == "Ajax") {

      $controller = self::GET_CONTROLLER();
      $controller::EXECUTE();

      self::$httpResponse::SET_OUTPUT($controller::OUT_PUT());
      self::$out_put= self::$httpResponse::GET_OUTPUT();
      echo self::$out_put;


    }else {
      $controller = self::GET_CONTROLLER();
      $controller::EXECUTE();
      self::$httpResponse::SET_PAGE($controller::PAGE());
      self::$httpResponse::SEND();
    }
  }
}



 ?>
