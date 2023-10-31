<?php

session_start();

require('vendor/autoload.php');

define('INCLUDE_PATH_STATIC', 'http://localhost/html/Projeto_Ecommerce/App/assets/');
define('INCLUDE_PATH', 'http://localhost/html/Projeto_Ecommerce/');
define('INCLUDE_PATH_PAGES', 'App/Views/pages/');

$app = new \App\Application();

$app->run();


