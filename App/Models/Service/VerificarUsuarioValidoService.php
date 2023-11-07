<?php

namespace App\Models\Service;
use App\DTOs\UserDTO;
use App\Models\User;

class VerificarUsuarioValidoService
{
    public function __construct(
        private readonly UserDTO $userDTO
    ) {
    }

    public function execute(): ?User
    {
       
        $usuario = new User();
        $usuario->setEmail($this->userDTO->email);
        $usuario->setSenha($this->userDTO->senha);
      
        return $usuario;
    }
}
