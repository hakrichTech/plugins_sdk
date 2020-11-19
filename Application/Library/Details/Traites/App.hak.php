<?php
namespace Library\Details\Traites;
/**
 *
 */
trait App
{
  protected static $newMsg=0;
  protected static $allNew=0;
  protected static $unrdp=0;
  protected static $nwg=0;
  protected static $nwc=0;

  public static function HEADER_NEW(){return self::$allNew;}
  public static function NEW_MSG(){return self::$newMsg;}
  public static function UNREAD_MSG(){return self::$unrdp;}
  public static function NEW_MSG_GROUP(){return self::$nwg;}
  public static function NEW_MSG_CLUB(){return self::$nwc;}

  public static function SET_ALLNEW(int $x){(int) self::$allNew+=$x;}
  public static function SET_UNREAD(int $x){(int) self::$unrdp+=$x;}
  public static function SET_NEWGR(string $x){(int) self::$nwg+=$x;}
  public static function SET_NEWCL(string $x){ (int) self::$nwc+=$x;}
  public static function SET_NEW(string $x){ (int) self::$newMsg+=$x;}

}

 ?>
