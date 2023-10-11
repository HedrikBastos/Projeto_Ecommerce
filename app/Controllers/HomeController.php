<?php

namespace App\Controllers;

class HomeController
{

    public function index()
    {
        if (isset($_SESSION['login'])) {
            \App\Views\MainView::renderizar('home');
        } else {
            \App\Views\MainView::renderizar('login');  
        }
    }
}
