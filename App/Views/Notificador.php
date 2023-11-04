<?php

namespace App\Views;

class Notificador
{
    public static function notificar($mensagem, $status)
    {

        if ($status == 'erro') {
            echo '<div id="mensagem" class=" notificacao erro">' . $mensagem . '</div>';
        }
        if ($status == 'sucesso') {
            echo '<div id="mensagem" class="notificacao sucesso">' . $mensagem . '</div>';
        }
    }
}
