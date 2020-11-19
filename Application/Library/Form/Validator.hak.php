<?php
namespace Library\Form;

/**
 *
 */
abstract class Validator extends AnotherClass
{
  protected static $errorMessage;
  function __construct($errorMessage)
  {
  self::SET_ERROR_MESSAGE($errorMessage);
  }

 abstract public static function IS_VALID($value);

 public static function SET_ERROR_MESSAGE($errorMessage){
   if (is_string($errorMessage)){
     self::$errorMessage = $errorMessage;
   }
 }
 public static function ERROR_MESSAGE(){return self::$errorMessage;}
}


 ?>
