<?php
namespace Library;

/**
 *
 */

 use \Library\HTTP as http;
 use \Library\Router\Route as PATH_;

 $dir    = __DIR__.'/../../../../../'.$_ENV['APP_CONFIG_SIDE_URL'].$_ENV['APP_CONFIG_SIDE'].'/Modules';

 function include_Dir($x)
 {
   $files = scandir($x);
   foreach ($files as $file) {
     if ($file!='.' && $file!="..") {
       include $x.'/'.$file;
     }
   }
 }

 include_Dir($dir);


 abstract class Application
 {
     protected static $httpRequest;
     protected static $httpResponse;
     protected static $name;
     public static $url;
     protected static $out_put='f';
     private static $router;
     private static $app;
     private static $user;
     public static $device;
     private static $DatabaseManagers;
     private static $manager=array();
     private static $config;
     protected static $outPut;
     protected static $path=0;

     public function __construct(\DatabaseManagers_space\DatabaseManagers $app)
     {
        switch ($_ENV['APP_HOST_RUN']) {
          case 'localhost':
              switch ($_ENV['APP_LOCALHOST_DEVICE']) {
                case 'computer':
                    self::$url = $_ENV['APP_LOCALHOST_COMPUTER'];
                  break;
                case 'mobile':
                    self::$url = $_ENV['APP_LOCALHOST_MOBILE'];
                  break;
                default:
                  self::$url = $_ENV['APP_LOCALHOST_COMPUTER'];
                  break;
              }
            break;
         case 'server':
             self::$url = $_ENV['APP_SERVER_URL'];
           break;
          default:
            self::$url = $_ENV['APP_SERVER_URL'];
            break;
        }

         self::$DatabaseManagers=$app;
         self::$name=' ';
         self::$app=$this;
         self::$device=new \Library\DeviceDetector();
         self::$user=new \Library\User\User($this);
         self::$httpRequest=new http\HTTPRequest($this);
         self::$outPut=new \Library\OutPut($this);
         self::$config=new \Library\Config\Config($this);
         self::$httpResponse=new http\HTTPResponse($this);
         self::$router=new \Library\Router\Router(self::$app);




         foreach ($app::MANAGER() as $key) {

           $manger = new \DatabaseManagers_space\Manager\Managers($_ENV['APP_DB_CONNECTION_API'], \DatabaseManagers_space\PDOFactory::GET_MYSQL_CONNECTION());
           self::$manager[$key] = $manger::GET_MANAGER_OF($key);
         }
     }
     protected static function ADD_ROUTE(PATH_ $route)
     {
         self::$router::ADD_PATH($route);
     }



     public static function GET_CONTROLLER()
     {


         $routes=simplexml_load_file(__DIR__.'/../../../../../'.$_ENV['APP_CONFIG_SIDE_URL'].self::NAME().'/Config/siteMap.xml')->route;
         $vars=array();
         $vls=array();

         for ($i=0; $i < count($routes); $i++) {
             $vars=array();
             $vls=array();

             if (isset($routes[$i]['vars'])) {
                 $vars = explode(',', $routes[$i]['vars']);
             }
             if (isset($routes[$i]['value'])) {
                 $vls = explode(',', $routes[$i]['value']);
             }
             $PATH_TMP=new PATH_((string) $routes[$i]['url'], (string) $routes[$i]['module'], (string) $routes[$i]['action'], $vars, $vls, $routes[$i]['id']);
             self::ADD_ROUTE($PATH_TMP);
             if (self::$router::GET_PATH(self::HTTP_REQUEST()::REQUEST_URL())) {
                 self::$path=$PATH_TMP;
                 break;
             }
             elseif (self::$manager['Path']::ARTICLE(self::HTTP_REQUEST()::REQUEST_URL())) {
                 self::$path=new PATH_((string) self::HTTP_REQUEST()::REQUEST_URL(), "Article", "View", $vars, $vls, "");
                  break;
             }
         }


         if (self::$path) {
             if (self::$path::MODULE()=="Profile") {
                 @list($empty, $sineLog, $get)=explode("/", self::HTTP_REQUEST()::REQUEST_URL());
                 @list($nom, $postnom, $code)=explode("_", $get);
                 $username=implode(" ", [$nom,$postnom]);
                 $_GET['username']=$username;
                 $_GET['code']=$code;
             }
             $_GET = array_merge($_GET, self::$path::VARS_NAMES());
             $controllerClass = '\\'.ucfirst(self::$path::MODULE()).'Controller';
             return  new $controllerClass(self::$app, self::$path::MODULE(), self::$path::ACTION());
         } else {
             self::HTTP_RESPONSE()::REDIRECT_404();
         }
     }




     public static function CURRENTLY_USER()
     {
         if (self::$user::IS_AUTH()){
             $manager0=self::$manager['User'];
             return new \Library\Details\UserDetails($manager0::UNIQ_(self::$user::GET('iduser')));
         } else {
             return false;
         }
     }
     abstract public static function RUN();
     public static function HTTP_REQUEST()
     {
         return self::$httpRequest;
     }
     public static function HTTP_RESPONSE()
     {
         return self::$httpResponse;
     }
     public static function NAME()
     {
         return self::$name;
     }

     public static function MANAGER()
     {
         return self::$manager;
     }
     public static function USER()
     {
         return self::$user;
     }
     public static function OUTPUT_0()
     {
         return self::$outPut;
     }
     public static function CONFIG()
     {
         return self::$config;
     }
     public static function HEADER_DATA($x="")
     {
         if ($x=="MSG") {
             return self::$config::APPLICATION_CONFIG();
         }
     }
 }
