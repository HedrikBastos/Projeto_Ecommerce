<?php

namespace src\Models\Service;
use src\Models\UserDTO;
use src\Models\User;

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
