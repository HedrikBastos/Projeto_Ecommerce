<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_STATIC ?>styles/output.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.js" integrity="sha512-Dm5UxqUSgNd93XG7eseoOrScyM1BVs65GrwmavP0D0DujOA8mjiBfyj71wmI2VQZKnnZQsSWWsxDKNiQIqk8sQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>

    <head class="">

        <nav class=" flex justify-between items-center p-1 bg-[#F7F7F7] border-solid border-b-2 border-blue-600 ">

            <a class=" flex items-center gap-2 justify-center font-bold text-4xl text-blue-600 ml-6" href="<?php echo INCLUDE_PATH ?>">
                <img src="<?php echo INCLUDE_PATH_STATIC ?>img/logo/logo_transparent_formato.svg" alt="">
                <img class="hidden sm:flex" src="<?php echo INCLUDE_PATH_STATIC ?>img/logo/logo_transparent.svg" alt="">
            </a>

            <div class="hidden border-solid w-[350px] border-2 border-opacity-40 border-gray-600 md:flex ">
                <input class=" ml-2 outline-none w-[340px]" type="search">
                <box-icon name='search-alt' color='#717171' size="md"></box-icon>
            </div>

            <div class="hidden justify-center gap-3 mr-6 md:flex">
                <a href="<?php echo INCLUDE_PATH ?>carrinho"> <box-icon name='cart-add' type='solid' color='#717171' size="md"></box-icon> </a>

                <a href="perfil">
                    <div class="flex justify-center items-center ">
                        <box-icon name='user-circle' color='#717171' size="md"></box-icon>
                        <p class=" text-[#717171] ">Olá <?php echo 'Name!'; ?></p>
                    </div>
                </a>


            </div>

        </nav>

        <nav class=" hidden justify-center w-[100%] bg-blue-600 lg:flex">
            <ul class="flex  text-white ">
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Smartphones</a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> TVs </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Monitores </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Computadores </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Fones </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Teclados </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Mouses </a>
            </ul>
        </nav>

    </head>

    <a class=" text-xs underline decoration-solid decoration-gray-400 hover:decoration-black p-8 " href="<?php echo INCLUDE_PATH ?>home">Voltar à página inicial</a>

    <div class="flex justify-center">

        <?php foreach ($produtos as $key => $value) : ?>

            <?php if ($value['id'] == $parameter) : ?>

                <img class="w-[500px]" src="<?= INCLUDE_PATH_STATIC ?><?= $value['path'] ?>" alt="">

                <div class="flex flex-col items-start pt-[7%] gap-28">

                    <div class="flex flex-col  gap-10">
                        <p class="text-2xl"><?= $value['nome'] ?></p>
                        <p class="font-bold text-3xl"> R$<?php echo number_format($value['preco'], 2, ',', '.') ?> </p>
                    </div>

                    <div class="flex flex-col gap-2 ">

                        <form class="form-adicionar" method="post" >
                            <input type="hidden" name="acao" class="btnAdicionar" value="adicionar">
                            <input type="hidden" name="produtoID" class="produtoID" value="<?php echo $value['id'] ?>">
                            <input onclick="up()" value="Adicionar ao carrinho " type="submit" class=" font-semibold text-center text-sm rounded-2xl bg-blue-400 p-[4px] px-7 cursor-pointer hover:bg-blue-500">
                        </form>

                        <a class=" font-semibold text-center text-sm rounded-2xl bg-yellow-400 p-[4px] px-7 hover:bg-yellow-500" href="">Comprar agora</a>
                    </div>

                </div>


            <?php endif; ?>

        <?php endforeach; ?>
    </div>

    <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/jquery-3.7.1.js"></script>
    <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/Carrinho.js"></script>

</body>

</html>