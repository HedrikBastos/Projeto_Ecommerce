<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        div {
            display: flex;
            justify-content: center;
            flex-direction: column;

        }

        article {
            display: flex;
        }
    </style>
</head>

<body>
    <pre>
    <?php var_dump($_SESSION['carrinho'])
    

     ?>
    </pre>



    <div class="main" style=" margin-top:200px;  ">

        <div class="carrinho" style="display: flex; flex-direction:column; gap:20px; ">

        </div>

        <div class="totalDiv">

        </div>

    </div>



    <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/jquery-3.7.1.js"></script>
    <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/Carrinho.js"></script>
    <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/RecebeCarrinho.js"></script>

</body>

</html>