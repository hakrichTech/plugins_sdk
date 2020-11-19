<?php
namespace Sinecure\Ajax\Modules\User;
/**
 *
 */
 use Library\BackControllerAjax as c_omponent;
 use Library\HTTP\HTTPRequest as Request;
 use Library\Application as app;
 use DataClass\Manager\FunctionsHere\managerFunction as MANAGER_FUNCTIONS_LIBRARY;
class UserController extends c_omponent
{
  protected static $Index;


  function __construct(app $app, $module, $action){
    parent::__construct($app,$action);
    self::$Index=$this;

  }
  public static function EXECUTE_ACCOUNT(Request $request)
  {

    if (!self::$app::USER()::HAS_FLASH() && !self::$app::USER()::IS_AUTH()) {
      self::$out="ERROR";
    }else {
     if ($request::GET_EXISTS("ed")) {

          if ($request::POST_EXISTS("username") && $request::METHOD()=="POST") {
            $user=self::$app::CURRENTLY_USER();
            $profInfoModif=MANAGER_FUNCTIONS_LIBRARY::UPDATE_DATA($request::POST_(),['username','fullName','placeBirth','gender','notif','birthDate']);
            self::$app::OUTPUT_0()::SET_QUERI(self::$user_Manager::USER_UPDATE($user::MODIF($profInfoModif)));
          }else {
            self::$app::OUTPUT_0()::SET_QUERI(['data'=>['Upload data successfuly']]);
          }

     }elseif ($request::GET_EXISTS("profileActivities")) {
      if (isset($_POST['audioName'])) {
        self::$out="YES";
      }else {
        self::$out="no";
      }
    }elseif ($request::GET_EXISTS("coverEditInfo")) {


             if ($request::FILE_EXISTS("formImage")) {
               $cover=$request::FILE_DATA("formImage");
               $coverModif=self::$out=MANAGER_FUNCTIONS_LIBRARY::IMAGE_EDITOR($cover,"Pictures/Profiles/");
               $user=self::$app::CURRENTLY_USER();
               $user::SET_COVER($coverModif);
               self::$app::OUTPUT_0()::SET_QUERI(self::$user_Manager::USER_UPDATE($user));
             }else {
               self::$app::OUTPUT_0()::SET_QUERI(['data'=>['Upload file successfuly']]);

             }




    }elseif ($request::GET_EXISTS("profileEditInfo")) {


      if ($request::FILE_EXISTS("formImage")) {
        $profle=$request::FILE_DATA("formImage");
        $profleModif=self::$out=MANAGER_FUNCTIONS_LIBRARY::IMAGE_EDITOR($profle,"Pictures/Profiles/");
        $user=self::$app::CURRENTLY_USER();
        $user::SET_PROFILE($profleModif);
        self::$app::OUTPUT_0()::SET_QUERI(self::$user_Manager::USER_UPDATE($user));
      }else {
        self::$app::OUTPUT_0()::SET_QUERI(['data'=>['Upload file successfuly']]);

      }

    }

    }
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


 ?>
