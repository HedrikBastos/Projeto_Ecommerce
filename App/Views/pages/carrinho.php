<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_STATIC ?>styles/output.css">
</head>

<body>
    <pre>

    <?php

/*
    var_dump($_SESSION['carrinho']);

    $produtos = $_SESSION['carrinho'];

    foreach ($produtos as $key => $value) {

        echo $value['nome'];
        echo 'R$' . $value['preco'] ;
        echo $value['id_produto'];
    }

    */
    ?>

    </pre>

    <div class="main" class="flex flex-col items-center justify-center  ">


        <div class="carrinho flex flex-col items-center justify-center gap-3 sm:text-3xl" style="margin-bottom: 20px;" >

        </div>

        <div class="totalDiv flex flex-col items-center justify-center text-3xl " >

        </div>

        <form action="">
            <button>Finalizar Pedido</button>
        </form>

    </div>

    <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/jquery-3.7.1.js"></script>
    <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/Carrinho.js"></script>
    <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/RecebeCarrinho.js"></script>

</body>

</html>