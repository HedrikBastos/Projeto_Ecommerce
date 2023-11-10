<?php

namespace App\Controllers;

class MainController
{
    public static function renderizar($nomeArquivo, $variaveis = []){
        extract($variaveis); 
        
        include($nomeArquivo.'.php');
    } 
}
