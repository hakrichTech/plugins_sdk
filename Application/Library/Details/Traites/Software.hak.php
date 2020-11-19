<?php
namespace Library\Details\Traites;
/**
 *
 */
trait Software
{
  protected static $userid;
  protected static $idunic;
  protected static $name;
  protected static $description;
  protected static $created;
  protected static $categ;
  protected static $visited;
  protected static $avatar;
  protected static $feature;
  protected static $version;
  public static function USER_ID(){return self::$userid;}

  private static function stringCut($n)
 {
 $a=strlen(self::$name);
 $string=array();
 if ($a>$n) {
   $b=$n-3;
 for ($i=0; $i < $b; $i++) {
   $string[]=self::$name[$i];
 }
 $string[]="...";
 }else {
   $string[]=self::$name;
 }
 return join($string);
 }

 public static function SET_VERSION($v)
 {
   self::$version=$v;

 }
 public static function SET_IDUNIC($value)
 {
  self::$idunic=$value;
 }

 public static function VERSION()
 {
   return self::$version;
 }
 public static function AVATAR()
 {
   return self::$avatar;
 }

 public static function FEATURE()
 {
   return self::$feature;
 }
 public static function SET_AVATAR($x)
 {
   self::$avatar=$x;
 }

 public static function SET_FEATURE($x)
 {
   self::$feature=$x;
 }

  public static function UNIQ(){return self::$idunic;}
  public static function NAME($x=null){
    if (is_int($x)) {
      return self::stringCut($x);
    }elseif (is_string($x)) {
      return self::$url;
    }else{

      return self::$name;
    }
  }
  public static function SET_NAME(string $x){
    if ($x!="null") {
      self::$name=$x;
    }
  }
  public static function VISITED(){return self::$visited;}
  public static function CREATED(){return self::$created;}
  public static function CATEGORY(){return self::$categ;}
  public static function DESCRIPTION(){return self::$description;}

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
  public static function SET_DERH(string $x){
    if ($x!="null") {
    self::$created=$x;
  }
  }

  public static function SET_DESCRIPT(string $x){
    if ($x!="null") {
    self::$description=$x;
  }



  }


}

 ?>
