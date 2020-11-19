<?php
namespace Library\Details;
/**
 *
 */
 use \Library\Details\Traites\Club as u;
class ClubDetails
{
  protected static $app;
  use u;
  function __construct($x="null")
  {
    self::$app=$this;
    if ($x!="null") {
      if(is_array($x)){
        self::userSyn($x);
      }else {
        return false;
      }
    }


  }
  private static function userSyn(array $x)
  {
    self::$id=$x['idclub'];
    self::$creator=$x['iduser'];
    self::$clubname=$x['clubnaira'];
    self::$descr=$x['description'];
    self::$Photo=$x['avatar'];
    self::$cover=$x['cover'];
    self::$categ=$x['category'];
    self::$config=$x['configs'];
    self::$created=$x['createdwhen'];
    self::$update=$x['lastupdated'];
  }
 public static function MODIF(array $x)
 {
   self::SET_CLUB($x['clubname']);
   self::SET_CATEG($x['clubCateg']);
   self::SET_AVATAR($x['avatar']);
   self::SET_COVER($x['cover']);
   self::SET_CONFIG($x['config']);
   self::SET_UPDATED($x['update']);
   self::SET_DESCRI($x['decription']);

   return self::$app;
 }
}


 ?>
