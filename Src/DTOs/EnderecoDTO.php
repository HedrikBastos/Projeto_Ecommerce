<?php

namespace Src\DTOs;

class EnderecoDTO
{
    public function __construct(
        public readonly string $rua,
        public readonly string $numero,
        public readonly string $complemento,
        public readonly string $bairro,
        public readonly string $cidade,
        public readonly string $uf,
        public readonly string $cep,
        public readonly string $telefone
    ) {
    }
}
