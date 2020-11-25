<?php
namespace Html;

/**
 *
 */
use \ObjectAddOn\AddInObject\Object_ as ob;
class html extends ob
{
  private static $htmlPath=array();
  private static $error=0;
  private static $app;
  private static $html=array();
  function __construct($htmls_url)
  {
    self::$app = $this;
    $a = self::CHECK_DIR($htmls_url,"html");
    if ($a) {
     self::$error=0;
    }else {
      self::$error=2;

    }
  }

  public static function CHECK_DIR($x,$array="")
  {
    $dir = __DIR__.'/../../../../../'.$x;
    if (is_dir($dir)) {
      if ($array == "html") {
        self::INCLUDE_H_DIR($dir);
        return 1;
      }
    }else {
      return 0;
    }
  }

  public static function INCLUDE_H_DIR($x)
  {
    $files = scandir($x);

    foreach ($files as $file) {
     if ($file!='.' && $file!="..") {
       self::$htmlPath[]=$x.'/'.$file;
     }
   }
  }

  public static function RUN(){
    if (self::$error == 0) {
      foreach (self::$htmlPath as $html) {
        $content = file_get_contents($html);
        $array = explode("/", $html);
        $name = $array[count($array)-1];
        $file = __DIR__."/Html/".$name;
        fopen($file,"w+");
        file_put_contents($file,$content);
      }

    }

    return self::$app;
  }
}



 ?>
