<?php
namespace Library\Form;

/**
 *
 */
class MaxLengthValidator extends Validator
{
  protected static $maxLength;
  function __construct($errorMessage, $maxLength)
  {
    parent::__construct($errorMessage);
    self::SET_MAXLENGTH($maxLength);
  }

  public static function IS_VALID($value){
    return strlen($value) <= self::$maxLength;
  }

 public static function SET_MAXLENGTH($maxLength){
   $maxLength = (int) $maxLength;
   if ($maxLength > 0){
     self::$tmaxLength = $maxLength;
   }else {
     throw new \RuntimeException('La longueur maximale doit être un nombre supérieur à 0');
   }
 }
}

 ?>
