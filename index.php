<?php

session_start();

require('vendor/autoload.php');

define('INCLUDE_PATH_STATIC', 'http://localhost/htdocs/Projeto_Ecommerce/src/Views/pages/');
define('INCLUDE_PATH', 'http://localhost/htdocs/Projeto_Ecommerce/');

$app = new \Src\Application();

$app->run();
