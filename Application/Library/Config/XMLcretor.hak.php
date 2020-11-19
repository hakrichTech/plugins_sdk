<?php
namespace Library\Config;

/**
 *
 */
class XMLcreator
{
  protected $output;
  protected $app;
  protected $dir;
  protected $files;

  function __construct(string $file="")
  {
    self::$output=$file;
    self::$app=$this;
  }

  public static function SET_OUTPUT(string $file)
  {
    self::$output=$file;
  }

  public static function SET_GENERATED_FOLDER(string $folder)
  {
    self::$dir=$folder;
  }

  public static function GENERATE_FILES()
  {
    self::$files=array();

    if (is_dir(self::$dir)){
       if ($dh = opendir(self::$dir)){
         while (($file = readdir($dh)) !== false){
           self::$files[]=self::$dir.$file;
      }
       closedir($dh);
     }
    }

  }

  public static function OUT()
  {
    print_r(self::$files);
  }


}





 ?>
