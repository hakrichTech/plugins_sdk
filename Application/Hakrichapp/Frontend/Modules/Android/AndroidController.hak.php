<?php
namespace Hakrichapp\Frontend\Modules\Android;
/**
 *
 */
 use Library\Application as app;
 use Library\BackController as component;
 use Library\HTTP\HTTPRequest as Request;
class AndroidController extends component
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



public static function EXECUTE_APK_RID(Request $request){
  if(self::$app::$device::TYPE()=="mobile"){
    self::$app::HTTP_RESPONSE()::REDIRECT(self::$app::$url.'android_Apk/'.sha1('apk'));
  }
}
public static function EXECUTE_APK(Request $request)

{
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
  self::$page::ADD_VAR('title','HakrichApp');

}

public static function EXECUTE_APKCATEG(Request $request)
{
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

  self::$page::ADD_VAR('title','HakrichApp');
  self::$page::ADD_VAR('categSelected','Dev');
  self::SET_VIEW('Apk');
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
