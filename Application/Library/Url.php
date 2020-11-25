<?php
namespace Library;

/**
 *
 */
use \Library\Application as Application;
abstract class Url
{
  protected static $app;
  function __construct(Application $app)
  {
    self::$app=$app;
  }
  public static function BUILD_URL($url, array $params = array())
  {
    $append = "";
    foreach($params as $key => $param){
        $append .= ($append == "") ? "?" : "&";
        $append .= urlencode($key)."=".urlencode($param);
    }
    return self::$app::$url.$url.$append;
  }

  public static function REDIR($to, $exit = true)
  {
    if(headers_sent()){
        echo "<script>window.location = '{$to}';</script>";
    }else{
        header("location: {$to}");
    }
    if($exit){
        die();
    }
  }
}


 ?>
