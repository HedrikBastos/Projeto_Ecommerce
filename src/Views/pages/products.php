<?php
session_start();
require_once('../../Controllers/CartController.php');


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        * {
            margin: 20px;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            text-align: center;
            margin: 20px;
        }

        div a {
            margin: 15px;
            text-decoration: none;
        }
    </style>

</head>

<body>

    <h1>CLIQUE NO PRODUTO PARA TESTAR</h1>
    <div>
        <?php
        foreach ($dados as $key => $value) {
        ?>
        
            <a href="?add=<?php echo $key ?>"> <?php echo $value['name'] ?> </a>

        <?php }; ?>
    </div>

    <a style="background-color: brown; border:5px solid black;   " href="cart.php">Carrinho</a>

</body>

</html>