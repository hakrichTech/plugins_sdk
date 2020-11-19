<?php
namespace Hakrichapp\Frontend\Modules\Download;
/**
 *
 */
 use Library\Application as app;
 use Library\BackController as component;
 use Library\HTTP\HTTPRequest as Request;
class DownloadController extends component
{
  protected static $Index;

  function __construct(app $app, $module, $action){
    parent::__construct($app, $module, $action);
    self::$Index=$this;
  }

  protected static function Hm()
  {
    self::HEADER();
    self::HOME_NEWS();
    self::TOP_APPLICTION();
    self::HOME_APPLICATION();
  }

  public static function EXECUTE__404(Request $request)
  {
    self::$app::HTTP_RESPONSE()::REDIRECT_401();
  }


public static function EXECUTE_PROCEDURE(Request $request)

{
  $device=strtoupper(self::$app::$device::TYPE());
  if (!is_callable(array(self::$Index, $device))) {
    throw new \RuntimeException('unknown device"'.$device.'"n\'est pas définie sur ce module');
  }else {
    self::$device();
  }
  if (!self::$app::USER()::HAS_FLASH() && !self::$app::USER()::IS_AUTH()) {
// code...
  }else {
      self::EXECUTE_AUTHO();
  }
  self::Hm();
  if ($request::GET_EXISTS('n') && $request::GET_EXISTS('c')) {
    $appname = STRTOLOWER($request::GET_DATA('n'));
    $appcode = $request::GET_DATA('c');

    $DATA=self::SOFT_DETAIL(self::$software_Manager::SOFTWARE_APP($appcode));
    if ($DATA) {
      if (STRTOLOWER(str_replace(' ', '', $DATA::NAME()))==$appname) {
        if ($request::GET_EXISTS('op')) {
          $dat=$DATA::HTML($request::GET_DATA('op'),$device);
          if ($dat=="none") {
            self::EXECUTE__404($request);
            exit;
          }
          self::$page::ADD_VAR("downloadDetail",$dat);
        }else {
          self::$page::ADD_VAR("downloadDetail",$DATA::HTML("apk",$device));
        }


      }else {


        // ERROR APPLICATION NOT FOUND
        self::EXECUTE__404($request);
        // self::$page::ADD_VAR("downloadDetail","ERROR APPLICATION NOT FOUND");


      }
    }else {
      // self::$page::ADD_VAR("downloadDetail","ERROR APPLICATION NOT FOUND1");

      self::EXECUTE__404($request);

      // ERROR APPLICATION NOT FOUND


    }

  }
  self::$page::ADD_VAR('title','Download Precedure');
  self::$page::ADD_VAR('page','Download');

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
