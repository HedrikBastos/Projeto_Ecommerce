<?php

namespace Src\Models\Service;

use Src\DTOs\UserDTO;
use Src\Models\User;

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
