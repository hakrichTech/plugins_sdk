<?php
namespace Library;

/**
 *
 */
class FormHandler extends \Library\Postdata\Verification\InputVerif\inputsVerif
{
  protected static $form;
  protected static $manager;
  protected static $request;

  public function __construct(\Library\Form\Form $form, \Library\Manager\Manager $manager, \Library\HTTP\HTTPRequest $request)
  {
    parent::__construct($request);
    self::SET_FORM($form);
    self::SET_MANAGER($manager);
    self::SET_REQUEST($request);
  }

  public  static function PROCESS(){
    if(self::$request::METHOD() == 'POST' && self::$form::IS_VALID()){
      self::$manager::SAVE(self::$form::ENTITY());
      return true;
    }
    return false;
  }

  public static function SET_FORM(\Library\Form\Form $form)
  {
    self::$form = $form;
  }

  public static function SET_MANAGER(\Library\Manager\Manager $manager)
  {
    self::$manager = $manager;
  }

  public static function SET_REQUEST(\Library\HTTP\HTTPRequest $request)
  {
    self::$request = $request;
    parent::INITIALIZE($request);
  }
}

 ?>
