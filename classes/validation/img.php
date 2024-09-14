<?php

namespace classes\validation;

require_once 'validationInterface.php';
class Img implements ValidationInterface
{
  public function validate($name, $value)
  {
    $extensions = ['jpg', 'jpeg', 'png', 'gif'];
    $extension = pathinfo($value, PATHINFO_EXTENSION);
    if (!empty($value) && !in_array($extension, $extensions)) {
      return "$name must be an image";
    }
    return false;
  }
}
