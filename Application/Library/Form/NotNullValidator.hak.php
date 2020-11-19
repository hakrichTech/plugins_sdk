<?php
namespace Library\Form;

/**
 *
 */
class NotNullValidator extends Validator
{

  public static function IS_VALID($value){
    return $value != '';
  }
}

 ?>
