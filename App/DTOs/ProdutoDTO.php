<?php

namespace App\DTOs;

class ProdutoDTO
{
    public function __construct(
        public readonly string $nome,
        public readonly int $preco,
        public readonly string $categoria,
        public readonly string $descricao,
        public readonly int $estoque,
        public readonly string $path
    ) {
    }
}
