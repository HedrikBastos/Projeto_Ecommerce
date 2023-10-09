<?php
//Verifica se o usuário está registrado no banco de dados, cria sua sessão e direciona para página de produtos

require_once(__DIR__.'../../../vendor/autoload.php');

use App\Models\UserDTO;
use App\Models\Authentication;

if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    //Tentar usar DTO para transição de dados

    $UserDTO = new UserDTO(
        '',
        '',
        $email,
        $password,
        ''
    );

    //Instância que vai fazer a autenticação && Redirecionamento para página de produtos caso seja cadastrado

    $Authentication = new Authentication($UserDTO);
    $Authentication->authentic();


}
