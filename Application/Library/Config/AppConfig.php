<?php
namespace Library\Config;

/**
 *
 */
abstract class AppConfig extends \DatabaseManagers_space\PDOFactory
{
 protected static $host;
 protected static $host_user;
 protected static $host_user_passwrd;
 protected static $db_name;
 protected static $array;
 protected static function SET_APP(array $data)
 {
   self::$array = $data;

   foreach (self::$array as $key => $value) {
     if ($key == "db_name") {
       self::$db_name = $value;
     }
     if ($key == "host") {
       self::$host = $value;
     }
     if ($key == "host_user") {
       self::$host_user = $value;
     }
     if ($key == "host_user_pass") {
       self::$host_user_passwrd = $value;

     }

   }
 }

 protected static function CREATE_DB()
 {
   $host = self::$host;

    $root = self::$host_user;
    $root_password = self::$host_user_passwrd;
    $localhost = $_ENV['APP_SERVER_NAME'];
    $user = self::$array[self::$db_name.'_user'];
    $pass = self::$array[self::$db_name.'_user_pass'];
    $db = self::$db_name ;
   try {
       $dbh = new \PDO("mysql:host=$host", $root, $root_password);

       $dbh->exec("CREATE DATABASE IF NOT EXISTS `$db`;
               CREATE USER '$user'@'$localhost' IDENTIFIED BY '$pass';
               GRANT ALL PRIVILEGES ON `$db`.* TO '$user'@'$localhost';
               FLUSH PRIVILEGES;")
       or die(print_r($dbh->errorInfo(), true));

   }
   catch (PDOException $e) {
       die("DB ERROR: " . $e->getMessage());
   }
 }

protected static function CREATE_TABLE(array $data)
 {
   foreach ($data as $key => $value) {
     $sqlQuery = "CREATE TABLE IF NOT EXISTS $key ($value)";
     try {

       self::GET_MYSQL_CONNECTION()->exec($sqlQuery);
     } catch (\PDOException $e) {
       echo $key.': <br>'.$e->getMessage();
     }



   }
 }


 protected static function INSERT_TABLE(array $data)
 {
   foreach ($data as $key => $value) {
      $query = "INSERT INTO $key SET ";
      $query2 = "SELECT COUNT(*) FROM $key WHERE ";
      foreach ($value as $name => $dat) {
        if ($name == 'path') {
        $dt = rtrim($dat,',');
        $query2.=" $name=$dt";
        }
        $query.=" $name=$dat";
      }
      try {
        $d = self::GET_MYSQL_CONNECTION()->query($query2);
        $result = $d->fetchColumn();
        if (!$result) {
          self::GET_MYSQL_CONNECTION()->exec($query);
        }
      } catch (\PDOException $e) {
        echo $key.': <br>'.$e->getMessage();
      }

   }
 }


 abstract public static function RUN();


}



 ?>
