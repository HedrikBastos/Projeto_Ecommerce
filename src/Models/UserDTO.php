<?php


//Construi essa classe DTO aqui, se vc acha que tem alguma coisa que pode melhorar me fala depois ou altera e comenta

class UserDTO{

    public readonly string $name;
    public readonly string $surname; //Sobrenome 
    public readonly string $email;
    public readonly string $password; 
    public readonly string $passwordConfirm; 
    public readonly string $gender; //gênero
    // public readonly string $endero; // Vai ter que desmembrar esse enderço depois deixei aqui, mas pode ignorar por enquanto para fazer os testes do sistema de login, depois coloca.

    public function __construct(string $name, string $surname,string $email, string $password, string $passwordConfirm, string $gender)
    {

        //Dá para fazer algumas validações de dados aqui antes de setar as propiedades

        /*ex:
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('O endereço de e-mail não é válido.');
        }*/
        // Ou criar uma classe que vai fazer somente fazer isso(validar), como você tinha feito. Eu daria o nome da classe de validar de "Validations"


        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $this->passwordConfirm = $passwordConfirm;
        $this->gender = $gender;
    }

}