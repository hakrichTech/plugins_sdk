<?php
namespace Library;


/**
 *
 */
abstract class Session
{

  function __construct()
  {
    ini_set('session.gc_maxlifetime', 60 * 60 * 24);
    ini_set("session.save_handler", "files");
    ini_set("session.save_path", __DIR__."/../../../../../".$_ENV['APP_CONFIG_SIDE_URL'].$_ENV['APP_CONFIG_SIDE'].$_ENV['APP_CONFIG_SESSION_URL']);

    if(!isset($_SESSION)){
        session_start();
    }

    foreach ($_COOKIE as $key => $value) {
      if (!isset($_SESSION[$key])) {
        json_decode($value);
        if (json_last_error() == JSON_ERROR_NONE) {
          $_SESSION[$key] = json_decode($value);
        }else {
          $_SESSION[$key] = $value;
        }
      }
    }
  }


  public static function CHECK($key)
  {
    if (is_array($key)) {
      $set = true;
      foreach ($key as $k) {
        if (!Session::CHECK($k)) {
          $set = false;
        }
      }
      return $set;
    }else {
      $key = Session::GENERATE_SESSION_KEY($key);
      return isset($_SESSION[$key]);
    }
  }


  public static function GET($key)
  {
    if (null !== Session::GENERATE_SESSION_KEY($key)) {
      return Session::GENERATE_SESSION_KEY($key);
    }else {
      return false;
    }
  }

  public static function SET($key, $value, $ttl = 0)
  {
    $_SESSION[Session::GENERATE_SESSION_KEY($key)] = $value;
    if ($ttl !== 0) {
      if (is_object($value) || is_array($value)) {
        $value = json_encode($value);
      }
      setcookie(Session::GENERATE_SESSION_KEY($key), $value, (time() + $ttl), "/", $_SERVER['HTTP_HOST']);
    }
  }

  public static function KILL($key)
  {
    if(isset($_SESSION[Session::GENERATE_SESSION_KEY($key)])){
        unset($_SESSION[Session::GENERATE_SESSION_KEY($key)]);
    }
    if(isset($_COOKIE[Session::GENERATE_SESSION_KEY($key)])){
        setcookie(Session::GENERATE_SESSION_KEY($key), "", (time() - 5000), "/", $_SERVER["HTTP_HOST"]);
    }
  }

  public static function END_SESSION()
  {
    foreach ($_SESSION as $key => $value) {
      unset($_SESSION[$key]);
    }
    foreach($_COOKIE as $key => $value){
        setcookie($key, "", (time() - 5000), "/", $_SERVER["HTTP_HOST"]);
    }
    session_destroy();
  }

  public static function GENERATE_SESSION_KEY($key)
  {
    return md5($key.$_ENV['APP_NAME'].$_ENV['APP_VERSION']);
  }
}



 ?>
