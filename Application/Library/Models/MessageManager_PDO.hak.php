<?php
namespace Library\Models;

/**
 *
 */
 use \Library\Application as app;
 use HTML as Html;
 use \Library\Details as Details;
 use \Library\User as UL;
 use DataClass\Manager\FunctionsHere as Func;
class MessageManager_PDO extends MessageManagers
{
  protected static $pdo;
  protected static $user;
  protected static $userId;
  function __construct(\PDO $app)
  {
    self::$user=new UserManager_PDO($app);
    self::$pdo=$app;
    self::$userId=UL\User::GET_FLASH();

  }



  public static function CITERION(string $uniq){
    $citerionDeyoken=self::$pdo->query('SELECT * FROM citerion WHERE id2="'.$uniq.'" OR id1="'.$uniq.'"');
    $data=" ";
    while ($c=$citerionDeyoken->fetch()) {
     $user=self::CHECK($c['id2'],$c['id1'],$uniq);
     $USER= new Details\UserDetails(self::$user::UNIQ_($user));
     $last=$c['msg'];

     $MS=Html\Message::Citerion(array($last,$USER));
  $data.=<<<END
      {$MS}
  END;
    }
    if ($data==" ") {
     $data="<em>You do not have any Conversation list</em>";
    }
    return array('html'=>$data);
  }


  private static function CHECK($x,$z,$y)
  {
    if ($x==self::$userId&&$z!=$y) {
      return $z;
    }else if($x!=self::$userId&&$z==$y) {
      return $x;
    }
  }


  public static function MESSAGES_BOX(string $user1, string $user2){
    $ne=1;
    $msgtext=" ";
    $md=self::$pdo->query('SELECT * FROM fineme WHERE sender="'.$user1.'" AND receiver="'.$user2.'"  OR receiver="'.$user1.'" AND sender="'.$user2.'"');
    while ($msg=$md->fetch()) {
      self::$pdo->query('UPDATE fineme SET etat="'.$ne.'" WHERE id="'.$msg['id'].'"');
      if ($msg['sender']==$user1) {
        $HERE=Html\Message::msgRight($msg);
        $msgtext.=<<<END
        {$HERE}
     END;
    }else{
     $HERE=Html\Message::msgLeft($msg);
     $msgtext.=<<<END
     {$HERE}
    END;
    }
  }

  return array('html'=>$msgtext);
}






public static function SEND_MESSAGE(string $sender, string $receiver, array $message){
  $ne=1;
  $n=0;

   $r=self::$pdo->prepare('SELECT COUNT(id) AS t FROM citerion WHERE id1="'.$sender.'" AND  id2="'.$receiver.'"OR id2="'.$sender.'" AND id1=:x');
   $r->execute(array('x' => $receiver ));
   $v=$r->fetch();
   if ($v['t']>$n) {
       self::$pdo->query('INSERT INTO fineme SET  idmsg="'.uniqid().'", sender="'.$sender.'", finement="'.nl2br($message['text']).'", receiver="'.$receiver.'", files="'.$message['filename'].'", viewtime="nothing", typ="'.$message['type'].'", daate="'.$message['daate'].'",
        etat="'.$n.'", s_aut="'.$ne.'", r_aut="'.$ne.'"');
       self::$pdo->query('UPDATE  citerion SET updateM="'.$ne.'" , msg="'.Func\managerFunction::stringCut($message['text'],18).'" WHERE id1="'.$sender.'" AND  id2="'.$receiver.'"OR id2="'.$sender.'" AND id1="'.$receiver.'"');
       return "cool";
   }else {
     if ($sender!=$receiver) {
       self::$pdo->query('INSERT INTO citerion SET id1="'.$sender.'", id2="'.$receiver.'", updateM="'.$ne.'", msg="'.Func\managerFunction::stringCut($message['text'],18).'"');
     }
     self::$pdo->query('INSERT INTO fineme SET  idmsg="'.uniqid().'", sender="'.$sender.'", finement="'.nl2br($message['text']).'", receiver="'.$receiver.'", files="'.$message['filename'].'", viewtime="nothing", typ="'.$message['type'].'", daate="'.$message['daate'].'",
      etat="'.$n.'", s_aut="'.$ne.'", r_aut="'.$ne.'"');
     return "cool";
   }
}



}
 ?>
