<?php

namespace App\Models\Service;

use App\Models\User;
use App\DTOs\UserDTO;

class ValidaSenhaService 
{
    public function __construct(
        private readonly UserDTO $usuarioDTO
    ) {
    }

    public function execute(): ? User
    {
        if ($this->usuarioDTO->senha != $this->usuarioDTO->confirmarSenha) {
            return null;
        }

        $senhaCripto = password_hash($this->usuarioDTO->senha, PASSWORD_DEFAULT);

        $usuario = new User();
        $usuario->setSenha($senhaCripto);
        return $usuario;
    }
}
