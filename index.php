<?php

session_start();

require('vendor/autoload.php');

define('INCLUDE_PATH_STATIC', 'C:/xampp/htdocs/Projeto/Projeto_Ecommerce/src/Views/pages/');
define('INCLUDE_PATH', 'http://localhost/htdocs/projeto_ecommerce/');

$app = new \App\Application();

$app->run();
