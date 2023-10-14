<?php 
namespace App\Views;

class MainView{
    public static function renderizar($nomeArquivo, $variaveis = []){
        extract($variaveis); // Extrair as variáveis para que elas estejam disponíveis no arquivo de template
        include('pages/'.$nomeArquivo.'.php');
    } 
}
