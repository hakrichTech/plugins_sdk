<?php
namespace Sinecure\Ajax\Modules\Links;
/**
 *
 */
 use Library\BackControllerAjax as c_omponent;
 use Library\HTTP\HTTPRequest as Request;
 use Library\Application as app;
class LinksController extends c_omponent
{
  protected static $Index;

  function __construct(app $app, $module, $action){
    parent::__construct($app,$action);
    self::$Index=$this;
  }
  public static function EXECUTE_LINKS(Request $request)
  {

    if (!self::$app::USER()::HAS_FLASH() && !self::$app::USER()::IS_AUTH()) {
      self::$out="ERROR";
    }else {
     if ($request::GET_EXISTS("gt")) {
       $qt=$request::GET_DATA("gt");
       if ($qt=="null") {
         self::$app::OUTPUT_0()::SET_QUERI(self::$link_Manager::FRIENDS_LIST(self::$app::USER()::GET_FLASH(),0,3));
       }
     }elseif ($request::GET_EXISTS("st")) {
        $dat=$request::GET_DATA("st");
         self::$app::OUTPUT_0()::SET_QUERI(self::$link_Manager::STATUS_CHECKER($dat,self::$app::USER()::GET_FLASH(),self::$app::$url));
     }
    }
    self::$out=self::$app::OUTPUT_0()::DATA_RESP('json');

  }

  public static function EXECUTE()
  {
    $method = 'EXECUTE_'.strtoupper(self::$action);
    if (!is_callable(array(self::$Index, $method))){
      throw new \RuntimeException('Action "'.self::$action.'"n\'est pas définie sur ce module');
    }else {

      self::$method(self::$app::HTTP_REQUEST());
    }
  }

  public static function OUT_PUT()
  {
    return self::$out;
  }
}


 ?>
