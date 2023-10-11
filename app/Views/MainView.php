<?php 
namespace App\Views;

class MainView{
    public static function renderizar($nomeArquivo){
        include('pages/'.$nomeArquivo.'.php');
    } 
}
