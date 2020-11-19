<?php
namespace Library\Details;
/**
 *
 */
 use HTML as HTM;
 use \Library\Details\Traites\Software as u;
class Software extends \Library\Entity
{
  protected static $app;
  use u;
  function __construct(array $x=array(), $MA)
  {
    parent::__construct();
    self::$managers=$MA;
    self::$app=$this;
    self::SYNC($x);

  }
  public static function SYNC(array $x)
  {
    foreach ($x as $key=>$value) {
      $method = 'SET_'.strtoupper($key);
      if (is_callable(array(self::$app, $method))){
        self::$method($value);
      }
    }

  }
  public static function url()
  {
    return self::$managers['url'];
  }
 public static function SOFT($d="")
 {
   $data=array();
   $data[$d."_name"]=self::$name;
   $data[$d."_user"]=self::$userid;
   $data[$d."_idunic"]=self::$idunic;
   $data[$d."_id"]=self::$id;
   $data[$d."_version"]=self::$version;
   $data[$d."_url"]=self::$url;
   $data[$d."_description"]=self::$description;
   $data[$d."_created"]=self::$created;
   $data[$d."_updated"]=self::$updated;
   return $data;
 }


 public static function APK()
 {
   return new Soft(self::$managers['software']::ANDROID_APK_FILE(self::$idunic),self::$managers,"apk".self::$idunic);
 }
 public static function WIN_PHONE()
 {
   return new Soft(self::$managers['software']::WINDOWS_APPLICATION_FILE(self::$idunic),self::$managers,"win".self::$idunic);

 }
 public static function APPLE()
 {
   return new Soft(self::$managers['software']::APPLE_APPLICATION_FILE(self::$idunic),self::$managers,"apple".self::$idunic);

 }
 public static function BLACK()
 {
   return new Soft(self::$managers['software']::BLACK_APPLICATION_FILE(self::$idunic),self::$managers,"apple".self::$idunic);

 }
 public static function HTML($ios,$device)
 {
   $fun=$device."_APP_DETAIL";
   switch ($ios) {
     case 'apk':
       if (self::APK()::IS_ERROR()) {


         return "<div class=\"notFOUND\">No app found!</div>";
       }else {
         return HTM\Download::$fun(self::$app,"APK");
       }
       break;

     case 'win':
        if (self::WIN_PHONE()::IS_ERROR()) {
          return "<div class=\"notFOUND\">No app found!</div>";
        }else {
          return HTM\Download::$fun(self::$app,"WIN_PHONE");

        }

       break;

     case 'apple':
        if (self::APPLE()::IS_ERROR()) {
          return "<div class=\"notFOUND\">No app found!</div>";
        }else {
          return HTM\Download::$fun(self::$app,"APPLE");

        }
       break;

     case 'black':
     if (self::BLACK()::IS_ERROR()) {
       return "<div class=\"notFOUND\">No app found!</div>";
     }else {
       return HTM\Download::$fun(self::$app,"BLACK");

     }
       break;

     default:
       return "none";
       break;
   }
 }
}

 ?>
