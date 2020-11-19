<?php

namespace Library\Models;

/**
 *
 */
 use \Library\Application as app;
 use \HTML as hml;
 use \Library\Details as Det;
class NewsManager_PDO extends NewsManagers{

  protected static $pdo;
  protected static $post;
  protected static $data=array();
  function __construct(\PDO $app)
  {
    self::$pdo=$app;
    self::$post=$this;
  }

  public static function NEWS_HOME()
  {
    $database_requet=self::$pdo->query('SELECT * FROM newsArticle ORDER BY id DESC LIMIT 0,10');
    return $database_requet;

  }

  public static function NEWS_HOME_SUGGEST()
  {
    $data_news=false;
    $database_requet=self::$pdo->query('SELECT * FROM newsArticle ORDER BY visited DESC LIMIT 0, 10');


      return $database_requet;
  }


}


 ?>
