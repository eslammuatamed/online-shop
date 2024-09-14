<?php

namespace classes\validation;

require_once 'email.php';
require_once 'number.php';
require_once 'required.php';
require_once 'str.php';
require_once 'img.php';
require_once 'max.php';


class Validator
{
  public $errors = [];
  public function makeValidation($name, $value, $opj)
  {
    $error = $opj->validate($name, $value);
    return $error;
  }
  public function rules($name, $value, $rules)
  {

    foreach ($rules as $rule) {
      if ($rule == 'email') {
        $error = $this->makeValidation($name, $value, new Email);
      } elseif ($rule == 'number') {
        $error = $this->makeValidation($name, $value, new Number);
      } elseif ($rule == 'required') {
        $error = $this->makeValidation($name, $value, new Required);
      } elseif ($rule == 'str') {
        $error = $this->makeValidation($name, $value, new Str);
      } elseif ($rule == 'img') {
        $error = $this->makeValidation($name, $value, new Img);
      } elseif ($rule == 'max') {
        $error = $this->makeValidation($name, $value, new Max);
      } else {
        $error = false;
      }
      if ($error) {
        $this->errors[] = $error;
      }
    }
  }
}
