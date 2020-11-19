<?php
namespace Library;
/**
 *
 */
 use \Library\Application as app;
 use \Library\Details as DataAnalyse;
 use \Library\ApplicationComponents as b;
abstract class BackControllerAjax extends b
{
  protected static $app;
  protected static $action;
  protected static $out;
  function __construct(app $app,$module,$action){
    parent::__construct($app);
    self::$app=$app;
    self::$action=$action;
  }
  abstract public static function EXECUTE();
  abstract public static function OUT_PUT();

  public static function SOFT_DETAIL($data)
  {
    if ($data) {
      return new DataAnalyse\Software($data, self::$managers_list);
    }
    else {
      return false;
    }
  }



   public static function NEWS_DETAIL($data)
   {
     if ($data) {
       return new DataAnalyse\PostDetails($data, self::$managers_list);
     }
     else {
       return false;
     }
   }


}

 ?>
