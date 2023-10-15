<?php

 function conect()
{

             $pdo = new \PDO('mysql:host=localhost;dbname=ecommerce', 'root','', array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }
  

        $email = $this->user->email();
        $senha = $this->user->senha();
        $query = connect()->prepare("SELECT u.nome, u.email FROM usuarios u INNER JOIN `senhas_usuarios` s ON u.id = s.id_usuario WHERE u.email = :email");
        $query->bindParam(':email', $email, \PDO::PARAM_STR);
        $query->execute();
        $resultado = $query->fetch(\PDO::FETCH_ASSOC);

  var_dump($test);
