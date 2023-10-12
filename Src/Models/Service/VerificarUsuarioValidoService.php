<?php

namespace src\Models\Service;
use Src\Models\UserDTO;
use Src\Models\User;

class VerificarUsuarioValidoService
{

    public function execute(UserDTO $usuarioDTO):? User
    {
        $usuario = new User($usuarioDTO->email,'','',$usuarioDTO->senha,'','');

        return $usuario;
    }
}
