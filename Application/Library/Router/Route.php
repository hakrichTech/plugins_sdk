<?php
namespace Library\Router;
/**
 *
 */
class Route
{

      protected static $action;
      protected static $module;
      protected static $url;
      protected static $varsNames;
      protected static $id;
      protected static $vars = array();

  function __construct($url, $module, $action, array $varsNames, array $vls, $id)
  {
    self::SET_URL($url);
    self::SET_MODULE($module);
    self::SET_ACTION($action);
    self::SET_VARS_NAMES($varsNames);
    self::SET_ID($id);
    self::SET_VALUE($vls);
  }

  public static function HAS_VARS()
  {
    return !empty(self::$varsNames);
  }
  public static function MATCH($url)
  {

    if (preg_match('#^'.self::$url.'$#', $url)) {
      return true;
    }else {
      return false;
    }
  }
  public static function ACTION(){return self::$action;}
  public static function ID(){return self::$id;}
  public static function MODULE(){return self::$module;}
  public static function URL(){return self::$url;}
  public static function VARS_NAMES(){return self::$varsNames;}
  public static function VALUES(){return self::$vars;}

  public static function SET_URL(string $url)
  {
      self::$url=$url;
  }
  public static function SET_ID(string $id)
  {
      self::$id=$id;
  }


  public static function SET_MODULE( string $module)
  {
      self::$module=$module;
  }

  public static function SET_ACTION(string $action)
  {
      self::$action=$action;
  }

  public static function SET_VARS_NAMES(array $varsNames)
  {
      self::$varsNames=$varsNames;
  }

  public static function SET_VALUE(array $vars)
  {
      self::$vars=$vars;
  }
}

 ?>
