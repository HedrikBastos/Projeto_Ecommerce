<?php

namespace App\Models\Checkout;

class Key
{
    public static function getPublicKey()
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'https://sandbox.api.pagseguro.com/public-keys', [
            'body' => '{"type":"card"}',
            'headers' => [
                'Authorization' => 'Bearer 82E37249EB5347C9B8ADB53CFB5D61B5',
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
        ]);

        $jsonString = $response->getBody();

        // Decodificar o JSON para um array associativo
        $data = json_decode($jsonString, true);

        // Verificar se a decodificação foi bem-sucedida
        if ($data === null) {
            // Tratar erro na decodificação do JSON
            die('Erro ao decodificar o JSON');
        }
        // Acessar a chave 'public_key'
        $publicKey = $data['public_key'];
        return $publicKey;
    }
}
