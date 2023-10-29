<?php

namespace App\Models\Service;
use App\DTOs\ProdutoDTO;
use App\Models\Produto;

class ValidaProdutos
{

    public function __construct(
        private readonly ProdutoDTO $produtoDTO
    ) {
    }

    public function validaNovoProduto(): ?Produto
    {

        if (!$this->validaNome($this->produtoDTO->nome)) {
            echo 'Nome deu errado';
        }

        if (!$this->validaPreco($this->produtoDTO->preco)) {
            echo 'Preco deu errado';
        }

        if (!$this->validaCategoria($this->produtoDTO->categoria)) {
            echo 'Categoria deu errado';
        }

        if (!$this->validaDescricao($this->produtoDTO->descricao)) {
            echo 'Descricao incorreta';
        }

        if (!$this->validaEstoque($this->produtoDTO->estoque)) {
            echo 'Estoque incorreto';
        }


        $produto = new Produto();
        $produto->setNome($this->produtoDTO->nome);
        $produto->setPreco($this->produtoDTO->preco);
        $produto->setCategoria($this->produtoDTO->categoria);
        $produto->setDescricao($this->produtoDTO->descricao);
        $produto->setEstoque($this->produtoDTO->estoque);
        $produto->setPath($this->produtoDTO->path);

        return $produto;
    }

    public function validaNovoEstoque(): ?Produto
    {

        if (!$this->validaNome($this->produtoDTO->nome)) {
            echo 'Nome deu errado';
        }

        if (!$this->validaEstoque($this->produtoDTO->estoque)) {
            echo 'Estoque incorreto';
        }

        $produto = new Produto();
        $produto->setNome($this->produtoDTO->nome);
        $produto->setEstoque($this->produtoDTO->estoque);
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

    private function validaDescricao(string $descricao): bool
    {
        $descricao = trim($descricao);
        return preg_match('/[^\p{L}\p{N}\s]/u', $descricao) === 0;
    }

    private function validaEstoque(int $estoque): bool
    {
        return filter_var($estoque, FILTER_VALIDATE_INT) == true;
    }

}
