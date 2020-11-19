<?php
namespace Library\Postdata\Verification\postdataTr;
use Library\Postdata\Verification\MailVerification\MailVerification as mail;
/**
 *
 */
trait user
{
  protected static $error=0;
  public static function password($x="none",$y="none")
  {
    if ($x=="none"&&$y=="none") {
      $x=self::$password;
      $y=self::$password0;
    }
    if ($x!=""&&$y!="") {
      if ($x==$y) {
        if (self::passCheck($y)) {
          self::$error=0;
          return 1;
        }else {
          self::$error="Oops! Password is invalid is not contain spacial Characters.";

          return 0;
        }
      }else {
        self::$error="Oops! Password is not match.";
        return 0;

      }
    }else {
      self::$error="Oops! Password filed is empty.";
      return 0;
    }

  }

public static function Email()
{
  if (self::$mail!="") {
    $mail=new mail(self::$mail);
     $mail::Checkvalidity(mail::CHECK_VALIDITY);
     if ($mail::response_return_by_validity()==mail::VALIDE) {
       self::$error=0;
      return 1;
    }else {
      self::$error=$mail::response_return_by_validity();

      return 0;
    }
  }else {
    self::$error="Oops! Email filed is empty.";

    return 0;
  }


}
 public static function passCheck($x)
 {
  if (strlen($x)>=6) {
    if (preg_match("#[!$()%\.~`:>;&'<*+/\#=},?^_{|@]#",$x)) {
      self::$error=0;
    return 1;
  }else {
    self::$error="Oops! Password is invalid is not contain spacial Characters.";
    return 0;
  }
  }else {
    self::$error="Oops! Password legnth must be 6  character and above.";

  return 0;
  }
 }

 public static function postdataReturn()
 {

   if (self::Email()&&self::password()) {
     if (self::$error==0) {
       return array('name'=>self::$name,'email'=>self::$mail,'password12'=>sha1(self::$password), 'gender'=>"", 'profile'=>"");
     }else {
       return self::$error;
     }
   }else {
     return self::$error;

   }

 }

 public static function ARRAGMENT_FILES(array $x)
 {
   $y='none';
   if (isset($x['name']) && !empty($x['name'])) {
     if ($x['size']>0) {
     $ext=strtolower(pathinfo($x['name'], PATHINFO_EXTENSION));
     $filename=sha1('Cl'.uniqid().'uB.');
     // move_uploaded_file($x['tmp_name'],$fileSave0.$filename);
     $y=[$filename, $x['tmp_name']];
   }
   }
   return $y;

 }

}

 ?>
