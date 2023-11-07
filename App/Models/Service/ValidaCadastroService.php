<?php

namespace App\Models\Service;

use App\DTOs\UserDTO;
use App\Models\User;

class ValidaCadastroService
{

    public function __construct(
        private readonly UserDTO $usuarioDTO
    ) {
    }

    public function execute(): ? User
    {
        if ($this->usuarioDTO->senha != $this->usuarioDTO->confirmarSenha) {
            return null;
        }

        $senhaCripto = password_hash($this->usuarioDTO->senha, PASSWORD_DEFAULT);

        if ($this->validaEmail($this->usuarioDTO->email) == false) {
            return null;
        }

        $nomeTratado = $this->LimpaStrings($this->usuarioDTO->nome);

        if ($nomeTratado == false) {
            return null;
        }

        $sobrenomeTratado = $this->LimpaStrings($this->usuarioDTO->sobrenome);
        if ($sobrenomeTratado == false) {
            return null;
        }

        $emailTatado = $this->validaEmail($this->usuarioDTO->email);
        if ($emailTatado == false) {
            return null;
        }
 
        $contraSenhaTratado = $this->LimpaStrings($this->usuarioDTO->contraSenha);
        if ($contraSenhaTratado == false ) {
            return null;
        }
        
        $cpfTratado = $this->LimpaCpf($this->usuarioDTO->cpf);
        $usuario = new User();
        $usuario->setNome($nomeTratado);
        $usuario->setSobrenome($sobrenomeTratado);
        $usuario->setGenero($this->usuarioDTO->genero);
        $usuario->setCpf($cpfTratado);
        $usuario->setEmail($this->usuarioDTO->email);
        $usuario->setSenha($senhaCripto);
        $usuario->setContraSenha($contraSenhaTratado);


        return $usuario;
    }

    protected function validaEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    protected function LimpaStrings(string $string): string
    {
        return ucwords(trim(preg_replace('/[^A-Za-z\s]+/', '', $string)));
    }

    protected function LimpaCpf(string $cpf): string
    {
        return $cpf = preg_replace('/[^0-9]/', '', $cpf);
    }
}
