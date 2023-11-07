<?php

namespace App\Models\Service;

use App\Models\Endereco;
use App\Config\Connection;

class CadastrarEnderecoService
{
    public function __construct(
        private readonly Endereco $endereco
    ) {
    }

    public function execute(): bool
    {

        try {
            $rua = $this->endereco->rua();
            $numero = $this->endereco->numero();
            $complemento = $this->endereco->complemento();
            $bairro = $this->endereco->bairro();
            $cidade = $this->endereco->cidade();
            $uf = $this->endereco->uf();
            $cep = $this->endereco->cep();
            $telefone = $this->endereco->telefone();
            $id_usuario = intval($_SESSION['id_usuario']);
            $pdo = Connection::connect();
            
            if (!$pdo->inTransaction()) {
                $pdo->beginTransaction();
            }

            $cadastraEndereco = $pdo->prepare("INSERT INTO enderecos (id_usuario, cep, cidade, uf, rua, numero, complemento, bairro, telefone) VALUES (:id_usuario, :cep, :cidade, :uf, :rua, :numero, :complemento, :bairro, :telefone)");
            $cadastraEndereco->bindParam(':id_usuario', $id_usuario, \PDO::PARAM_INT);
            $cadastraEndereco->bindParam(':cep', $cep, \PDO::PARAM_STR);
            $cadastraEndereco->bindParam(':cidade', $cidade, \PDO::PARAM_STR);
            $cadastraEndereco->bindParam(':uf', $uf, \PDO::PARAM_STR);
            $cadastraEndereco->bindParam(':rua', $rua, \PDO::PARAM_STR);
            $cadastraEndereco->bindParam(':numero', $numero, \PDO::PARAM_STR);
            $cadastraEndereco->bindParam(':complemento', $complemento, \PDO::PARAM_STR);
            $cadastraEndereco->bindParam(':bairro', $bairro, \PDO::PARAM_STR);
            $cadastraEndereco->bindParam(':telefone', $telefone, \PDO::PARAM_STR);

            $cadastraEndereco->execute();

            $pdo->commit();
            return true;
        } catch (\PDOException $e) {
            Connection::connect()->rollBack();
            return false;
        }
    }
}
