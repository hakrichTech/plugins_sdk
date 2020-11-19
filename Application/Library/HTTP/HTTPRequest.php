<?php
namespace Library\HTTP;

/**
 *
 */
 use \Library\Application as Application;

class HTTPRequest
{
  private static $app;
  protected static $req;

public function __construct(Application $app)
{
  self::$app=$app;
}
public static function COOKIE_DATA($x){return isset($_COOKIE[$x])? $_COOKIE[$x]: null;}
public static function COOKIE_EXISTS($x){return isset($_COOKIE[$x]);}
public static function GET_DATA($x){return isset($_GET[$x])? $_GET[$x]: false;}
public static function GET_EXISTS($x){return isset($_GET[$x]);}
public static function POST_DATA($x){return isset($_POST[$x])? $_POST[$x]: null;}
public static function POST_EXISTS($x){return isset($_POST[$x]);}
public static function POST_(){return $_POST;}
public static function REQ(string $x):void
{
  if (self::GET_EXISTS($x)) {
    self::$req=$self::GET_DATA($x);
  }
}
public static function FILE_DATA($x){return isset($_FILES[$x])? $_FILES[$x]: null;}
public static function FILE_EXISTS($x){return isset($_FILES[$x]);}
public static function METHOD(){return $_SERVER['REQUEST_METHOD'];}
public static function REQUEST_URL(){return $_SERVER['REQUEST_URI'];}

}

 ?>
