<?php

namespace Library\Details;
/**
 *
 */
 use \Library\Details\Traites\Post as u;
class PostDetails extends \Library\Entity
{
  use u;
  function __construct($x, $manager)
  {
    parent::__construct();
    self::$app=$this;
    if(is_array($x) && is_array($manager)){
      self::$managers=$manager;
      self::SYNC($x);
    }else {
      return false;
    }

  }

  public static function url()
  {
    return self::$managers['url'];
  }

  public static function SET_SEARCHCODE($value='')
  {
    // needed
  }

  public static function SYNC(array $x)
  {
    foreach ($x as $key=>$value) {
      $method = 'SET_'.strtoupper($key);
      if (is_callable(array(self::$app, $method))){
        self::$method($value);
      }
      self::$method($value);

    }

  }

}
 ?>
