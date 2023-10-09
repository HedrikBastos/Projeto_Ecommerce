<?php
namespace src\Controllers;

class  RegisterController 
{
    public function index()
    {
        \src\Views\MainView::renderizar('register');
    }
}