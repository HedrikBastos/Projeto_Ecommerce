<?php 
namespace App\Views;

class MainView{
    public static function renderizar($nomeArquivo, $variaveis = []){
        extract($variaveis); 
        
        include('pages/'.$nomeArquivo.'.php');
    } 
}
