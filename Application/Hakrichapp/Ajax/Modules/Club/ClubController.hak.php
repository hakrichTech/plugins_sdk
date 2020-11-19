<?php
namespace Sinecure\Ajax\Modules\Club;
/**
 *
 */
 use Library\BackControllerAjax as c_omponent;
 use Library\HTTP\HTTPRequest as Request;
 use Library\Application as app;
 use \Library\Details as DETAILCLUB;
 use DataClass\Manager\FunctionsHere\managerFunction as MANAGER_FUNCTIONS_LIBRARY;
class ClubController extends c_omponent
{
  protected static $Index;

  function __construct(app $app, $module, $action){
    parent::__construct($app,$action);
    self::$Index=$this;


  }
  public static function EXECUTE_CLUB(Request $request)
  {

    if (!self::$app::USER()::HAS_FLASH() && !self::$app::USER()::IS_AUTH()) {
      self::$out="ERROR";
    }else {
      if ($request::GET_EXISTS('gt')) {
        switch ($request::GET_DATA('gt')) {
          case 'Mclubs':
          self::$app::OUTPUT_0()::SET_QUERI(self::$club_Manager::CLUBS_LIST("null",0,15,self::$app::$url)::BUILD());
            break;

          default:
            // code...
            break;
        }
      }elseif ($request::GET_EXISTS('clubcreate')) {
        $avatar="null";
        $cover="null";
        if ($request::FILE_EXISTS('avatar')) {
          $avatar=MANAGER_FUNCTIONS_LIBRARY::IMAGE_EDITOR($request::FILE_DATA('avatar'),"Pictures/Club/Avatar/");
        }
       if ($request::FILE_EXISTS('cover')) {
          $cover=MANAGER_FUNCTIONS_LIBRARY::IMAGE_EDITOR($request::FILE_DATA('cover'),"Pictures/Club/Cover/");
        }
        $club=new DETAILCLUB\ClubDetails();
        $club::MODIF(['avatar'=>$avatar,
                                      'cover'=>$cover,
                                      'clubname'=>$request::POST_DATA('clubname'),
                                      'clubCateg'=>$request::POST_DATA('clubCateg'),
                                      'config'=>" ",
                                      'decription'=>$request::POST_DATA('decription'),
                                      'update'=>" "]);

        self::$app::OUTPUT_0()::SET_QUERI(self::$club_Manager::CREATE($club)::BUILD());

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
