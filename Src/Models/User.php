<?php

namespace Src\Models;

class User
{
    public function __construct(
        private string $email,
        private string $nome,
        private string $sobrenome,
        private string $senha,
        private string $cpf,
        private string $genero
    ) {
    }

    public function email(): string
    {
        return $this->email;
    }

    public function nome(): string
    {
        return $this->nome;
    }

    public function sobrenome(): string
    {
        return $this->sobrenome;
    }

    public function senha(): string
    {
        return $this->senha;
    }

    public function cpf(): string
    {
        return $this->cpf;
    }

    public function genero(): string
    {
        return $this->genero;
    }
}
