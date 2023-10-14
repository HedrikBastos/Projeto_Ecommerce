<?php
/*
namespace App\Models;
use App\Models\UserDTO;
use App\Models\UserRepository;

class Validations
{

    public function __construct(
        private readonly UserDTO $UserDTO)
    {
    }

    public function valid()
    {
        $UserRepository = new UserRepository($this->UserDTO);
        $sql = $UserRepository->select();

        try {

            if ($sql->rowCount() > 0) {
                throw new \InvalidArgumentException('Esse email já está cadastrado');
            }

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
*/