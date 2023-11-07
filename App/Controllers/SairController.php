<?php

namespace App\Controllers;

class SairController
{
    public function index()
    {   
        session_destroy();
        header('Location:login');
        die();
    }
}
