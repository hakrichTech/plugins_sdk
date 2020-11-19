<?php
namespace Hakrichapp\Frontend\Modules\Softwares;
/**
 *
 */
 use Library\Application as app;
 use Library\BackController as component;
 use Library\HTTP\HTTPRequest as Request;
class SoftwaresController extends component
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

protected static function Hm()
{
  self::HEADER();
  self::HOME_NEWS();
  self::TOP_APPLICTION();
  self::HOME_APPLICATION();
  self::$page::ADD_VAR('title','Applications');
  self::$page::ADD_VAR('page','Application');
}


public static function EXECUTE_APPLICATION_NEW(Request $request){
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

  self::SET_VIEW('Application');
  self::APPLICATION_LIST('new');
  self::Hm();

}
public static function EXECUTE_APPLICATION(Request $request)
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
  self::Hm();

  if ($request::GET_EXISTS('categ')) {
    $data=$request::GET_DATA('categ');
    self::APPLICATION_LIST('categ',$data);

  }elseif ($request::GET_EXISTS('game')) {
    $data=$request::GET_DATA('game');
    self::APPLICATION_LIST('categ',$data);

  }else {
    self::APPLICATION_LIST();
  }

}
private static function APPLICATAION(Request $request)
{
  // APPLICATION REQUET
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
