<?php
namespace Library;
/**
 *
 */
 use \Library\Application as app;
 use \Library\ApplicationComponents as b;
 use HTML as HT;

abstract class BackController extends b
{

  protected static $action = '';
  protected static $module = '';
  protected static $page = null;
  protected static $view = '';
  protected static $Keywords = $_ENV['APP_HEADER_KEYWORDS'];
  protected static $appCont;
  protected static $headerImageType=$_ENV['APP_HEADER_IMAGE_TYPE'];
  protected static $headerImage=$_ENV['APP_HEADER_IMAGE'];
  protected static $description=$_ENV['APP_HEADER_DESCRIPTION'];
  function __construct(app $app, $module, $action)
  {
    parent::__construct($app);
    self::$page = new \Library\Page\Page($app);
    self::$appCont=$this;
    self::SET_MODULE($module);
    self::SET_ACTION($action);
    self::SET_VIEW($action);
  }

  abstract public static function EXECUTE();
  public static function PAGE()
  {
    return self::$page;
  }
  public static function SET_MODULE(string $module)
  {
    if (empty($module)){
      throw new \InvalidArgumentException('Le module doit être une chaine de caractères valide');
    }
    self::$module=$module;
  }

  public static function SET_ACTION(string $action)
  {
    if (empty($action)){
      throw new \InvalidArgumentException('Le action doit être une chaine de caractères valide');
    }
    self::$action=$action;
  }

  public static function SET_PAGE_DESCRIPTION($string)
  {
    self::$description=$string;
  }

  public static function SET_PAGE_KEYWORDS($string)
  {
    self::$Keywords=$string;
  }

  public static function SET_IMAGE_HEADER_TYPE($image,$type)
  {
    self::$headerImage=$image;
    self::$headerImageType=$type;

  }

  public static function PAGE_DESCRIPTION()
  {
    self::$page::ADD_VAR('Description',self::$description);
  }
  public static function PAGE_KEYWORDS()
  {
    self::$page::ADD_VAR('keywords',self::$Keywords);
  }
  public static function PAGE_IMAGE()
  {
    self::$page::ADD_VAR('imageHeader',self::$headerImage);
    self::$page::ADD_VAR('typeHeader',self::$headerImageType);
  }

  public static function SET_VIEW(string $view)
  {
    if (empty($view)){
      throw new \InvalidArgumentException('Le view doit être une chaine de caractères valide');
    }
    self::$view=$view;
    $viewDir=__DIR__.'/../../../../../Views/'.self::$app::NAME().'/'.self::$module;
    if (is_dir($viewDir)) {
      fopen($viewDir.'/'.ucfirst(self::$view).'.php',"a+");
      self::$page::SET_CONTENT_FILE($viewDir.'/'.ucfirst(self::$view).'.php');
    }
    else {
      mkdir($viewDir,"7644");
      fopen($viewDir.'/'.ucfirst(self::$view).'.php',"a+");
      self::$page::SET_CONTENT_FILE($viewDir.'/'.ucfirst(self::$view).'.php');

    }
  }
 protected static function HEADER()
 {
  self::PAGE_DESCRIPTION();
  self::PAGE_IMAGE();
  self::PAGE_KEYWORDS();
  self::$page::ADD_VAR('urlpage',self::$app::HTTP_REQUEST()::REQUEST_URL());

 }
 public static function EXECUTE_AUTHO(){
   self::$page::ADD_VAR('auth','true');

 }

 public static function RUN_DEVICE($Index)
 {
   switch (self::$app::$device::TYPE()) {
     case 'mobile':
         self::$page::ADD_VAR('device',self::$app::$device::TYPE());
         $method = 'EXECUTE_'.strtoupper(self::$action);
         if (!is_callable(array($Index, $method))){
             throw new \RuntimeException('Action "'.self::$action.'"n\'est pas définie sur ce module');
          }else {
              $Index::$method(self::$app::HTTP_REQUEST());
              self::$page::ADD_VAR('mod','');
          }
       break;

       case 'computer':
           self::$page::ADD_VAR('device',self::$app::$device::TYPE());
           $method = 'EXECUTE_'.strtoupper(self::$action);
           if (!is_callable(array($Index, $method))){
               throw new \RuntimeException('Action "'.self::$action.'"n\'est pas définie sur ce module');
            }else {
                $Index::$method(self::$app::HTTP_REQUEST());
                self::$page::ADD_VAR('mod','');
            }
         break;

     default:
       self::$app::HTTP_RESPONSE()::REDIRECT_401();
       break;
   }
 }














}

 ?>
