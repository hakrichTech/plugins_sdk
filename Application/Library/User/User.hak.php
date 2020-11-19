<?php
namespace Library\User;

session_start();
/**
 *
 */
 use \Library\ApplicationComponents as appComponet;
class User extends appComponet
{

 public static function GET_ATTRIBUTE($attr)
 {
   return isset($_SESSION[$attr])? $_SESSION[$attr]: null;
 }

 public static function GET_FLASH()
 {
   if (self::HAS_FLASH()) {
     $Flash=$_SESSION['hakuqoeuiwrich'];
     return $Flash;
   }else {
     return false;
   }

 }

 public static function MAIL_BODY($x)
 {
   $m=<<<END
   Hi {$x['name']},
   <br>
   <br>

   Please use the following verification code : {$x['code']} to associate with your HakrichApp account.

   Thanks,
   Hakrich Accounts Team.
   END;

   $_SESSION['msg']=$m;
   $_SESSION['mailverify']=$x['email'];
   $_SESSION['name']=$x['email'];
   $_SESSION['code']=$x['code'];

 }


 public static function HAS_FLASH()
 {
   return isset($_SESSION['hakuqoeuiwrich']);
 }

 public static function IS_AUTH()
 {
   return isset($_SESSION['auth']) && $_SESSION['auth']===true;
 }
 public static function IS_CEO()
 {
   return isset($_SESSION['ceo']) && $_SESSION['ceo']===true;
 }

 public static function SET_ATTRIBUTE($AT,$VAL):void
 {
   $_SESSION[$AT]=$VAL;
 }
 public static function SET_CEO($auth=true):void
 {
   if (is_bool($auth)) {
     $_SESSION['ceo']=$auth;
   }else {
     throw new \InvalidArgumentException('La valeur spécifiée à la méthode User::setAuthenticated() doit être un boolean');
   }
 }
 public static function SET_AUTH($auth=true):void
 {
   if (is_bool($auth)) {
     $_SESSION['auth']=$auth;
   }else {
     throw new \InvalidArgumentException('La valeur spécifiée à la méthode User::setAuthenticated() doit être un boolean');
   }
 }

 public static function SET_FALSH($value):void
 {
   $_SESSION['hakuqoeuiwrich']=$value;
 }
 public static function SESSION_DESTROY():void
 {
   session_destroy();

 }
}



 ?>
