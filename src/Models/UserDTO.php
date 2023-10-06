
<?php

class UserDTO{

    public function __construct(public readonly string $name,
    public readonly string $surname, //Sobrenome 
    public readonly string $email,
    public readonly string $password, 
    public readonly string $passwordConfirm,
    public readonly string $gender //gênero
    ){
    }

}
