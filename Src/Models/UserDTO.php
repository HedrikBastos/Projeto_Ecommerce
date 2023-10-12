<?php

namespace Src\Models;

class UserDTO
{

    public function __construct(
        public readonly string $nome,
        public readonly string $sobrenome,
        public readonly string $email,
        public readonly string $senha,
        public readonly string $senhaConfirm
    ) {
    }
}
