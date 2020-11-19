<?php
namespace Library\Details\Traites;
/**
 *
 */
 use Library\Details as Detail;
 
trait Soft
{
  protected static $uploded_by;
  protected static $version;
  protected static $requirement;
  protected static $contact;
  protected static $url;
  protected static $updated;
  protected static $derh;

  public static function UPLOADED_BY(){return self::$uploded_by;}
  public static function VERSION(){return self::$version;}
  public static function REQUIEMENT(){return self::$requirement;}
  public static function CONTACT(){return self::$contact;}
  public static function URL(){return self::$url;}
  public static function UPDATED(){return self::$updated;}
  public static function TIME_UPLOAD(){return self::$derh;}

  public static function SET_REQUIREMENT($x)
  {
    self::$requirement=$x;
  }

  public static function SET_CONTACT($x)
  {
    self::$contact=$x;
  }

  public static function SET_VERSION(string $x){
    if ($x!="null") {
      self::$version=$x;
    }
  }
  public static function SET_UPDATED(string $x){
    if ($x!="null") {
      self::$updated=$x;
    }
  }

  public static function SET_URL(string $x){
    if ($x!="null") {
    self::$url=$x;
   }
  }
  public static function SET_DERH($x){
    if ($x!="null") {
    self::$derh=$x;
  }
  }

  public static function SET_UPLOADED_BY(string $x){
    if ($x!="null") {

      $data=self::$managers['user']::UNIQ_($x);
      if ($data) {
        $obj=new Detail\UserDetails($data, self::$managers);
        self::$uploded_by=$obj;
      }
  }

  }


}

 ?>
