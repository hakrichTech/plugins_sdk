<?php
namespace Library\FileRoot;
/**
 *
 */
 use Library\Application as app;
 use \Library\ApplicationComponents as b;
class Root extends b
{
  protected static $file;
  protected static $dir=array();
  protected static $userDataDir;

 public function __construct(app $app)
 {
   parent::__construct($app);
   self::$userDataDir="/../../../UsersData/".sha1(self::$app::CURRENTLY_USER()::USERNAME('url'));

 }

 public static function ADD_DIR(string $dirname):void
 {
   if (self::$app::NAME()=="CEO") {
     // code...
   }else {
     self::$dir[]=__DIR__.self::$userDataDir."/".$dirname;
   }
 }
 public static function SCAN_DIR(string $dirr=self::$userDataDir):void
 {
   $dir=scandir(__DIR__.$dirr);
   if ($dirr==self::$userDataDir) {
     for ($i=0; $i < count($dir) ; $i++) {
       if (is_dir(__DIR__.$dirr."/".$dir[$i])) {
           self::ADD_DIR($dir);
         }
      }
   }else {
      for ($i=0; $i < count($dir) ; $i++) {
        if (is_dir($dirr."/".$dir[$i])) {
            self::$dir[]=$dirr."/".$dir;
          }
       }
   }

 }

 public function DELETE(string $file)
 {
   // while (false!==(unlink())) {
   //   // code...
   // }
 }

}

 ?>
