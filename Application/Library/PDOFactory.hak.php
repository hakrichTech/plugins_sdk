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
       // $db = new \PDO('mysql:host=localhost;dbname=id12780070_02a96eae45a405ea48eae','id12780070_ask','BI@+%PA12=2b');
       $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
       return $db;
     } catch (\Exception $e) {
      // header('location:http://sinecure/404.html');
     }


  }

}

 ?>
