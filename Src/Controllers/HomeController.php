<?php

namespace Src\Controllers;

class HomeController
{

    public function index()
    {
        if (isset($_SESSION['login'])) {
            \Src\Views\MainView::renderizar('home');
        } else {
            \Src\Views\MainView::renderizar('login');  
        }
    }
}
