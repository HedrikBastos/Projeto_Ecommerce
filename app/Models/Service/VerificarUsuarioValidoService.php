App<?php

namespace App\Models\Service;
use App\Models\UserDTO;
use App\Models\User;

class VerificarUsuarioValidoService
{

    public function __construct(
        private readonly UserDTO $usuarioDTO
    ) 
    {
    }

    public function execute():? User
    {
        $usuario = new User();
        $usuario->setEmail($this->usuarioDTO->email);
        $usuario->setSenha($this->usuarioDTO->password);
        return $usuario;
    }
}
