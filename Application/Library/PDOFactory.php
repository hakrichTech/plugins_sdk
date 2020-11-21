<?php
namespace Library;
/**
 *
 */

class PDOFactory
{

   public static function GET_MYSQL_CONNECTION()
   {
     try {
       $db = new \PDO('mysql:host=localhost;dbname=hakrich','root','');
       $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
       return $db;
     } catch (\Exception $e) {
      // header('location:http://sinecure/404.html');
     }


  }

}

 ?>
