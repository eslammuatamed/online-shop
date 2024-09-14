<?php

namespace classes\validation;

require_once 'validationInterface.php';
class Required implements ValidationInterface
{
  public function validate($name, $value)
  {
    if (empty($value)) {
      return "$name is required";
    }
    return false;
  }
}
