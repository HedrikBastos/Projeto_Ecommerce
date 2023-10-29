<?php

namespace App\Models;

class Produto
{
    private string $nome;
    private int $preco;
    private string $categoria;
    private string $descricao;
    private int $estoque;
    private string $path;

    public function nome(): string
    {
        return $this->nome;
    }

    public function preco(): int
    {
        return $this->preco;
    }

    public function categoria(): string
    {
        return $this->categoria;
    }

    public function descricao(): string
    {
        return $this->descricao;
    }

    public function estoque(): int
    {
        return $this->estoque;
    }

    public function path(): string
    {
        return $this->path;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function setPreco(int $preco)
    {
        $this->preco = $preco;
    }

    public function setCategoria(string $categoria)
    {
        $this->categoria = $categoria;
    }

    public function setDescricao(string $descricao)
    {
        $this->descricao = $descricao;
    }

    public function setEstoque(int $estoque)
    {
        $this->estoque = $estoque;
    }

    public function setPath(string $path)
    {
        $this->path = $path;
    }
}
