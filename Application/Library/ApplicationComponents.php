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
   protected static $managers = null;
   protected static $user_Manager;
   protected static $software_Manager;
   protected static $search_Manager;
   protected static $news_Manager;
   protected static $managers_list;



  function __construct(Application $app)
  {
    self::$app=$app;
    self::$a=$this;
    self::$managers = new \Library\Manager\Managers('PDO',\Library\PDOFactory::GET_MYSQL_CONNECTION());
    self::$user_Manager = self::$managers::GET_MANAGER_OF('User');
    self::$news_Manager = self::$managers::GET_MANAGER_OF('News');
    self::$software_Manager = self::$managers::GET_MANAGER_OF('Software');
    self::$search_Manager = self::$managers::GET_MANAGER_OF('Search');
    self::$managers_list = array(
      'user'=>self::$user_Manager,
      'new'=>self::$news_Manager,
      'software'=>self::$software_Manager,
      'url'=>self::$app::$url
    );
  }


  protected static function APP()
  {
    return self::$app;
  }

}



 ?>
