<?php
    session_start();

    require('../vendor/autoload.php');

    $app = new \App\Application();
    
    $app->run();
