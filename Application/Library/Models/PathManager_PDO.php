<?php

namespace Library\Models;

/**
 *
 */
 use \Library\Application as app;

class PathManager_PDO extends PathManagers{

  protected static $pdo;
  protected static $post;
  protected static $data=array();
  function __construct(\PDO $app)
  {
    self::$pdo=$app;
    self::$post=$this;
  }

  public static function ARTICLE(string $PATH)
  {
    $database_requet=self::$pdo->query('SELECT * FROM newsArticle WHERE articleUrl="'.sha1($PATH).'"');
    if ($database_requet->fetch()) {
      return 1;
    }else {
      return 0;
    }
  }




}


 ?>
