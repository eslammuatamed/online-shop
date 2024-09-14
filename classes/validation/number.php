<?php

namespace classes\validation;

require_once 'validationInterface.php';
class Number implements ValidationInterface
{
  public function validate($name, $value)
  {
    if (!empty($value) && !is_numeric($value)) {
      return "$name must be a number";
    }
    return false;
  }
}
