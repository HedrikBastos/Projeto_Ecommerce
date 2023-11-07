<?php

namespace App\Controllers;
use App\Views\MainView;
class PerfilController
{
    public function index()
    {
        if (isset($_SESSION['login'])) {
            MainView::renderizar('perfil');
            die();
        }
        MainView::renderizar('error404');
    }
}
