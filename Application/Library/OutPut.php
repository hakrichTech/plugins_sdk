<?php
namespace Library;

/**
 *
 */
 use \Library\Application as app;
 use \Library\ApplicationComponents as b;
class OutPut extends b
{
  protected static $app;
  protected static $queri;
  function __construct(app $app)
  {
    self::$app=$app;
  }

  public static function SET_QUERI($array)
  {
    if (!is_array($array)) {
      throw new \InvalidArgumentException("Invalid queri, recomanded array type!!!!!!!!!", 1);
    }
    self::$queri=$array;
  }
  public static function DATA_RESP(string $x)
  {
    switch ($x) {
      case 'json':
        return json_encode(self::$queri);
        break;
    }
  }
}



 ?>
