<?php

use App\Config\Connection;

require_once('../Config/Connection.php');
if (isset($_POST['submit']) && !empty($_POST['nome']) && !empty($_POST['preco'])) {

    $files = $_FILES['file'];
    $names = $files['name'];
    $tmp_name = $files['tmp_name'];

    foreach ($names as $key => $name) {
        $extension = pathinfo($name, PATHINFO_EXTENSION);
        $newName = uniqid() . '.' . $extension;
        // var_dump($newName);
        $moveArquivo= move_uploaded_file($tmp_name[$key], '../assets/img/produtos/' . $newName);
        $path = 'img/produtos/'.$newName;
    }

    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $categoria = $_POST['categoria'];
    

    $conn = new Connection();
    $conn = Connection::connect();

    $sql = $conn->prepare("INSERT INTO produtos VALUES(NULL,?,?,?,?)");
    $sql->execute(array($nome,$preco,$categoria,$path));
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        form input {
            width: 220px;
            padding: 7px;
        }

        form button {
            width: 220px;
            padding: 7px;
        }
        for button:hover{
            background: #000;
        }
    </style>
</head>

<body>

    <form action="produtos.php" method="post" enctype="multipart/form-data">
        <h1>INSIRA PRODUTOS AQUI</h1>
        <input type="text" name="nome" placeholder="Nome do produto">
        <input type="number" name="preco" placeholder="Preço do produto">
        <input type="text" name="categoria" placeholder="Categoria do produto">
        <input type="file" name="file[]">
        <button type="submit" name="submit">Upload</button>
    </form>

</body>

</html>