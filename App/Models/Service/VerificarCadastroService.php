<?php

namespace App\Models\Service;

use App\DTOs\UserDTO;
use App\Models\User;

class VerificarCadastroService
{

    public function __construct(
        private readonly UserDTO $usuarioDTO
    ) {
    }

    public function execute(): ?User
    {
        if ($this->usuarioDTO->senha != $this->usuarioDTO->confirmarSenha) {
            return null;
        }

        $senhaCripto = password_hash($this->usuarioDTO->senha, PASSWORD_DEFAULT);

        $usuario = new User();
        $usuario->setNome($this->usuarioDTO->nome);
        $usuario->setSobrenome($this->usuarioDTO->sobrenome);
        $usuario->setGenero($this->usuarioDTO->genero);
        $usuario->setCpf($this->usuarioDTO->cpf);
        $usuario->setEmail($this->usuarioDTO->email);
        $usuario->setSenha($senhaCripto);
      
   
        return $usuario;
    }

    
}
