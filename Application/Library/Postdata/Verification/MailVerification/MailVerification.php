<?php
namespace Library\Postdata\Verification\MailVerification;
/**
 *
 */

/**
 *
 */

 use \ObjectAddOn\AddInObject\Object_ as ob;
 use \ObjectAddOn\AddInObject\implementess\mail_verif as constant;

class MailVerification extends ob implements constant\mail_verif
{
  private static $mail;
  private static $recipient;
  private static $domainCom;
  private static $Com;
  private static $sub_domain0;
  private static $sub_domain;
  private static $domain;
  private static $state;
  private static $count;
  public $email;
  private static $state0=false;
  private static $is_email_error=false;
  public function __construct($x)
{
  if (preg_match("#\S#",$x)) {
    if (preg_match("#@#",$x)) {
      $this->email=$x;
      self::mail($x);
    }else {
      self::$state0=13;
    }
  }else {
    self::$state0=12;

  }
}



public static function Checkvalidity($x)
{
  if ($x==self::CHECK_VALIDITY) {
    if (self::Recipient()==self::RECEPIENT_CORRECT||self::Recipient()==self::RECEPIENT_PROHIBITED) {
       self::dom();
       self::dot__();
      if (self::Domain()==self::DOMAIN_CORRECT) {
         self::calcul();
         if (self::Sub_domain()==self::SUBDOMAIN_CORRECT) {
           self::$is_email_error=false;
           self::$state=self::Sub_domain();

         }else {
           self::$is_email_error=true;
           self::$state=self::Sub_domain();

         }
      }else {
        self::$is_email_error=true;
        self::$state=self::Domain();

      }
    }else {
      self::$is_email_error=true;
      self::$state=self::Recipient();
    }
  }
}





public static function response_return_by_validity()
{
  if (self::$state0) {
     switch (self::$state0) {
       case self::EMAIL_ERROR_ESPACE:
         return self::Email_error_espace;
         break;
        case self::EMAIL_ERROR_AT:
          return self::Email_error_at;
          break;
        case self::EMAIL_INCORRECT_DOT:
          return self::Email_incorrect_dot;
          break;

     }
  }else {
    if (self::$is_email_error) {
      switch (self::$state) {
        case self::EMAIL_INCORRECT_DOT:
          return self::Email_incorrect_dot;
          break;
        case self::SUBDOMAIN_SP_CHAR:
          return self::Subdomain_sp_char;
          break;
        case self::RECEPIENT_ERROR:
          return self::Recipient_error;
          break;
        case self::DOMAIN_SP_CHAR:
          return self::Domain_sp_char;
          break;

        case self::DOMAIN_SP_CHAR_TWO:
          return self::Domain_sp_char_two;
          break;
       case self::DOMAIN_ERROR:
          return self::Domain_error;
          break;
        case self::SUBDOMAIN_SP_CHAR_TWO:
          return self::Subdomain_sp_char_two;
          break;
        case self::SUBDOMAIN_ERROR:
          return self::Subdomain_error;
          break;
        case self::RECEPIENT_LENGTH_BIGGER:
          return self::Recipient_length_bigger;
          break;
        case self::RECEPIENT_ERROR_SP_CHAR_TWO:
          return self::Recipient_error_sp_char_two;
          break;
      }
    }else {
      return "Email Valide!";
    }
}
}



private static function mail($x)
{
  $z="";

  for ($i=0; $i <strlen($x) ; $i++) {
    if ($x[$i]=="@")break;
    $z.=$x[$i];
  }
  self::$domainCom=strtolower(self::domainCom($x,strlen($z)));
  self::$mail=$x;
  self::$recipient=strtolower($z);
}

public function __sleep()
{
  // return array('self::$mail','$domainCom','$recipient','$state0');
}

private static function domainCom($x,$z)
{
  $y="";
  for ($i=$z+1; $i <strlen($x) ; $i++) {
    $y.=$x[$i];
  }
  return $y;
}


private static function dot__()
{
  $z=0;
  for ($i=0; $i < strlen(self::$domainCom) ; $i++){
    if (self::$domainCom[$i]=="."){
     $z+=1;
    }
  }

  if ($z>1) {
    self::$sub_domain=true;
  }
  elseif ($z==0) {
    self::$state0=19;

  }
}





private static function calcul()
{
  $z="";
  $u=array();
  for ($i=self::$count+1; $i < strlen(self::$domainCom); $i++) {
    $z.=self::$domainCom[$i];
  }
  if ($z!="") {
    for ($i=0; $i < strlen($z); $i++) {
      if ($z[$i]==".") {
        $u[]=$i;
      }
    }
    if (count($u)>1) {
      $jt="";
      $gt="";
     for ($i=($u[count($u)-1])+1; $i < strlen($z); $i++) {
       $gt.=$z[$i];
     }
     for ($i=0; $i < $u[count($u)-1]; $i++) {
       $jt.=$z[$i];
     }
     self::$sub_domain0=$jt;
     self::$Com=$gt;
    }elseif (count($u)!=0 && count($u)==1) {
      $jt="";
      $gt="";
      for ($i=0; $i <$u[0] ; $i++) {
        $jt.=$z[$i];
      }

      for ($i=$u[0]+1; $i <strlen($z) ; $i++) {
        $gt.=$z[$i];
      }
      self::$sub_domain0=$jt;
      self::$Com=$gt;

    }
    if (count($u)==0 ) {
      self::$Com=$z;
      self::$sub_domain0=false;

    }
  }
}




private static function Sub_domain()
{
  if (self::$sub_domain0) {
      if (preg_match("#^\W|\W$#",self::$sub_domain0)) {
         return 8;

         }else {
         if (preg_match("#[!$()%~`:>;&'<*+/\#=},?^_{|@]#",self::$sub_domain0)) {
            return 9;

            }else {
            if (preg_match("#[!$%\.~`&'*+-/\#=}?^_{|]{2,}#",self::$sub_domain0)) {
               return 10;

               }else {
               return 11;
               }
            }
        }

  }else {
    if (self::$Com) {
      return 11;
    }else {
      return 19;
    }

  }
}




private static function dom()
{
  $z="";
    for ($i=0; $i <strlen(self::$domainCom) ; $i++) {
      if (self::$domainCom[$i]==".")break;
      $z.=self::$domainCom[$i];
    }
    self::$domain=$z;
    self::$count=strlen($z);
}





private static function Recipient()
{
  if (strlen(self::$recipient)<self::RECEPIENT_MAX) {
    if (preg_match("#^\W|\W$#",self::$recipient)) {
       return 0;
       }else {
       if (preg_match("#[(),\[\]:;\\<>]#",self::$recipient)) {
          return 1;

          }else {
          if (preg_match("#[!$%\.~`&'*+-/\#=}?^_{|]{2,}#",self::$recipient)) {
             return 2;

             }else {
             return 3;

             }
          }
      }
 }else {
  return 18;

 }

}




private static function Domain()
{
  if (strlen(self::$domain)<=self::DOMAIN_MAX) {

  if (preg_match("#^\W|\W$#",self::$domain)) {
     return 4;
     }else {
     if (preg_match("#[!$()%\.~`:>;&'<*+/\#=},?^_{|@]#",self::$domain)) {
        return 5;
        }else {
        if (preg_match("#[!$%\.~`&'*+-/\#=}?^_{|]{2,}#",self::$domain)) {
           return 7;
           }else {
           return 6;
           }
        }
    }
}else {
return 4;
}

}








public function __wakeup()
{
  self::Checkvalidity(self::CHECK_VALIDITY);
}


public function __set_state($object_value)
{
  return new MailVerification($object_value['email']);
}


}


// $cals=new MailVerification('hakimushamavu@gmail.com');
// $cals::Checkvalidity($cals::CHECK_VALIDITY);

// echo $cals::response_return_by_validity();
 ?>
