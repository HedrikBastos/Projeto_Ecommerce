<?php
namespace Src\Controllers;

class  RegisterController 
{
    public function index()
    {
        \Src\Views\MainView::renderizar('register');
    }
}