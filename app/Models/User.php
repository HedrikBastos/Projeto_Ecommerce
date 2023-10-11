<?php
namespace App\Models;
// Aqui dá para ser diversas coisas,tenho uma ideias, mas quero ouvir você depois.
// Essa classe seria a sua classe usuario onde teria os get e set.
// Tem um problema, acho que dá para evitar o uso dela, especialmente porque pelo que pesquisei o DTO é muito usado para evitar esse tipo de classe com get e set

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
