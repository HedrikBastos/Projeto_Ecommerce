<?php

session_start();

require('vendor/autoload.php');

define('INCLUDE_PATH_STATIC', '/html/Projeto_Ecommerce/App/assets/');
define('INCLUDE_PATH_PAGES', 'App/Views/pages/');
define('INCLUDE_PATH', '/html/Projeto_Ecommerce/');

$app = new \App\Application();

$app->run();