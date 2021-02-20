<?php
namespace BlogSystemManager;

use ObjectAddOn\AddInObject\Object_;

class BlogSystemManager extends Object_
  {

    protected static $db;
    protected static $php_errormsg;
    protected static $error;
    protected static $system_keys=array('hkm_post','hkm_post_comment','hkm_category','hkm_tag','hkm_post_tag','hkm_post_category' );

    function __construct(\PDO $db)
    {
      self::$db = $db;
    }
    public static function SETTING_BLOG_SYSTEM()
    {
        $array = array();
        for ($i=0; $i < count(self::$system_keys); $i++) { 
          $array[self::$system_keys[$i]] = file_get_contents(__DIR__.'/db/'.self::$system_keys[$i].'.sql');
        }
        return $array;
    }
      
  }
  




?>