<?php

namespace App\Models\Repository;

use App\Models\Endereco;
use App\Config\Connection;

class EnderecoRepository
{
    public function autualizaEndereco(Endereco $endereco): bool
    {
        try {
            $conexao = Connection::connect();
            $atualizaEndereco = $conexao->prepare("UPDATE enderecos
             SET cep = :cep, cidade = :cidade, uf = :uf, rua = :rua, numero = :numero, complemento = :complemento, bairro = :bairro, telefone = :telefone
             WHERE id_usuario = :id_usuario");

            $atualizaEndereco->bindValue(':cep', $endereco->Cep(), \PDO::PARAM_STR);
            $atualizaEndereco->bindValue(':cidade', $endereco->cidade(), \PDO::PARAM_STR);
            $atualizaEndereco->bindValue(':uf', $endereco->Uf(), \PDO::PARAM_STR);
            $atualizaEndereco->bindValue(':rua', $endereco->Rua(), \PDO::PARAM_STR);
            $atualizaEndereco->bindValue(':numero', $endereco->Numero(), \PDO::PARAM_STR);
            $atualizaEndereco->bindValue(':complemento', $endereco->Complemento(), \PDO::PARAM_STR);
            $atualizaEndereco->bindValue(':bairro', $endereco->Bairro(), \PDO::PARAM_STR);
            $atualizaEndereco->bindValue(':telefone', $endereco->Telefone(), \PDO::PARAM_STR);
            $atualizaEndereco->bindValue(':id_usuario', $_SESSION['id_usuario'], \PDO::PARAM_INT);
            $atualizaEndereco->execute();
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function buscaEndereco($idUsuario): ?Endereco
    {
        try {
            $conexao = Connection::connect();
            $buscaEndereco = $conexao->prepare("SELECT * FROM enderecos
            WHERE id_usuario = :id_usuario");
            $buscaEndereco->bindParam(':id_usuario', $idUsuario, \PDO::PARAM_INT);
            $buscaEndereco->execute();

            if ($buscaEndereco->rowCount() === 0) {
                return null;
            }

            $dadosEndereco = $buscaEndereco->fetch(\PDO::FETCH_ASSOC);

            $endereco = new Endereco();
            $endereco->setCep($dadosEndereco['cep']);
            $endereco->setCidade($dadosEndereco['cidade']);
            $endereco->setUf($dadosEndereco['uf']);
            $endereco->setRua($dadosEndereco['rua']);
            $endereco->setNumero($dadosEndereco['numero']);
            $endereco->setComplemento($dadosEndereco['complemento']);
            $endereco->setBairro($dadosEndereco['bairro']);
            $endereco->setTelefone($dadosEndereco['telefone']);
            return $endereco;
        } catch (\PDOException $e) {
            return false;
        }
    }
}
