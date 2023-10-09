<?php

    session_start();

    require('vendor/autoload.php');
    
    define('INCLUDE_PATH_STATIC','http://localhost/html/projeto_ecommerce/src/Views/pages/');
    define('INCLUDE_PATH','http://localhost/html/projeto_ecommerce/');

    $app = new \src\Application();
    
    $app->run();
