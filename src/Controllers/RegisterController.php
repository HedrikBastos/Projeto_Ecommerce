<?php
require_once(__DIR__ . '../../Models/UserDTO.php');

use App\Models\UserDTO;
use App\Models\UserReposity;
use App\Models\Validations;
use App\Repository\UserRepository;

//Esse arquivo seria tipo o Cadastro.php daquela sua atividade, a gente receberia os dados das views aqui e instânciaria os classes do Model aqui para tratar e fazer diversas coisas com os dados.
//Lembrando que provavelmente vai ter que ter mais inputs
if (isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['passwordConfirm'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['passowrd'];
    $passwordConfirm = $_POST['passwordConfirm'];

    //Ainda tem várias validações que serão feitas, aqui só tá a base por enquanto.

    //Instância do UserDTO.
    $UserDTO = new UserDTO($name, $surname, $email, $password, $passwordConfirm);

    //Instância de validações;
    $Validations = new Validations($UserDTO);
    $Validations->valid();

    //Instância inserindo os dados.
    $UserRepository = new UserReposity($UserDTO);
    $UserRepository->insert();

}
