<?php 
namespace src\Views;

class MainView{
    public static function renderizar($nomeArquivo){
        include('pages/'.$nomeArquivo.'.php');
    } 
}
