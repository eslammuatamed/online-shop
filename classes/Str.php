<?php
class Str
{
  public static function limit($str)
  {
    if (strlen($str) > 30) {
      return substr($str, 0, 30) . '...';
    }
    return $str;
  }
}
