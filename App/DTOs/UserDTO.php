<?php

namespace App\DTOs;

class UserDTO
{
    public function __construct(
        public readonly string $nome,
        public readonly string $sobrenome,
        public readonly string $genero,
        public readonly string $cpf,
        public readonly string $email,
        public readonly string $senha,
        public readonly string $confirmarSenha,
        public readonly string $contraSenha
    ) {
    }
}
