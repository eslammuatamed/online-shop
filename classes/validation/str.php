<?php

namespace classes\validation;

require_once 'validationInterface.php';
class Str implements ValidationInterface
{
  public function validate($name, $value)
  {
    if (is_numeric($value)) {
      return "$name must be a string";
    }
    return false;
  }
}
