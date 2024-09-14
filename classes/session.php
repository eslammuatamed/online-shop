<?php
class Session
{
  public function __construct()
  {
    session_start();
  }
  public function set($key, $value)
  {
    $_SESSION[$key] = $value;
  }
  public function get($key)
  {
    return (isset($_SESSION[$key])) ? $_SESSION[$key] : false;
  }
  public function has($key)
  {
    return (isset($_SESSION[$key])) ? true : false;
  }
  public function remove($key)
  {
    if (isset($_SESSION[$key])) {
      unset($_SESSION[$key]);
    }
  }
  public function destroy()
  {
    session_destroy();
  }
}
