<?php
namespace Library;
/**
 *
 */
use \Library\User as U;
abstract class ApplicationComponents
{
   protected static $app;
   protected static $userId='';
   protected static $a;
   protected static $managers_list;



  function __construct(Application $app)
  {
    self::$app=$app;
    self::$a=$this;
    self::$managers_list = $app::MANAGER();
  }


  protected static function APP()
  {
    return self::$app;
  }

}



 ?>
