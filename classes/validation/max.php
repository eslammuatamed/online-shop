<?php

namespace classes\validation;

require_once 'validationInterface.php';
class Max implements ValidationInterface
{
  public function validate($name, $value)
  {
    if (strlen($value) > 100) {
      return "$name must be less than 100 characters";
    }
    return false;
  }
}
