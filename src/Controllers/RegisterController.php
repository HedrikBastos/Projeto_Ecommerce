<?php
require_once(__DIR__ . '../../../vendor/autoload.php');

use App\Models\UserDTO;
use App\Models\Validations;
use App\Models\Repository\UserRepository;

//Esse arquivo seria tipo o Cadastro.php daquela sua atividade, a gente receberia os dados das views aqui e instânciaria os classes do Model aqui para tratar e fazer diversas coisas com os dados.
//Lembrando que provavelmente vai ter que ter mais inputs
if (isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['passwordConfirm'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];

    //Ainda tem várias validações que serão feitas, aqui só tá a base por enquanto.

    //Instância do UserDTO.
    $UserDTO = new UserDTO($name, $surname, $email, $password, $passwordConfirm);

    //Instância de validações;
    $Validations = new Validations($UserDTO);

    //Instância inserindo os dados.
    //Só inseri se todas as validações derem certo

    if ($Validations->valid() === true) {
        $UserRepository = new UserRepository($UserDTO);
        $UserRepository->insert();

        header("Location:../Views/pages/login.php");
    } else {
        header("Location:../Views/pages/register.php");
    }
}
