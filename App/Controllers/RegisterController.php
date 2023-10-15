<?php

namespace App\Controllers;
use App\Views\MainView;
class  RegisterController
{
    public function index()
    {
        MainView::renderizar('register',['name'=>'Diogo']);
    }
}
