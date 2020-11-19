<?php
namespace Library;


/**
 *
 */
class DeviceDetector
{
  protected static $device;

  function __construct()
  {
    self::$device=" ";
    $c = preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|palm|phone|pie|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    if ($c!= NULL) {
     self::$device="mobile";
   }else {
     $d=preg_match("/(tablet)/i",$_SERVER["HTTP_USER_AGENT"]);
     if ($d!=NULL) {
       self::$device="tablet";
     }else {
       self::$device="computer";
     }
   }
   return $this;
  }

  public static function TYPE()
  {
    return self::$device;
  }


}

 ?>
