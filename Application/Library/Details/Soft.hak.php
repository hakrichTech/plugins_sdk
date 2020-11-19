<?php


namespace Library\Details;
/**
 *
 */
 use \Library\Details\Traites\Soft as u;
class Soft extends \Library\Entity
{
  protected static $app;
  protected static $ios;
  protected static $error=false;
  use u;
  function __construct($x=array(), $MA, $op)
  {
    parent::__construct();
    self::$managers=$MA;
    if ($x) {
      self::SYNC($x);
    }else {
      self::$error=True;
    }
    self::$app=$this;
    self::$ios=$op;


  }

  public static function IS_ERROR()
  {
    return self::$error;
  }
  public static function SYNC(array $x)
  {
    foreach ($x as $key=>$value) {
      $method = 'SET_'.strtoupper($key);
      if (is_callable(array(self::$app, $method))){
        self::$method($value);
      }
    }

  }

  public static function SCREENSHOT()
  {
    return array(sha1(self::$ios."1"),sha1(self::$ios."2"),sha1(self::$ios."3"),sha1(self::$ios."4"),sha1(self::$ios."5"));
  }

}

 ?>
