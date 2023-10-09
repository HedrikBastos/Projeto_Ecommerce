<?php

namespace src\Models;

class UserDTO
{

    public function __construct(
        public readonly string $name,
        public readonly string $username,
        public readonly string $email,
        public readonly string $password,
        public readonly string $passwordConfirm
    ) {
    }
}
