<?php

session_start();

require('vendor/autoload.php');

define('INCLUDE_PATH_STATIC', 'app/assets/');
define('INCLUDE_PATH', 'app/Views/pages/');

$app = new \App\Application();

$app->run();

//"C:\xampp\htdocs\Ecommerce"