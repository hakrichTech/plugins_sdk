<?php
namespace Library\Page;
/**
 *
 */
 use \Library\ApplicationComponents as appComponet;
class Page extends appComponet
{
     protected static $contentFile;
     protected static $vars = array();

  public static function ADD_VAR(string $var, $value)
     {
        if (empty($var)){

          throw new \InvalidArgumentException('Le nom de la variable doit être une chaine de caractère non nulle');
         }

         self::$vars[$var] = $value;

     }

  public static function GET_GENERATED_PAGE()
    {
        if (!file_exists(self::$contentFile))
         {
            throw new \RuntimeException('La vue spécifiée n\'existe pas{'.self::$contentFile.'}::');
          }
       $user=self::$app::CURRENTLY_USER();
       $url=self::$app::$url;
       extract(self::$vars);
       if ($user) {
         extract($user::USER("currently"));
       }
       ob_start();// to active th buffer
         require self::$contentFile;
         $content = ob_get_clean(); //Returns the contents of the output buffer and end output buffering.
         // If output buffering isn't active then FALSE is returned.

         ob_start();
           require __DIR__.'/../../../../../../Templates/'.self::$app::NAME().'/layout.php';
          return ob_get_clean();
     }


 public static function SET_CONTENT_FILE(string $contentFile)
      {
        if (empty($contentFile))
            {
               throw new \InvalidArgumentException('La vue spécifiée est invalide');
              }
              self::$contentFile = $contentFile;

      }

}


 ?>
