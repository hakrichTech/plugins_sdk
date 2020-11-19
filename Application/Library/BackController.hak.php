<?php
namespace Library;
/**
 *
 */
 use Library\Application as app;
 use Library\Details as DataAnalyse;
 use \Library\ApplicationComponents as b;
 use HTML as HT;

abstract class BackController extends b
{

  protected static $action = '';
  protected static $module = '';
  protected static $page = null;
  protected static $view = '';
  protected static $Keywords = 'hakrichapp, Hakrich, programmers, Developer, Technology';
  protected static $appCont;
  protected static $headerImageType="image/jpeg";
  protected static $headerImage="https://www.hakrichapp.tech/hakrich-team.jpg";
  protected static $description="
  <sp>Hakrich Application Manager:</sp>
   Discorver what is in mind of upcoming developers and software
   engineers by their product whether in Software Design, Development, Research, etc.
  ";
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

    self::$page::SET_CONTENT_FILE(__DIR__.'/../Hakrichapp/'.self::$app::NAME().'/Modules/'.self::$module.'/Views/'.ucfirst(self::$view).'.php');
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

 protected static function GENERATED_NEWS($data,$fun)
 {
   $html=' ';

   while ($dataArray=$data->fetch()) {
     $method=strtoupper(self::$app::$device::TYPE()).$fun;
     $html.=HT\Home::$method(self::NEWS_DETAIL($dataArray));
   }

   return $html;
 }

 protected static function NEWS_DETAIL($data)
 {
   if ($data) {
     return new DataAnalyse\PostDetails($data, self::$managers_list);
   }
   else {
     return false;
   }
 }

 protected static function SOFT_DETAIL($data)
 {
   if ($data) {
     return new DataAnalyse\Software($data, self::$managers_list);
   }
   else {
     return false;
   }
 }

 protected static function GENERATED_APPS($data,$fun)
 {
   $html='';
   while ($dataArray=$data->fetch()) {
     $method=strtoupper(self::$app::$device::TYPE()).$fun;
     $html.=HT\Home::$method(self::SOFT_DETAIL($dataArray));
   }
   if ($html=='' && $fun=="_APP") {
     $html=<<<END

     <div class="notFOUND">
       Sorry!! No apps found for this category in our server.
     </div>

     END;
   }


   return $html;
 }

 public static function TOP_APPLICTION()
 {
   self::$page::ADD_VAR('top_apps',self::GENERATED_APPS(self::$software_Manager::TOP_SOFT(),"_TOP_APP"));

 }

 protected static function HOME_APPLICATION()
 {

   self::$page::ADD_VAR('home_apps',self::GENERATED_APPS(self::$software_Manager::HOME_APPS(),"_HOME_APP"));

 }

 protected static function APPLICATION_LIST($app=" ", $data=" ")
 {
     switch ($app) {
       case 'new':
         self::$page::ADD_VAR('appss',self::GENERATED_APPS(self::$software_Manager::HOME_APPS(),"_APP"));
         break;
       case 'categ':
       // self::$page::ADD_VAR('appss',$data);
         self::$page::ADD_VAR('appss',self::GENERATED_APPS(self::$software_Manager::CATEG(12,$data),"_APP"));
         break;

       default:
         self::$page::ADD_VAR('appss',self::GENERATED_APPS(self::$software_Manager::TOP_SOFT(12),"_APP"));
         break;
     }


 }


 public static function HOME_NEWS()
 {

   self::$page::ADD_VAR('article_suggest',self::GENERATED_NEWS(self::$news_Manager::NEWS_HOME(),"_ARTICLES_SUGGEST"));
   self::$page::ADD_VAR('article_top',self::GENERATED_NEWS(self::$news_Manager::NEWS_HOME_SUGGEST(),"_ARTICLES_TOP"));

 }


}

 ?>
