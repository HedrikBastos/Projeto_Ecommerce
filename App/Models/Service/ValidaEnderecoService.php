<?php

namespace App\Models\Service;

use App\DTOs\EnderecoDTO;
use App\Models\Endereco;

class ValidaEnderecoService extends ValidaCadastroService
{
    public function __construct(
        private readonly EnderecoDTO $enderecoDTO
    ) {
    }

    public function executeEndereco(): ?Endereco
    {
        $ruaTratada = $this->LimpaStrings($this->enderecoDTO->rua);
        if ($ruaTratada == false) {
            return false;
        }


        $numeroTratado = $this->LimpaNumero($this->enderecoDTO->numero);

        if ($numeroTratado == false) {
            return false;
        }

        $complementoTratado = $this->LimpaStrings($this->enderecoDTO->complemento);

        if ($complementoTratado == false) {
            return false;
        }

        $bairroTratado = $this->LimpaStrings($this->enderecoDTO->bairro);

        if ($bairroTratado == false) {
            return false;
        }

        $telefoneTradado = $this->validaTelefone($this->enderecoDTO->telefone);


        if ($telefoneTradado == false) {
            return false;
        }


        $cepTratado = $this->validaCep($this->enderecoDTO->cep);

        if ($cepTratado == false) {
            return false;
        }


        $ufTratado = $this->validaUf($this->enderecoDTO->uf);
        if ($ufTratado == false) {
            return false;
        }


        $cidadeTratada = $this->LimpaStrings($this->enderecoDTO->cidade);


        $endereco = new Endereco();
        $endereco->setRua($ruaTratada);
        $endereco->setNumero($numeroTratado);
        $endereco->setComplemento($complementoTratado);
        $endereco->setBairro($bairroTratado);
        $endereco->setTelefone($this->enderecoDTO->telefone);
        $endereco->setCep($cepTratado);
        $endereco->setCidade($cidadeTratada);
        $endereco->setUf($this->enderecoDTO->uf);

        return $endereco;
    }

    protected function validaUf($uf)
    {
        return preg_match('/^(AC|AL|AP|AM|BA|CE|DF|ES|GO|MA|MT|MS|MG|PA|PB|PR|PE|PI|RJ|RN|RS|RO|RR|SC|SP|SE|TO)$/', strtoupper($uf)) === 1;
    }

    protected function validaTelefone(int $telefone)
    {
        return (preg_match("/[0-9]{2}[6789][0-9]{4}[0-9]{4}/", $telefone));
    }

    protected function LimpaNumero(string $numero): string
    {
        return $numero = preg_replace('/[^0-9]/', '', $numero);
    }

    protected function validaCep($cep)
    {

        $cep = preg_replace('/\s|-/', '', $cep);

        if (preg_match('/^\d{8}$/', $cep)) {
            return $cep;
        } else {
            return false;
        }
    }
}
