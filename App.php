<?php

use classes\validation\Validator;

require_once 'classes/Product.php';
require_once 'classes/Str.php';
require_once 'classes/Request.php';
require_once 'classes/img.php';
require_once 'classes/validation/validator.php';
require_once 'classes/session.php';
$product = new Product();
$str = new Str();
$request = new Request();
$validate = new Validator();
$session = new Session();
