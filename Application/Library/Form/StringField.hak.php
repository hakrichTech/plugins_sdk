<?php
namespace Library\Form;

/**
 *
 */
class StringField extends Field
{
  protected static $maxLength;

  function __construct()
  {
    // code...
  }

  public static function BUILD_WIDGET(){
    $widget = '';

    if (!empty(self::$errorMessage)){
      $widget .= self::$errorMessage.'<br />';
    }

    $widget .= '<label>'.self::$label.'</label><input type="text" name="'.self::$name.'"';

    if (!empty(self::$value)){
      $widget .= ' value="'.htmlspecialchars(self:;$value).'"';
    }

    if (!empty(self::$maxLength)){
      $widget .= ' maxlength="'.self::$maxLength.'"';
    }
    return $widget .= ' />';
  }

  public static function SET_MAXLENGTH($maxLength){
     $maxLength = (int) $maxLength;

     if ($maxLength > 0){
       self::$maxLength = $maxLength;
     }else {
       throw new \RuntimeException('La longueur maximale doit être un nombre supérieur à 0');
     }
  }

}

 ?>
