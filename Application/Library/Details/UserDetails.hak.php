<?php
namespace Library\Details;
/**
 *
 */
 use \Library\Details\Traites\User as u;
class UserDetails extends \Library\Entity
{
  use u;
  function __construct(array $x=array(), $manager)
  {
    parent::__construct();
    self::$app=$this;
    self::$managers=$manager;
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

 public static function USER($d="")
 {
   $data=array();
   $data[$d."_name"]=self::$fullName;
   $data[$d."_code"]=self::$userCode;
   $data[$d."_userId"]=self::$userid;
   $data[$d."_id"]=self::$id;
   $data[$d."_mail"]=self::$mail;
   $data[$d."_profile"]=self::$profilePhoto;
   $data[$d."_gender"]=self::$gender;
   return $data;
 }
}

 ?>
