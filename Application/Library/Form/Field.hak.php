<?php
namespace Library\Form;

/**
 *
 */
abstract class Field
{
  protected static $errorMessage;
  protected static $label;
  protected static $name;
  protected static $validators=array();
  protected static $value;
  protected static $app;

  function __construct(array $options = array())
  {
    self::$app=$this;
    if (!empty($options))
     {
      self::SYNC($options);
     }
  }
  abstract public static function BUILD_WIDGET();

  public static function SYNC($options)
    {
         foreach ($options as $type => $value)
           {
              $method = 'SET_'.strtoupper($type);
              if (is_callable(array(self::$app, $method))){
                self::$method($value);
              }
           }
   }

   public static function SET_LABEL($label)
     {
       if (is_string($label))
         {
           self::$label = $label;
       }
    }

    public static function SET_NAME($name)
      {
        if (is_string($name))
          {
            self::$name = $name;
        }
     }
     public static function SET_VALUE($value)
       {
         if (is_string($value))
           {
             self::$value = $value;
         }
      }

    public static function SET_VALIDATORS(array $validators){
      foreach ($validators as $validator){
        if ($validator instanceof Validator && !in_array($validator,self::$validators)){
          self::$validators[] = $validator;
        }
      }
    }

   public static function IS_VALID()
    {
      foreach (self::$validators as $validator){
        if (!$validator:: IS_VALID(self::$value)){
          self::$errorMessage = $validator::ERROR_MESSAGE();
          return false;
        }
      }
      return  true;
    }
  public static function LABEL(){return self::$label;}
  public static function VALIDATOR(){return self::$validators;}
  public static function NAME(){return self::$name;}
  public static function VALUE(){return self::$value;}

}




 ?>
