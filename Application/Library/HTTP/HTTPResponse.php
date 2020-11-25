<?php
namespace Library\HTTP;


use \Library\Application as app;
use \Library\Page\Page as page;
use \Library\Url as URL;

class HTTPResponse extends URL
{
    protected static $page;
    protected static $ajax;


  public static function ADD_HEADER($header){header($header);}
  public static function REDIRECT($location){
    self::REDIR($location);
    }

    public static function REDIRECT_401()
       {
         self::$page = new \Library\Page\Page(self::$app);
         self::$page::SET_CONTENT_FILE(__DIR__.'/../../../../../../Errors/401.php');
         self::$page::ADD_VAR('title','401 Not Found');

         self::ADD_HEADER('HTTP/1.0 401 Not Found');
         self::SEND();

      }


  public static function REDIRECT_404()
     {
       self::$page = new \Library\Page\Page(self::$app);
       self::$page::SET_CONTENT_FILE(__DIR__.'/../../../../../../Errors/404.php');
       self::$page::ADD_VAR('title','Page Not Found');

       self::ADD_HEADER('HTTP/1.0 404 Not Found');
       self::SEND();

    }

    public static function REDIRECT_405($x)
       {
         self::$page = new \Library\Page\Page(self::$app);
         self::$page::SET_CONTENT_FILE(__DIR__.'/../../../../../../Errors/405.php');
         self::$page::ADD_VAR('titles',$x);
         self::$page::ADD_VAR('title','405 Not Found');

         self::ADD_HEADER('HTTP/1.0 404 Not Found');
         self::SEND();

      }
      public static function REDIRECT_406()
         {
           self::$page = new \Library\Page\Page(self::$app);
           self::$page::SET_CONTENT_FILE(__DIR__.'/../../../../../../Errors/406.html');
           self::$page::ADD_VAR('title','405 Not Found');

           self::ADD_HEADER('HTTP/1.0 404 Not Found');
           self::SEND();

        }

    public static function SET_PAGE(page $page){
      self::$page=$page;
    }
  public static function SET_OUTPUT($output){
    self::$ajax=$output;
  }
    public static function SEND()
    {
      exit(self::$page::GET_GENERATED_PAGE());
    }
    public static function GET_OUTPUT()
    {
      return self::$ajax;
    }
  }

 ?>
