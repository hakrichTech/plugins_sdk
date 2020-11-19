<?php

namespace Library\Models;

/**
 *
 */
 use \Library\Application as app;
 use \HTML as hml;
 use \Library\Details as Det;
class SoftwareManager_PDO extends SoftwareManagers{
  protected static $pdo;
  protected static $post;
  protected static $data=array();
  function __construct(\PDO $app)
  {
    self::$pdo=$app;
    self::$post=$this;
  }


public static function TOP_SOFT( $end=20)
{


  $database_requet=self::$pdo->query('SELECT * FROM Software ORDER BY visited DESC LIMIT 0, '.$end);

    return $database_requet;

}


public static function CATEG( $end=20, $categ)
{

  $database_requet=self::$pdo->query('SELECT * FROM Software WHERE categ="'.$categ.'" ORDER BY visited DESC LIMIT 0, '.$end);

    return $database_requet;

}


public static function HOME_APPS()
{
  $database_requet=self::$pdo->query('SELECT * FROM Software ORDER BY visited ASC LIMIT 0, 20');

    return $database_requet;
}

public static function SOFTWARE_APP($uniq)
{
  $sql="SELECT * FROM Software WHERE idunic='";
  $sql.=$uniq;
  $sql.="'";
  $requete=self::$pdo->query($sql);

  if (($result=$requete->fetch())) {
    return $result;
  }
  else {
    return false;
  }

}

public static function SOFTWARE(string $uniq, $start=-1, $end=-1, $categ="")
{

  $sql="SELECT * FROM Sofware WHERE idunic='";
  $sql.=$uniq;
  $sql.="' AND ";
  $sql.=" categ='";
  $sql.=$categ;
  $sql.="'";
  if ($start != -1 || $end != -1)
    {
      $sql.=' LIMIT '.(int) $end.' OFFSET '.(int) $start;
    }
     $requete=self::$pdo->query($sql);

  if (($result=$requete->fetch())) {
    return $requete->fetch();
  }
  else {
    return false;
  }

}

public static function SOFTWARE_CHECK(string $uniq, $categ=""){
  $boleen=self::SOFTWARE($uniq, -1, -1, $categ);
  if ($boleen) {
    return $boleen;
  }else {
    return 0;
  }
}

 public static function ANDROID_APK_FILE($data){

   $re=self::$pdo->query('SELECT * FROM apk_soft WHERE idunic="'.$data.'"');

   if (($result=$re->fetch())) {
     return $result;
   }else {
     return false;
   }
 }



  public static function WINDOWS_APPLICATION_FILE(array $data){

    $re=self::$pdo->query('SELECT * FROM win_soft WHERE idunic="'.$data['idunic'].'"');

    if (($result=$re->fetch())) {
      return $result;
    }else {
      return false;
    }

  }


  public static function APPLE_APPLICATION_FILE(array $data){

    $re=self::$pdo->query('SELECT * FROM apple_soft WHERE idunic="'.$data['idunic'].'"');


              if (($result=$re->fetch())) {
           return $result;
          }else {
           return false;
          }
  }


  public static function BLACK_APPLICATION_FILE(array $data){

    $re=self::$pdo->query('SELECT * FROM black_soft WHERE idunic="'.$data['idunic'].'"');

              if (($result=$re->fetch())) {
           return $result;
          }else {
           return false;
          }
  }

public static function DELETE(string $x)

{


}

 public static function GET_SOFTWARE_LIST(string $uniq, $start=-1, $end=-1, $categ){

  $data=self::SOFTWARE($uniq,$start,$end,$categ);
  if ($data) {
    return $data;
  }else {
    return 0;
  }

 }




}

?>
