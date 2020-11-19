<?php
namespace Sinecure\Ajax\Modules\Login;
/**
 *
 */
 use Library\BackControllerAjax as c_omponent;
 use Library\HTTP\HTTPRequest as Request;
 use Library\Application as app;
 use Library\Details as detail;
 use DataClass\Manager\FunctionsHere\managerFunction as MANAGER_FUNCTIONS_LIBRARY;
class LoginController extends c_omponent
{
  protected static $Index;


  function __construct(app $app, $module, $action){
    parent::__construct($app,$action);
    self::$Index=$this;

  }

  public static function EXECUTE_ACCOUNT(Request $request)
  {

    if ($request::GET_EXISTS("login")) {

      if (!self::$app::USER()::HAS_FLASH() && !self::$app::USER()::IS_AUTH()) {
        if ($request::METHOD()=="POST") {
          if ($request::POST_EXISTS('mail')&&$request::POST_EXISTS('pass')) {
            $id=self::$user_Manager::LOGIN($request::POST_());
            if ($id) {
              self::$app::USER()::SET_FALSH($id);
              self::$app::USER()::SET_AUTH();
              // self::$app::HTTP_RESPONSE()::REDIRECT('http://sinecure/home');
            }else {
              self::$page::ADD_VAR('title','LogIn');
              self::$page::ADD_VAR('error','Email and passowrd incorrect');
              self::SET_MODULE('SinecureIndex');
              self::SET_VIEW('Index');
            }
          }else {
            self::$page::ADD_VAR('title','LogIn');
            self::$page::ADD_VAR('error','Email and passowrd incorrect');
            self::SET_MODULE('SinecureIndex');
            self::SET_VIEW('Index');
          }
      }else {
        self::$app::OUTPUT_0()::SET_QUERI(['data'=>['method error']]);
      }

    }else {
        if ($request::METHOD()=="POST") {
          if ($request::POST_EXISTS('mail')&&$request::POST_EXISTS('pass')) {
            $id=self::$user_Manager::LOGIN($request::POST_());
            if ($id) {
              if (self::$app::USER()::GET_FLASH()==$id) {
                if(self::$ceo_Manager::CHECK_CEO($id)){
                   if (self::$user_Manager::UNIQ_CHECK($id)){
                     $user=new detail\UserDetails(self::$user_Manager::UNIQ_($id));
                     self::$app::OUTPUT_0()::SET_QUERI(['data'=>1,'username'=>ucfirst($user::USERNAME())]);
                   }else {
                     self::$app::OUTPUT_0()::SET_QUERI(['data'=>'error']);
                   }
                }else {
                  self::$app::OUTPUT_0()::SET_QUERI(['data'=>0]);
                }
              }else {
                self::$app::OUTPUT_0()::SET_QUERI(['data'=>2]);
              }
            }else {
              self::$app::OUTPUT_0()::SET_QUERI(['data'=>3]);

            }
          }else {
            if ($request::POST_EXISTS('code')) {
              if(self::$ceo_Manager::CHECK_CEO(self::$app::USER()::GET_FLASH())){
                $postCode=$request::POST_DATA('code');
                $code=self::$ceo_Manager::AUTHAUNT_CODE(self::$app::USER()::GET_FLASH());
                if ($postCode==$code) {
                 self::$app::USER()::SET_CEO();
                 self::$app::OUTPUT_0()::SET_QUERI(['data'=>"redirectToCeoAccount"]);
               }else {
                 self::$app::OUTPUT_0()::SET_QUERI(['data'=>"code Error"]);
               }
             }else {
               self::$app::OUTPUT_0()::SET_QUERI(['data'=>"code Error"]);
             }
            }else {
              self::$app::OUTPUT_0()::SET_QUERI(['data'=>3]);
            }

          }
      }else {
        self::$app::OUTPUT_0()::SET_QUERI(['data'=>['method error']]);
      }


  }

 }

    // if (!self::$app::USER()::HAS_FLASH() && !self::$app::USER()::IS_AUTH()) {
    //   self::$out="ERROR";
    // }else {
    //  if ($request::GET_EXISTS("ed")) {
    //
    //       if ($request::POST_EXISTS("username") && $request::METHOD()=="POST") {
    //         $user=self::$app::CURRENTLY_USER();
    //         $profInfoModif=MANAGER_FUNCTIONS_LIBRARY::UPDATE_DATA($request::POST_(),['username','fullName','placeBirth','gender','notif','birthDate']);
    //         self::$app::OUTPUT_0()::SET_QUERI(self::$user_Manager::USER_UPDATE($user::MODIF($profInfoModif)));
    //       }else {
    //         self::$app::OUTPUT_0()::SET_QUERI(['data'=>['Upload data successfuly']]);
    //       }
    //
    //  }elseif ($request::GET_EXISTS("profileActivities")) {
    //   if (isset($_POST['audioName'])) {
    //     self::$out="YES";
    //   }else {
    //     self::$out="no";
    //   }
    // }elseif ($request::GET_EXISTS("coverEditInfo")) {
    //
    //
    //          if ($request::FILE_EXISTS("formImage")) {
    //            $cover=$request::FILE_DATA("formImage");
    //            $coverModif=self::$out=MANAGER_FUNCTIONS_LIBRARY::IMAGE_EDITOR($cover,"Pictures/Profiles/");
    //            $user=self::$app::CURRENTLY_USER();
    //            $user::SET_COVER($coverModif);
    //            self::$app::OUTPUT_0()::SET_QUERI(self::$user_Manager::USER_UPDATE($user));
    //          }else {
    //            self::$app::OUTPUT_0()::SET_QUERI(['data'=>['Upload file successfuly']]);
    //
    //          }
    //
    //
    //
    //
    // }elseif ($request::GET_EXISTS("profileEditInfo")) {
    //
    //
    //   if ($request::FILE_EXISTS("formImage")) {
    //     $profle=$request::FILE_DATA("formImage");
    //     $profleModif=self::$out=MANAGER_FUNCTIONS_LIBRARY::IMAGE_EDITOR($profle,"Pictures/Profiles/");
    //     $user=self::$app::CURRENTLY_USER();
    //     $user::SET_PROFILE($profleModif);
    //     self::$app::OUTPUT_0()::SET_QUERI(self::$user_Manager::USER_UPDATE($user));
    //   }else {
    //     self::$app::OUTPUT_0()::SET_QUERI(['data'=>['Upload file successfuly']]);
    //
    //   }
    //
    // }
    //
    // }
    self::$out=self::$app::OUTPUT_0()::DATA_RESP('json');

  }

  public static function EXECUTE()
  {
    $method = 'EXECUTE_'.strtoupper(self::$action);
    if (!is_callable(array(self::$Index, $method))){
      throw new \RuntimeException('Action "'.self::$action.'"n\'est pas définie sur ce module');
    }else {

      self::$method(self::$app::HTTP_REQUEST());
    }
  }

  public static function OUT_PUT()
  {
    return self::$out;
  }
}
