<?php
//Validações antes de registrar um usuário

namespace App\Models;
use App\Models\UserDTO;

class Validations
{

    public function __construct(private readonly UserDTO $UserDTO)
    {
    }

    public function valid()
    {
        //Vão ter várias validações que vou tentar fazer no js, se eu n conseguir faço aqui

        try {
            if (!filter_var($this->UserDTO->email, FILTER_VALIDATE_EMAIL)) {
                throw new \InvalidArgumentException('O endereço de e-mail não é válido.');
            }

            if ($this->UserDTO->password !== $this->UserDTO->passwordConfirm) {
                throw new \InvalidArgumentException('As senhas não batem.');
            }

            return true;
        } catch (\InvalidArgumentException $e) {
            echo 'OCORRE O SEGUINTE ERRO DE VALIDAÇÃO: ' . $e->getMessage();
        }
    }
}
