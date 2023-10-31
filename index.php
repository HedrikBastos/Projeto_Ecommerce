<?php

session_start();

require('vendor/autoload.php');

define('INCLUDE_PATH_STATIC', 'http://localhost/Ecommerce/App/assets/');
define('INCLUDE_PATH_PAGES', 'App/Views/pages/');
define('INCLUDE_PATH', 'http://localhost/Ecommerce/');


$app = new \App\Application();

$app->run();


