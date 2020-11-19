<?php

namespace Library\Models;

/**
 *
 */
 use \Library\Application as app;
 use \HTML as hml;
 use \Library\Details as Det;
class SearchManager_PDO extends SearchManagers{

  protected static $pdo;
  protected static $queri;
  protected static $post;
  protected static $managers;
  protected static $news_Manager;
  protected static $software_Manager;
  protected static $user_Manager;
  protected static $data=array();
  function __construct(\PDO $app)
  {
    self::$pdo=$app;
    self::$post=$this;
    self::$managers = new \Library\Manager\Managers('PDO',\Library\PDOFactory::GET_MYSQL_CONNECTION());
    self::$user_Manager = self::$managers::GET_MANAGER_OF('User');
    self::$news_Manager = self::$managers::GET_MANAGER_OF('News');
    self::$software_Manager = self::$managers::GET_MANAGER_OF('Software');

  }

  public static function SEARCHING($queri)
  {
    self::$queri=$queri.'+';
    self::$data=array();

    return self::$post;
  }
  public static function CHECK($data)
  {
    $data=$data->fetch();
    if ($data) {
      return 1;
    }else {
      return ;
    }
  }

  public static function APK()
  {

    $database_requet=self::$pdo->query('SELECT * FROM Software WHERE name REGEXP "'.self::$queri.'" ORDER BY visited DESC');
    // if (self::CHECK($database_requet)) {
      while ($req=$database_requet->fetch()) {
        $req['searchCode']=1;
        $int=(int) $req['id'];

        if (isset(self::$data['result'][$int])) {
          // code...
        }else {

        $uni=self::$software_Manager::ANDROID_APK_FILE($req['idunic']);
        if($uni){
          $req['version']=$uni['version'];
        }else {
          $uni=self::$software_Manager::WINDOWS_APPLICATION_FILE($req);
          if($uni){
            $req['version']=$uni['version'];
          }else {
            $uni=self::$software_Manager::APPLE_APPLICATION_FILE($req);
            if($uni){
              $req['version']=$uni['version'];
            }else {
              $uni=self::$software_Manager::BLACK_APPLICATION_FILE($req);
              if($uni){
                $req['version']=$uni['version'];
              }else {
                $req['version']="undefine";

              }
            }
          }
        }
        self::$data['result'][$int]=$req;
        self::$data['id'][]=$int;
      }

      }

   // }
      return self::$post;



  }

  public static function ARTICLE()
  {
    $database_requet=self::$pdo->query('SELECT * FROM newsArticle WHERE articleName REGEXP "'.self::$queri.'" ORDER BY visited DESC');

    while ($req=$database_requet->fetch()) {
      $int=(int) $req['id'];

      if (isset(self::$data['result'][$int])) {

      }else {
        $req['searchCode']=2;
        self::$data['result'][$int]=$req;
        self::$data['id'][]=$int;
      }

    }

    return self::$post;

  }

  public static function OUTPUT()
  {
    return self::$data;
  }


}


?>
