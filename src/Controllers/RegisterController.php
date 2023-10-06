<?php
require_once(__DIR__ . '../../Models/UserDTO.php');

use App\Models\UserDTO;
use App\Models\Validations;

//Esse arquivo seria tipo o Cadastro.php daquela sua atividade, a gente receberia os dados das views aqui e instânciaria os classes do Model aqui para tratar e fazer diversas coisas com os dados.
//Lembrando que provavelmente vai ter que ter mais inputs
if (isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['passwordConfirm'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['passowrd'];
    $passwordConfirm = $_POST['passwordConfirm'];

    //intância do UserDTO.
    $UserDTO = new UserDTO($name, $surname, $email, $password, $passwordConfirm);

    //intância de validações
    $Validations = new Validations($UserDTO);
    $Validations->valid();


    //intância inserindo os dados
}
