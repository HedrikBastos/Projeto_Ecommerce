<?php

namespace App\DTOs;

class ProdutoDTO
{
    public function __construct(
        public readonly string $nome,
        public readonly string $preco,
        public readonly string $categoria,
        public readonly string $path,
    ) {
    }
}
