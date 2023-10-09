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
                    <p><?php echo 'Nome: ' . $value['nome'] . ' | Quantidade: ' . $value['quantidade'] . ' | Preço: ' . $value['preco'];
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



    </div>


    <a href="products.php">Voltar para Produtos</a>

</body>

</html>