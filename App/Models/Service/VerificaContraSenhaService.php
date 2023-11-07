<?php

namespace App\Models\Service;
use App\DTOs\UserDTO;
use App\Models\User;
class VerificaContraSenhaService
{
    public function __construct(
        private readonly UserDTO $usuarioDTO
    ) {
    }

    public function execute(): ?User
    {
        if ($this->validaEmail($this->usuarioDTO->email) == false) {
            return null;
        }

        $contraSenhaTratado = $this->LimpaStrings($this->usuarioDTO->contraSenha);
        if ($contraSenhaTratado == false) {
            return null;
        }

        $usuario = new User();
        $usuario->setEmail($this->usuarioDTO->email);
        $usuario->setContraSenha($contraSenhaTratado);
      
        return $usuario;
    }

    protected function LimpaStrings(string $string): string
    {
        return ucfirst(trim(preg_replace('/[^A-Za-z\s]+/', '', $string)));
    }

    protected function validaEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}

