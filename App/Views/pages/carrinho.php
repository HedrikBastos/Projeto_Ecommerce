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
    <div>
        <?php

        if (isset($_SESSION['carrinho'])) {
            foreach ($_SESSION['carrinho'] as $key => $value) {
        ?>
                <article>
                    <p><?php echo 'Nome: ' . $value['nome'] . ' | Quantidade: ' . $value['quantidade'] . ' | Preço: ' . $value['quantidade']*$value['preco'];
                        echo '<br>'; ?></p>

                    <form action="" method="post">
                        <input type="hidden" name="soma" value="<?php echo $key ?>">
                        <button type="submit">+</button>
                    </form>

                    <form action="" method="post">
                        <input type="hidden" name="subtrai" value="<?php echo $key ?>">
                        <button type="submit">-</button>
                    </form>

                </article>

        <?php
            }
        } else {
            echo 'Ainda não existe nenhum produto no seu carrinho!';
        }

        ?>

        <?php

        if (isset($_SESSION['carrinho'])) {
            $somaTotal = 0; // Inicialize a variável de soma fora do loop

            foreach ($_SESSION['carrinho'] as $key => $value) {
                $subtotal = $value['quantidade'] * $value['preco'];
                $somaTotal += $subtotal; // Adicione o subtotal à soma total

                // Resto do seu código para exibir os produtos
                // ...
            }

            // Exiba a soma total para o usuário
            echo 'Soma Total: ' . $somaTotal;
        } else {
            echo 'Ainda não existe nenhum produto no seu carrinho!';
        }
        ?>


    </div>

    <a href="home">Voltar para Produtos</a>

</body>

</html>