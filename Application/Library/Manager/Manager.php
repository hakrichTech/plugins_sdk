<?php
namespace Library\Manager;
/**
 *
 */
abstract class Manager
{
  protected static $dao;
  function __construct($dao)
  {
    self::$dao=$dao;
  }
}


 ?>
