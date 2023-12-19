<?php

namespace App\Models\Checkout;

use App\Models\Repository\UserRepository;
use App\Models\Repository\EnderecoRepository;

date_default_timezone_set('America/Sao_Paulo');

class PagSeguro
{
    private $dadosUsuario;
    private $dadosEndereco;
    private $dadosProduto;
    // private $encryptedCard;

    function __construct(UserRepository $userRepository, EnderecoRepository $enderecoRepository, $produtos, /*$encryptedCard = null*/)
    {
        $this->dadosUsuario = $userRepository->buscaUsuario($_SESSION['id_usuario']);
        $this->dadosEndereco = $enderecoRepository->buscaEndereco($_SESSION['id_usuario']);
        $this->dadosProduto = $produtos;
        // $this->encryptedCard = $encryptedCard;
    }

    public function boleto()
    {
        $expirationDate = new \DateTime(date('Y-m-d H:i:s'));
        $expirationDate->setTimezone(new \DateTimeZone('America/Sao_Paulo'));
        $expirationDate->modify('+2 days');
        $dateExpiration = $expirationDate->format('Y-m-d');

        $ddd = substr($this->dadosEndereco->Telefone(), 0, 2);

        $telefone = substr($this->dadosEndereco->Telefone(), 2);

        $data["reference_id"] = '123';
        $data["customer"] = [
            "name" => $this->dadosUsuario->nome(),
            "email" => $this->dadosUsuario->email(),
            "tax_id" => $this->dadosUsuario->cpf(),
            "phones" => [
                [
                    "country" => "55",
                    "area" => $ddd,
                    "number" => $telefone,
                    "type" => "MOBILE"
                ]
            ]
        ];

        foreach ($this->dadosProduto as $item) {
            $data["items"][] = [
                "reference_id" => "categoria",
                "name" => $item["nome"],
                "quantity" => $item["quantidade"] ?? 1,
                "unit_amount" => $item["preco"]
            ];
        }

        $data["shipping"] = [
            "address" => [
                "street" => $this->dadosEndereco->Rua(),
                "number" => $this->dadosEndereco->Numero(),
                "complement" => $this->dadosEndereco->Complemento(),
                "locality" => $this->dadosEndereco->Cidade(),
                "city" => $this->dadosEndereco->Cidade(),
                "region_code" => $this->dadosEndereco->Uf(),
                "country" => "BRA",
                "postal_code" => "00000000"
            ]
        ];

        $data["notification_urls"] = [
            "https://meusite.com/notificacoes"
        ];

        $data['charges'] =  [
            [
                "reference_id" => "referencia da cobranca",
                "description" => "descricao da cobranca",
                "amount" => [
                    "value" => 500,
                    "currency" => "BRL"
                ],
                "payment_method" => [
                    "type" => "BOLETO",
                    "boleto" => [
                        "due_date" => $dateExpiration,
                        "instruction_lines" => [
                            "line_1" => "Pagamento processado para DESC Fatura",
                            "line_2" => "Via PagSeguro"
                        ],
                        "holder" => [
                            "name" => "Jose da Silva",
                            "tax_id" => "22222222222",
                            "email" => "jose@email.com",
                            "address" => [
                                "country" => "Brasil",
                                "region" => "São Paulo",
                                "region_code" => "SP",
                                "city" => "Sao Paulo",
                                "postal_code" => "01452002",
                                "street" => "Avenida Brigadeiro Faria Lima",
                                "number" => "1384",
                                "locality" => "Pinheiros"
                            ]
                        ]
                    ]
                ]
            ]
        ];

        $curl = curl_init('https://sandbox.api.pagseguro.com/orders');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: '
        ));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        $retorno = curl_exec($curl);
        curl_close($curl);
        return $retorno;
    }

    public function pix()
    {

        $expirationDate = new \DateTime(date('Y-m-d H:i:s'));
        $expirationDate->setTimezone(new \DateTimeZone('America/Sao_Paulo'));
        $expirationDate->modify('+30 minutes');
        $dateExpiration = $expirationDate->format('Y-m-d\TH:i:sP');

        $ddd = substr($this->dadosEndereco->Telefone(), 0, 2);

        $telefone = substr($this->dadosEndereco->Telefone(), 2);

        $data["reference_id"] = '123';
        $data["customer"] = [
            "name" => $this->dadosUsuario->nome(),
            "email" => $this->dadosUsuario->email(),
            "tax_id" => $this->dadosUsuario->cpf(),
            "phones" => [
                [
                    "country" => "55",
                    "area" => $ddd,
                    "number" => $telefone,
                    "type" => "MOBILE"
                ]
            ]
        ];

        foreach ($this->dadosProduto as $item) {
            $data["items"][] = [
                "name" => $item["nome"],
                "quantity" => $item["quantidade"] ?? 1,
                "unit_amount" => $item["preco"]
            ];
        }

        $data["qr_codes"] = [
            [
                "amount" => [
                    "value" => $item["preco"]
                ],
                "expiration_date" => $dateExpiration,
            ]
        ];
        $data["shipping"] = [
            "address" => [
                "street" => $this->dadosEndereco->Rua(),
                "number" => $this->dadosEndereco->Numero(),
                "complement" => $this->dadosEndereco->Complemento(),
                "locality" => $this->dadosEndereco->Cidade(),
                "city" => $this->dadosEndereco->Cidade(),
                "region_code" => $this->dadosEndereco->Uf(),
                "country" => "BRA",
                "postal_code" => "00000000"
            ]
        ];
        $data["notification_urls"] = [
            "https://meusite.com/notificacoes"
        ];

        $curl = curl_init('https://sandbox.api.pagseguro.com/orders');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: '
        ));

        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        $retorno = curl_exec($curl);
        curl_close($curl);
        return $retorno;
    }
    /*
    public function credito()
    {

        $ddd = substr($this->dadosEndereco->Telefone(), 0, 2);

        $telefone = substr($this->dadosEndereco->Telefone(), 2);

        $encryptedCard = $this->encryptedCard;

        $data['reference_id'] = "ex-00001";
        $data["customer"] = [
            "name" => $this->dadosUsuario->nome(),
            "email" => $this->dadosUsuario->email(),
            "tax_id" => $this->dadosUsuario->cpf(),
            "phones" => [
                [
                    "country" => "55",
                    "area" => $ddd,
                    "number" => $telefone,
                    "type" => "MOBILE"
                ]
            ]
        ];
        foreach ($this->dadosProduto as $item) {
            $data["items"][] = [
                "reference_id" => "categoria",
                "name" => $item["nome"],
                "quantity" => $item["quantidade"] ?? 1,
                "unit_amount" => $item["preco"]
            ];
        }
        $data["shipping"] = [
            "address" => [
                "street" => $this->dadosEndereco->Rua(),
                "number" => $this->dadosEndereco->Numero(),
                "complement" => $this->dadosEndereco->Complemento(),
                "locality" => $this->dadosEndereco->Cidade(),
                "city" => $this->dadosEndereco->Cidade(),
                "region_code" => $this->dadosEndereco->Uf(),
                "country" => "BRA",
                "postal_code" => "00000000"
            ]
        ];

        $data['charges'] =  [
            [
                "reference_id" => "referencia da cobranca",
                "description" => "descricao da cobranca",
                "amount" => [
                    "value" => 500,
                    "currency" => "BRL"
                ],
                "payment_method" => [
                    "type" => "CREDIT_CARD",
                    "installments" => 1,
                    "capture" => true,
                    "soft_descriptor" => "IntegraçãoPagBank",
                    "card" => [
                        "encrypted" => $encryptedCard,
                        "security_code" => "123",
                        "holder" => [
                            "name" => $this->dadosUsuario->nome()
                        ],
                        "store" => true
                    ]
                ]
            ]
        ];

        //CURL
        $curl = curl_init('https://sandbox.api.pagseguro.com/orders');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: '
        ));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        $retorno = curl_exec($curl);
        curl_close($curl);
        return $retorno;
    }
    */
}
