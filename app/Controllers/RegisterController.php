<?php

namespace App\Controllers;

class  RegisterController
{
    public function index()
    {
        \App\Views\MainView::renderizar('register');
    }
}
