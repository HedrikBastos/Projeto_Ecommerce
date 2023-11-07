<?php

namespace App\Controllers;
use App\Views\MainView;
class  RegisterController
{
    public function index()
    {
        if (isset($_SESSION['login'])) {
            header('Location:home');
            die();
        }
        MainView::renderizar('register');
        
    }
}
