<?php
namespace Library\Postdata\Verification\Postdatas;
/**
 *
 */
 use DataClass\AddInObject\Object_ as ob;
 use Library\Postdata\Verification\postdataTr\user as functions;
class Postdatas extends ob
{

  private static $mail=" ";
  private static $password0=" ";
  private static $password=" ";
  private static $name=" ";
  private static $gender=" ";
  private static $code=" ";
  private static $profile=" ";
  private static $id=" ";
  private static $ip=" ";
  private static $app=" ";

  use functions;
  public function __construct(array $x)
  {
    self::$app=$this;
   self::SYNC($x);
  }

  public static function SYNC($x)
  {
    foreach ($x as $key=>$value) {
      $method = 'SET_'.strtoupper($key);
      if (is_callable(array(self::$app, $method))){
        self::$method($value);
      }
    }

   return self::$app;
  }

  public static function USERNAME(){return self::$name;}
  public static function PASSWORD(){return self::$password;}
  public static function MAIL(){return self::$mail;}
  public static function CODE(){return self::$code;}
  public static function PROFILE(){return self::$profile;}
  public static function USER_ID(){return self::$id;}
  public static function GENDER(){return self::$gender;}
  public static function IP(){return self::$ip;}

  public static function SET_CONNECTING($x=""){}
  public static function SET_NAME($x="")
  {
    if ($x!="") {
      self::$name=$x;
    }
  }
  public static function SET_EMAIL($x="")
  {
    if ($x!="") {
      self::$mail=$x;
    }
  }

  public static function SET_PASSWORD($x="")
  {
    if ($x!="") {
      self::$password=$x;
    }
  }
  public static function SET_IP($x="")
  {
    if ($x!="") {
      self::$ip=$x;
    }
  }
  public static function SET_PASSWORD12($x="")
  {
    if ($x!="") {
      self::$password=$x;
    }
  }

  public static function SET_PASSWORD0($x="")
  {
    if ($x!="") {
      self::$password0=$x;
    }
  }

  public static function SET_GENDER($x)
  {
      self::$gender=$x;
  }
  public static function SET_CODE($x)
  {
      self::$code=$x;
  }
  public static function SET_ID($x)
  {
      self::$id=$x;
  }


  public static function SET_PROFILE($x)
  {
    if ($x!="") {
      self::$profile=$x;
    }else {
      self::$profile="default.png";
    }
  }
  public static function SET_AVATAR($x)
  {
    if ($x!="") {
      self::$profile=$x;
    }else {
      self::$profile="default.png";
    }
  }

}



 ?>
