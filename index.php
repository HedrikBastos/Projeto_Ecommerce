<?php

session_start();

require('vendor/autoload.php');

define('INCLUDE_PATH_STATIC', 'App/assets/');
define('INCLUDE_PATH', 'App/');

$app = new \App\Application();

$app->run();

//"C:\xampp\htdocs\Ecommerce"
