<?php

namespace App\Controllers;

class SairController
{
    public function index()
    {
        session_destroy();
        \App\Views\MainView::renderizar('login');
        die();
    }
}
