<?php
//Validações antes de registrar um usuário

namespace App\Models;
use App\Models\UserDTO;
use App\Models\UserRepository;

class Validations
{

    public function __construct(private readonly UserDTO $UserDTO)
    {
    }

    public function valid()
    {
        $UserRepository = new UserRepository($this->UserDTO);
        $sql = $UserRepository->select();

        // Vão ter várias validações que vou tentar fazer no js, se eu n conseguir faço aqui

        try {

            // Criaria uma variável aqui, e cada exceção de cada if receberia ela se a condicional fosse verdaderia, ai daria um jeito de jogara essa funçã na view pelo controller e a gente estilizava a variável lá.
            // A ideia acima dá para ser feita com twig, mas o problema são as sessões, se eu consegui resolver o problema das sessões que encontrei dá para usar, se não vamos usar php seco na view mesmo
            if ($sql->rowCount() > 0) {
                throw new \InvalidArgumentException('Esse email já está cadastrado');
            }

            if (!filter_var($this->UserDTO->email, FILTER_VALIDATE_EMAIL)) {
                throw new \InvalidArgumentException('O endereço de e-mail não é válido.');
            }

            if ($this->UserDTO->password !== $this->UserDTO->passwordConfirm) {
                throw new \InvalidArgumentException('As senhas não batem.');
            }

            return true;
        } catch (\InvalidArgumentException $e) {
            echo 'OCORRE O SEGUINTE ERRO DE VALIDAÇÃO: ' . $e->getMessage();
        }
    }
}
