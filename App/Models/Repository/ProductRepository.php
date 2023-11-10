<?php

namespace App\Models\Repository;
use App\Config\Connection;
use App\Models\Produto;

class ProductRepository
{
    public function __construct(
        private readonly Produto $produto
    ) {
    }

    public static function selectProdutos()
    {
        $connection = Connection::connect();
        $sql = $connection->prepare("SELECT * FROM produtos");
        $sql->execute();
        $result = $sql->fetchAll();

        return $result;
    }

    public static function selectNome(string $pesquisa)
    {
        $connection = Connection::connect();
        $sql = $connection->prepare('SELECT id_produto, nome FROM produtos WHERE nome LIKE :NOME');
        $sql->bindValue(':NOME', '%' . $pesquisa . '%', \PDO::PARAM_STR);
        $sql->execute();
        $result = $sql->fetchAll();

        return $result;
    }

    public function insertProduto()
    {
        $connection = Connection::connect();

        $nome = $this->produto->nome();
        $preco = $this->produto->preco();
        $categoria = $this->produto->categoria();
        $descricao = $this->produto->descricao();
        $estoque = (int) $this->produto->estoque();
        $imagem = $this->produto->path();

        $sql = $connection->prepare("INSERT INTO produtos (nome, preco, categoria, descricao, imagem) VALUES (:NOME, :PRECO, :CATEGORIA, :DESCRICAO, :IMAGEM)");
        $sql->bindValue(':NOME', $nome, \PDO::PARAM_STR);
        $sql->bindValue(':PRECO', $preco, \PDO::PARAM_INT);
        $sql->bindValue(':CATEGORIA', $categoria, \PDO::PARAM_STR);
        $sql->bindValue(':DESCRICAO', $descricao, \PDO::PARAM_STR);
        $sql->bindValue(':IMAGEM', $imagem, \PDO::PARAM_STR);
        $sql->execute();

        $id = $connection->lastInsertId();

        $sql = $connection->prepare("INSERT INTO estoque (id_produto, quantidade) VALUES (:ID, :ESTOQUE)");
        $sql->bindValue(':ID', $id, \PDO::PARAM_STR);
        $sql->bindValue(':ESTOQUE',  $estoque, \PDO::PARAM_INT);
        $sql->execute();
    }

    public function insertEstoque()
    {
        $connection = Connection::connect();
        $nome = $this->produto->nome();
        $estoqueAlteracao = $this->produto->estoque();

        $sql = $connection->prepare('SELECT * FROM produtos WHERE nome = :NOME');
        $sql->bindValue(':NOME', $nome, \PDO::PARAM_STR);
        $sql->execute();
        $produto = $sql->fetch();

        $id = $produto['id_produto'];

        echo $id;

        $sql = $connection->prepare('SELECT * FROM estoque WHERE id_estoque = :ID');
        $sql->bindValue(':ID', $id, \PDO::PARAM_STR);
        $sql->execute();
        $estoque = $sql->fetch();

        $novoEstoque = $estoque['quantidade'] + $estoqueAlteracao;

        $sql = $connection->prepare("UPDATE estoque SET quantidade = :QUANTIDADE WHERE id_estoque = :ID");
        $sql->bindValue(':ID', $id, \PDO::PARAM_STR);
        $sql->bindValue(':QUANTIDADE', $novoEstoque, \PDO::PARAM_INT);
        $sql->execute();
    }
}
