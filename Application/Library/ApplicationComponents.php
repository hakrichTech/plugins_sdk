<?php
namespace Library;
/**
 *
 */
 use \Library\Session as U;
abstract class ApplicationComponents extends U
{
   protected static $app;
   protected static $userId='';
   protected static $a;
   public static $managers_list;



  function __construct(Application $app)
  {
    parent::__construct();
    self::$app=$app;
    self::$a=$this;
    self::$managers_list = $app::MANAGER();
    self::$managers_list['url'] = $app::$url;
  }


  protected static function APP()
  {
    return self::$app;
  }

}



 ?>
