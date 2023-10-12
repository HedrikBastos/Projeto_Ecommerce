App<?php

namespace App\Models\Service;
use App\Models\UserDTO;
use App\Models\User;

class VerificarUsuarioValidoService
{

    public function execute(UserDTO $usuarioDTO):? User
    {
        $usuario = new User($usuarioDTO->email,'','',$usuarioDTO->senha,'','');

        return $usuario;
    }
}
