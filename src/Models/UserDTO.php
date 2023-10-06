<?php

//DTO:Data Transfer Object.

namespace App\Models;

class UserDTO
{

    public function __construct(
        public readonly string $name,
        public readonly string $surname,
        public readonly string $email,
        public readonly string $password,
        public readonly string $passwordConfirm
    ) {
    }
}
