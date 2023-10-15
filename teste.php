<?php

 function conect()
{

             $pdo = new \PDO('mysql:host=localhost;dbname=ecommerce', 'root','', array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }
  

    $email = 'hedrik@email.com';
   
    $query = conect()->prepare("SELECT u.nome, u.email, s.senha FROM usuarios u INNER JOIN `senhas_usuarios` s ON u.id_usuario = s.id_usuario WHERE u.email = :email");
    $query->bindParam(':email', $email, \PDO::PARAM_STR);
    $query->execute();
    $resultado = $query->fetch(\PDO::FETCH_ASSOC);
    
   echo $resultado['senha'];
  $test =  password_verify('123', $resultado['senha']);

  var_dump($test);
