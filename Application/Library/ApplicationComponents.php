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



  function __construct(Application $app)
  {
    self::$app=$app;
    self::$a=$this;
    self::$managers = new \Library\Manager\Managers('PDO',\Library\PDOFactory::GET_MYSQL_CONNECTION());
    self::$managers_list = $app::MANAGER();
  }


  protected static function APP()
  {
    return self::$app;
  }

}



 ?>
