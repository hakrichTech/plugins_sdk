<?php

namespace Library\Models;

/**
 *
 */
abstract class MessageManagers extends \Library\Manager\Manager
{

  abstract public static function CITERION(string $uniq);
  abstract public static function MESSAGES_BOX(string $user1, string $user2);
  abstract public static function SEND_MESSAGE(string $sender, string $receiver, array $message);


}

 ?>
