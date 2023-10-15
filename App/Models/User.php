<?php
namespace App\Models;

class User
{
    private string $email;
    private string $nome;
    private string $sobrenome;
    private string $senha;
    private string $cpf;
    private string $genero;


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

    public function setEmail($email)
    {
        $this->email = $email;
    }


    public function setNome($nome)
    {
        $this->nome = $nome;
    }


    public function setSobrenome($sobrenome)
    {
        $this->sobrenome = $sobrenome;
    }


    public function setSenha($senha)
    {
        $this->senha = $senha;
    }


    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }


    public function setGenero($genero)
    {
        $this->genero = $genero;
    }
}
