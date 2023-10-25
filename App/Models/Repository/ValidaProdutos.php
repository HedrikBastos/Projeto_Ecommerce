<?php

namespace App\Models\Repository;

use App\DTOs\ProdutoDTO;
use App\Models\Produto;

class ValidaProdutos
{

    public function __construct(
        private readonly ProdutoDTO $produtoDTO
    ) {
    }

    public function execute(): ?Produto
    {

        if (!$this->validaNome($this->produtoDTO->nome)) {
            echo 'nome deu errado';
        }

        if (!$this->validaPreco($this->produtoDTO->preco)) {
            echo 'preco deu errado';
        }

        if (!$this->validaCategoria($this->produtoDTO->categoria)) {
            echo 'categoria deu errado';
        }

        $produto = new Produto();
        $produto->setNome($this->produtoDTO->nome);
        $produto->setPreco($this->produtoDTO->preco);
        $produto->setCategoria($this->produtoDTO->categoria);
        $produto->setPath($this->produtoDTO->path);

        return $produto;
    }
    private function validaNome(string $nome): bool
    {
        $nome = trim($nome);
        return preg_match('/[^\p{L}\p{N}\s]/u', $nome) === 0;
    }

    private function validaPreco(int $preco): bool
    {
        return filter_var($preco, FILTER_VALIDATE_INT) == true;
    }

    private function validaCategoria(string $categoria): bool
    {
        $categoriasValidas = ['Smarthphones', 'TVs', 'Monitores','Computadores','Fones','Teclados','Mouses'];
        return in_array($categoria, $categoriasValidas) == true;
    }

}
