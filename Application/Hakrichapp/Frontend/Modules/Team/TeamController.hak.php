<?php
namespace Hakrichapp\Frontend\Modules\Team;
/**
 *
 */
 use Library\Application as app;
 use Library\BackController as component;
 use Library\HTTP\HTTPRequest as Request;
class TeamController extends component
{
  protected static $Index;

  function __construct(app $app, $module, $action){
    parent::__construct($app, $module, $action);
    self::$Index=$this;
  }



  public static function EXECUTE__404(Request $request)
  {
    self::$app::HTTP_RESPONSE()::REDIRECT_401();
  }

  public static function EXECUTE_CONTACT(Request $request){
    $device=strtoupper(self::$app::$device::TYPE());
    if (!is_callable(array(self::$Index, $device))) {
      throw new \RuntimeException('unknown device"'.$device.'"n\'est pas définie sur ce module');
    }else {
      self::$device();
    }

    if (!self::$app::USER()::HAS_FLASH() && !self::$app::USER()::IS_AUTH()) {
  // CODE...
    }else {
       self::EXECUTE_AUTHO();
    }
    self::$page::ADD_VAR('title','Contact Us');
    self::$page::ADD_VAR('page','Contact');
  }

  public static function EXECUTE_ABOUT(Request $request){
    $device=strtoupper(self::$app::$device::TYPE());
    if (!is_callable(array(self::$Index, $device))) {
      throw new \RuntimeException('unknown device"'.$device.'"n\'est pas définie sur ce module');
    }else {
      self::$device();
    }

    if (!self::$app::USER()::HAS_FLASH() && !self::$app::USER()::IS_AUTH()) {
  // CODE...
    }else {
       self::EXECUTE_AUTHO();
    }
    self::$page::ADD_VAR('title','Hakrich-Team About');
    self::$page::ADD_VAR('page','About');
  }


public static function EXECUTE_PRIVACY(Request $request){
  $device=strtoupper(self::$app::$device::TYPE());
  if (!is_callable(array(self::$Index, $device))) {
    throw new \RuntimeException('unknown device"'.$device.'"n\'est pas définie sur ce module');
  }else {
    self::$device();
  }

  if (!self::$app::USER()::HAS_FLASH() && !self::$app::USER()::IS_AUTH()) {
// CODE...
  }else {
     self::EXECUTE_AUTHO();
  }
  self::$page::ADD_VAR('title','Hakrich-App Privacy');
  self::$page::ADD_VAR('page','Privacy');
}

private static function COMPUTER()
{
  self::$page::ADD_VAR('deviceType','computer');
}
private static function MOBILE()
{
  self::$page::ADD_VAR('deviceType','mobile');
  self::$page::ADD_VAR('display','none');

}
private static function TEBLET()
{
  self::$page::ADD_VAR('deviceType','tablet');
}
public static function EXECUTE()
{
  self::RUN_DEVICE(self::$Index);
  
}

}

 ?>
