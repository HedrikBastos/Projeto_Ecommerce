<?php
namespace Src\Controllers;

class  RegisterController 
{
    public function index()
    {
        \src\Views\MainView::renderizar('register');
    }
}