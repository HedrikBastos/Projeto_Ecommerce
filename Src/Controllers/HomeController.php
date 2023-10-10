<?php

namespace Src\Controllers;

class HomeController
{

    public function index()
    {
        if (isset($_SESSION['login'])) {
            \Src\Views\MainView::renderizar('home');
        } else {
<<<<<<< HEAD:Src/Controllers/HomeController.php
            \Src\Views\MainView::renderizar('login');  
=======
            \Src\Views\MainView::renderizar('login');
          
>>>>>>> 419ed88 (Testando rebase):src/Controllers/HomeController.php
        }
    }
}
