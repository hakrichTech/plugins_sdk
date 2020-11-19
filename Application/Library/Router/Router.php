<?php
namespace Library\Router;
/**
 *
 */
 use \Library\Application as app;
class Router
{
 private static $routes=array();
 private static $app;
function __construct(app $app)
{
  self::$app = $app;
}

public static function ADD_PATH(Route $route)
{
   self::$routes=$route;
}

public static function PATH()
{
  return self::$routes::URL();
}
public static function GET_PATH($url)
{
  $boolen=0;
  $url0="";$ext="";
  @list ($url0, $ext) = explode("." , $url);
    if (self::$routes::MATCH($url0)) {
      $boolen=1;
    }

 return $boolen;

}

public static function SET_PATH(\DOMDocument $file, $url, $id, $module="null", $action="null", $names, $values, $fi)
{
  $routes=$file->getElementsByTagName('routes');
  $route=$file->createElement( "route" );

  $mod=$file->createAttribute('module');
  $mod->value=$module;

  $ur=$file->createAttribute('url');
  $ur->value=$url;

  $d=$file->createAttribute('id');
  $d->value=$id;


  $va=$file->createAttribute('vars');
  $va->value=implode(",",$names);

  $val=$file->createAttribute('value');
  $val->value=implode(",",$values);

  $act=$file->createAttribute('action');
  $act->value=$action;

  $route->appendChild($mod);
  $route->appendChild($d);
  $route->appendChild($va);
  $route->appendChild($val);
  $route->appendChild($act);


  $routes[0]->appendChild($route);
  $file->appendChild( $routes[0] );


  $file->save(__DIR__.'/../../'.self::$app::NAME().'/Config/'.$fi.'.xml');


}

}

 ?>
