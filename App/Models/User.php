<?php
namespace App\Models;

class User
{
   public function __construct( 
    private string $email,
    private string $nome,
    private string $senha){
   }

    public function email(): string
    {
        return $this->email;
    }

    public function nome(): string
    {
        return $this->nome;
    }

    public function senha(): string
    {
        return $this->senha;
    }
}
