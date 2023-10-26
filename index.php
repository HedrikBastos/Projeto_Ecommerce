<?php

session_start();

require('vendor/autoload.php');

define('INCLUDE_PATH_STATIC', 'App/assets/');
define('INCLUDE_PATH', 'App/');
define('INCLUDE_PATH_PAGES', 'App/Views/pages/');

$app = new \App\Application();

$app->run();


