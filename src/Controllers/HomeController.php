<?php

namespace src\Controllers;

class HomeController
{

    public function index()
    {
        if (isset($_SESSION['login'])) {
            \src\Views\MainView::renderizar('home');
        } else {
            \src\Views\MainView::renderizar('login');
          
        }
    }
}
