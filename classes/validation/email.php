<?php

namespace classes\validation;

require_once 'validationInterface.php';
class Email implements ValidationInterface
{
  public function validate($name, $value)
  {
    if (!empty($value) && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
      return "$name must be a valid email address";
    }
    return false;
  }
}
