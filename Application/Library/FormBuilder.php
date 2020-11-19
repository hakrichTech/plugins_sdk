<?php
namespace Library;

/**
 *
 */
 use \Library\Form as F;
abstract class FormBuilder
{
  protected static $form;

  function __construct(Entity $entity)
  {
    self::SET_FORM(new F\Form($entity));
  }
  abstract public static function BUILD();
  public function static SET_FORM(F\Form $form){
   self::$form = $form;
  }
  public static function FORM(){return self::$form;}
}


 ?>
