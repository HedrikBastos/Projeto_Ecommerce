<?php

namespace App\Models;

class Produto
{
    private string $nome;
    private int $preco;
    private string $categoria;
    private string $path;

    public function nome()
    {
        return $this->nome;
    }

    public function categoria()
    {
        return $this->categoria;
    }

    public function preco()
    {
        return $this->preco;
    }

    public function path()
    {
        return $this->path;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function setCategoria(string $categoria)
    {
        $this->categoria = $categoria;
    }

    public function setPreco(int $preco)
    {
         $this->preco = $preco;
    }

    public function setPath(string $path)
    {
        $this->path = $path;
    }
}
