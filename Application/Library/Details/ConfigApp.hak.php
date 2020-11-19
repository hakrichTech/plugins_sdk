<?php
namespace Library\Details;
/**
 *
 */
 use \Library\Details\Traites\App as u;
class ConfigApp
{
  protected static $app;
  use u;
  function __construct($x="")
  {
    self::$app=$this;
    if(is_array($x)){
      self::dataSyn($x);
    }

  }
  private static function dataSyn(array $x)
  {
    self::$newMsg=(int) $x['newNumber'];
    self::$allNew=(int) $x['headerNumber'];
    self::$unrdp=(int) $x['unreadNumber'];
    self::$nwg=(int) $x['newMsgGroup'];
    self::$nwc=(int) $x['newMsgClub'];
  }
 public static function MODIF(array $x)
 {
   self::SET_ALLNEW($x['all']);
   self::SET_UNREAD($x['unread']);
   self::SET_NEWGR($x['ngroup']);
   self::SET_NEWCL($x['nclub']);
   self::SET_NEW($x['new']);
   return self::$app;
 }

}

 ?>
