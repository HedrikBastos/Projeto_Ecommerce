<?php

namespace App\Models;

use App\Models\UserDTO;
use App\Models\Repository\UserRepository;

// Aqui ficaria a parte relacionado ao sistema de login(Conhecido como Autenticação)
class Authentication
{

    public function __construct(private readonly UserDTO $UserDTO)
    {
    }

    public function authentic()
    {
        //Tem usando esse try catch e tem usando só os if,
        //Uma observação, estamos tratando e validando, mas os erros não estão na página que o usuário estava, verificar isso depois.

        $UserRepository = new UserRepository($this->UserDTO);
        $sql = $UserRepository->select();
        $data = $sql->fetch();
        $hash = $data['password'];
        try {
            if ($sql->rowCount() < 1) {
                unset($_SESSION['email']);
                throw new \InvalidArgumentException('Esse email não está cadastrado!');
            }

            if (!password_verify($this->UserDTO->password, $hash)) {
                unset($_SESSION['email']);
                throw new \InvalidArgumentException('Senha incorreta!');
            } 

            $_SESSION['email'] = $this->UserDTO->email;
            header("Location:../Views/pages/products.php");

        } catch (\InvalidArgumentException $e) {
            unset($_SESSION['email']);
            echo 'ERRO NO LOGIN: '. $e->getMessage();
        }
    }
}
