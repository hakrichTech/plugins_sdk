<?php
namespace Library\Form;

/**
 *
 */
class TextField extends Field
{
  protected static $cols;
  protected static $rows;

  function __construct()
  {
    // code...
  }

  public static function BUILD_WIDGET(){
    $widget = '';

    if (!empty(self::$errorMessage)){
      $widget .= self::$errorMessage.'<br />';
    }

    $widget .= '<label>'.self::$label.'</label><textarea name="'.self::$name.'"';
    if (!empty(self::$cols)){
      $widget .= ' cols="'.self::$cols.'"';
    }
   if (!empty(self::$rows)){
     $widget .= ' rows="'.self::$rows.'"';
   }
   $widget .= '>';

   if (!empty(self::$value)){
     $widget .= htmlspecialchars(self:;$value);
   }
   return $widget.'</textarea>';
}

   public static function SET_COLS($cols){
       $cols = (int) $cols;
       if ($cols > 0){
         self::$cols = $cols;
       }
   }

   public static function SET_ROWS($rows){
       $rows = (int) $rows;
       if ($rows > 0){
         self::$rows = $rows;
       }
   }

}
 ?>
