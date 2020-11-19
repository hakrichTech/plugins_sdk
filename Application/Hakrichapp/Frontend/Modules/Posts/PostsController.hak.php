<?php
namespace Hakrichapp\Frontend\Modules\Posts;
/**
 *
 */
 use Library\Application as app;
 use Library\BackController as component;
 use Library\HTTP\HTTPRequest as Request;
class PostsController extends component
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

public static function EXECUTE_POST(Request $request){
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
  self::$page::ADD_VAR('title','TMWhatsapp');
  self::$page::ADD_VAR('headerPost','TMWhatsApp v7.71 (With Inbuilt VPN): A combination of WhatsApp Plus, YoWhatsApp, GBWhatsApp & other mods.');
  self::$page::ADD_VAR('page','Post');
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
