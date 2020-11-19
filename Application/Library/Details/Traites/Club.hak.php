<?php
namespace Library\Details\Traites;
/**
 *
 */
trait Club
{
  protected static $id;
  protected static $creator;
  protected static $clubname;
  protected static $descr;
  protected static $Photo;
  protected static $categ;
  protected static $config;
  protected static $created;
  protected static $password;
  protected static $cover;
  protected static $update;

  private static function stringCut($n)
 {
 $a=strlen(self::$clubname);
 $string=array();
 if ($a>$n) {
   $b=$n-3;
 for ($i=0; $i < $b; $i++) {
   $string[]=self::$clubname[$i];
 }
 $string[]="...";
 }else {
   $string[]=self::$clubname;
 }
 return join($string);
 }

  public static function CLUB($x=null){
    if (is_int($x)) {
      return self::stringCut($x);
    }else {
      return self::$clubname;
    }
  }
  public static function CREATOR(){return self::$creator;}
  public static function ID(){return self::$id;}
  public static function CATEG(){return self::$categ;}
  public static function CREATED(){return self::$created;}
  public static function AVATAR(){return self::$Photo;}
  public static function COVER(){return self::$cover;}
  public static function CONFIG(){return self::$config;}
  public static function UPDATED(){return self::$update;}
  public static function DESCRI(){return self::$descr;}

  public static function SET_CLUB(string $x){
    if ($x!="null") {
      self::$clubname=$x;
    }
  }
  public static function SET_CATEG(string $x){
    if ($x!="null") {
      self::$categ=$x;
    }
  }
  public static function SET_CREATED(string $x){
    if ($x!="null") {
    self::$created=$x;
  }
  }
  public static function SET_AVATAR(string $x){
    if ($x!="null") {
    self::$Photo=$x;
   }
  }
  public static function SET_COVER(string $x){
    if ($x!="null") {
        self::$cover=$x;
  }
  }
  public static function SET_CONFIG(string $x){
    if ($x!="null") {
    self::$config=$x;
  }
  }
  public static function SET_UPDATED(string $x){
    self::$update=$x;
  }
  public static function SET_DESCRI(string $x){
    if ($x!="null") {
    self::$descr=$x;
  }
  }
}

 ?>
