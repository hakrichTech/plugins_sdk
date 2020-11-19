<?php
namespace Hakrichapp\Frontend\Modules\Login;
/**
 *
 */
 use Library\Application as app;
 use Library\BackController as component;
 use Library\HTTP\HTTPRequest as Request;
 use Library\Postdata\Verification\Postdatas as postdTa;
class LoginController extends component
{
  protected static $Index;

  function __construct(app $app, $module, $action){
    parent::__construct($app, $module, $action);
    self::$Index=$this;
  }



  public static function EXECUTE__404(Request $request)
  {
    self::$app::HTTP_RESPONSE()::REDIRECT_401();
  }




public static function EXECUTE_LOGIN(Request $request)
{
  $device=strtoupper(self::$app::$device::TYPE());
  if (!is_callable(array(self::$Index, $device))) {
    throw new \RuntimeException('unknown device"'.$device.'"n\'est pas définie sur ce module');
  }else {
    self::$device();
  }

  if (!self::$app::USER()::HAS_FLASH() && !self::$app::USER()::IS_AUTH()) {

      if ($request::METHOD()=="POST") {
      $data=new postdTa\Postdatas($request::POST_());
      if((self::$user_Manager::LOGIN($data)) instanceof postdTa\Postdatas ){
        self::$app::USER()::SET_FALSH($data::USER_ID());
        self::$app::USER()::SET_AUTH();
        self::$app::HTTP_RESPONSE()::REDIRECT(self::$app::$url);
      }else {
        self::$page::ADD_VAR('error1',"Incorrect email and password!.");
      }

    }

  self::$page::ADD_VAR('page','login');
  self::$page::ADD_VAR('title','Login');
  }else {
    self::$app::HTTP_RESPONSE()::REDIRECT(self::$app::$url);
  }

}




public static function EXECUTE_VERIFICATION2(Request $request){
  if (!self::$app::USER()::HAS_FLASH() && !self::$app::USER()::IS_AUTH()) {
    $device=strtoupper(self::$app::$device::TYPE());
    if (!is_callable(array(self::$Index, $device))) {
      throw new \RuntimeException('unknown device"'.$device.'"n\'est pas définie sur ce module');
    }else {
      self::$device();
    }

    $data=new postdTa\Postdatas(['ip'=>$_SERVER['REMOTE_ADDR']]);
    if (self::$user_Manager::IP_CHECK($data::IP())) {
      $userVerif=self::$user_Manager::UNIQ_IP($data);
      $CODE=self::CODE();
      $bolean=self::$user_Manager::CHECK_CODE($CODE);
      if ($bolean) {
        $CODE=self::CODE(9);
      }
      $data::SET_ID($userVerif['userId']);
      $data::SET_CODE($CODE);
      if (strlen($userVerif['code'])<3) {
       self::$page::ADD_VAR('page','verifFaild');
      }else {
        self::$user_Manager::USER_UPDATE_CODE($data);

        self::$user_Manager::USER_UPDATE_PANDING($data);
        self::$user_Manager::USER_UPDATE_IP($data);
        $usert=self::$user_Manager::UNIQ_($CODE);
        self::$app::USER()::MAIL_BODY(['name'=>$usert['name'],'code'=>$CODE,'email'=>$usert['email']]);
        self::$app::HTTP_RESPONSE()::REDIRECT(self::$app::$url."mail.php");
      }


    }else {
      self::$page::ADD_VAR('page','verifFaild');

    }



    self::$page::ADD_VAR('title','Account Verification');


}else {
  self::$app::HTTP_RESPONSE()::REDIRECT(self::$app::$url);
}

}









public static function EXECUTE_VERIFICATION(Request $request)
{
  if (!self::$app::USER()::HAS_FLASH() && !self::$app::USER()::IS_AUTH()) {
    $device=strtoupper(self::$app::$device::TYPE());
    if (!is_callable(array(self::$Index, $device))) {
      throw new \RuntimeException('unknown device"'.$device.'"n\'est pas définie sur ce module');
    }else {
      self::$device();
    }

      if ($request::METHOD()=="POST") {

         if ($request::POST_DATA("code")!=null) {

           $data=new postdTa\Postdatas($request::POST_());
           $data::SET_IP($_SERVER['REMOTE_ADDR']);

           $check=self::$user_Manager::CHECK_CODE($data::CODE());
           $check0=self::$user_Manager::UNIQ_CHECK($data::CODE());
           if ($check && $check0) {

             $data::SET_ID(self::$user_Manager::UNIQ_VERIF($data::CODE())['userId']);
             self::$user_Manager::DELETE_VERIF($data::CODE());
             $data::SET_CODE("0");
             self::$user_Manager::USER_UPDATE_IP($data);

             self::$app::USER()::SET_FALSH($data::USER_ID());
             self::$app::USER()::SET_AUTH();
             self::$app::HTTP_RESPONSE()::REDIRECT(self::$app::$url);


           }else {
             self::$page::ADD_VAR('error1',"Code error: not match!.");
           }



         }else {
           self::$page::ADD_VAR('error1',"Invalid field! empty.");

         }
         self::$page::ADD_VAR('title','Account Verification');
         self::$page::ADD_VAR('page','verif');

    }else {


      $data=new postdTa\Postdatas(['ip'=>$_SERVER['REMOTE_ADDR']]);
      $dat=self::$user_Manager::UNIQ_IP($data);

      if (strlen($dat['code'])<3) {
        self::$page::ADD_VAR('title','Account Verification');
        self::$page::ADD_VAR('page','verifFaild');

        // NOT YET FINISH
      }else {
        self::$page::ADD_VAR('title','Account Verification');
        self::$page::ADD_VAR('page','verif');
      }


    }
    self::SET_VIEW('LogIn');


}else {
  self::$app::HTTP_RESPONSE()::REDIRECT(self::$app::$url);
}
}





protected static function CODE($x="0")
{

  $gen=time();
  $geN=round((($gen-($gen/190000))%($gen/67258910))%($gen/($gen/190))*1998);
  $geN+=(int) $x;
  return "HT-".$geN;
}





public static function EXECUTE_SIGNUP(Request $request)

{
  if (!self::$app::USER()::HAS_FLASH() && !self::$app::USER()::IS_AUTH()) {
  $device=strtoupper(self::$app::$device::TYPE());
  if (!is_callable(array(self::$Index, $device))) {
    throw new \RuntimeException('unknown device"'.$device.'"n\'est pas définie sur ce module');
  }else {
    self::$device();
  }

  if ($request::METHOD()=="POST") {
     $CODE=self::CODE();
     $data=new postdTa\Postdatas($request::POST_());
     $retu=$data::postdataReturn();
     if (is_array($retu)) {
        $bolean=self::$user_Manager::CHECK_CODE($CODE);
        if (self::$user_Manager::UNIQ_CHECK($retu['email'])) {
          self::$page::ADD_VAR('page','emailExist');
        }else {

        if ($bolean) {
          $CODE=self::CODE(9);
        }
          $retu['code']=$CODE;
          $retu['id']="rich".uniqid()."hak";
          $retu['ip']=$_SERVER['REMOTE_ADDR'];
          $data2=new postdTa\Postdatas($retu);
          $bolean2=self::$user_Manager::CHECK_CODE($retu['email']);
          if ($bolean2) {
            self::$user_Manager::USER_UPDATE_PANDING($data2);
            $data2::SET_ID(self::$user_Manager::UNIQ_VERIF($retu['email'])['userId']);
            self::$user_Manager::USER_UPDATE_IP($data2);
            self::$app::USER()::MAIL_BODY($retu);

          }else {
            self::$user_Manager::ADD_USER_PENDING($data2);
            self::$user_Manager::ADD_USER_IP($data2);
            self::$user_Manager::ADD_USER($data2);
            self::$app::USER()::MAIL_BODY($retu);

          }
          self::$app::HTTP_RESPONSE()::REDIRECT(self::$app::$url."mail.php");


        }
     }else {
       self::$page::ADD_VAR('error1',$retu);
       self::$page::ADD_VAR('page','signup');
       self::$page::ADD_VAR('name',$request::POST_DATA('name'));
       self::$page::ADD_VAR('email',$request::POST_DATA('email'));
     }

     self::SET_VIEW('LogIn');

  }else {

      self::$page::ADD_VAR('title','Signup');
      self::$page::ADD_VAR('page','signup');
      self::SET_VIEW('LogIn');
  }

  }else {
    self::$app::HTTP_RESPONSE()::REDIRECT(self::$app::$url);
  }

}





private static function COMPUTER()
{
  self::$page::ADD_VAR('deviceType','computer');
}
private static function MOBILE()
{
  self::$page::ADD_VAR('deviceType','mobile');
  self::$page::ADD_VAR('display','none');

}
private static function TEBLET()
{
  self::$page::ADD_VAR('deviceType','tablet');
}
public static function EXECUTE()
{
  self::RUN_DEVICE(self::$Index);


}

}

 ?>
