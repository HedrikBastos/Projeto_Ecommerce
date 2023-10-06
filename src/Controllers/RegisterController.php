<?php
//Esse arquivo seria tipo o Cadastro.php daquela sua atividade, a gente receberia os dados das views aqui e instânciaria os classes do Model aqui para tratar e fazer diversas coisas com os dados.
//Lembrando que provavelmente vai ter que ter mais inputs
if (isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['passwordConfirm']) ) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['passowrd'];
    $passwordConfirm = $_POST['passwordConfirm'];

    //intância do UserDTO.

    
}