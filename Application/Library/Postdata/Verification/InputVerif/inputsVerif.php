<?php
namespace Library\Postdata\Verification\InputVerif;

/**
 *
 */
 use \ObjectAddOn\AddInObject\Object_ as ob;
abstract inputsVerif extends ob

{
  protected static $error=array();
  protected static $data_expected=array('name','tel');
  protected static $text_inputs=array();

  const TEXT_INPUT_MAX=100;
  const FILE_INPUT_MAX=20;

  function __construct(\Library\HTTP\HTTPRequest $request)
  {
    self::INITIALIZE($request);
  }

  protected static function AN_AUTHORISED_CHARACTER($string)
  {

    $string = str_replace( "\\", " ", $string );
    $string = str_replace( ";", " ", $string );
    $string = str_replace( "'", " ", $string );
    $string = str_replace( ".", " ", $string );
    $string = str_replace( "=", " ", $string );
    if ( strpos( $string, ';' ) ) exit ( "$string is an invalid value for variety!" );
    $string=mysql_real_escape_string( $string );
    return $string ;

  }

  public static function INITIALIZE(\Library\HTTP\HTTPRequest $request)
  {
     $data=$request::POST_();
     foreach ($data as $key => $value) {
       if (in_array($key,self::$data_expected)) {
         if (!empty($value)) {
           self::$text_inputs[$key]=array(
             'data'=>self::AN_AUTHORISED_CHARACTER($value),
             'length'=>strlen($value)
           );
           if ($key=="tel") {
             if (!is_int($value)) {
               self::$error[$key]="Error: This field you try to submit is not a number";
               break;
             }else {
               continue;
             }
           }

         }else {
           self::$error[$key]="Error: This field you try to submit is empty";
           break;
         }

       }else {
         break;
       }

     }
  }

  public static function CHECK_ERROR()
  {
      foreach (self::$text_inputs as $key => $value) {
          if ($value['length']>inputsVerif::TEXT_INPUT_MAX) {
            self::$error[$key]="Error: The character limit for this field is 100";
            break;
          }
          else {
            continue;
          }
      }
  }

  public static function IS_ERROR()
  {
    $booleen=count(self::$error);
    if ($booleen) {
      return 1;
    }else {
      return 0;
    }
  }

  public static function ERROR()
  {
    return self::$error;
  }

}

 ?>
