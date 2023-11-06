<!DOCTYPE html>
<html lang="pt-br">
<!--  npx tailwindcss -i ./app/assets/styles/input.css -o ./app/assets/styles/output.css --watch  -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_STATIC ?>styles/output.css">
    <link rel="shortcut icon" href="<?php echo INCLUDE_PATH_STATIC ?>img/favicon/logo_transparent_formato.svg" type="image/x-icon">
</head>

<body>

    <head>

        <nav class=" flex justify-between items-center p-1 bg-[#F7F7F7] border-solid border-b-2 border-blue-600 ">

            <a class=" flex items-center gap-2 justify-center font-bold text-4xl text-blue-600 ml-6" href="<?php echo INCLUDE_PATH ?>home">
                <img src="<?php echo INCLUDE_PATH_STATIC ?>img/logo/logo_transparent_formato.svg" alt="">
                <img class="hidden sm:flex" src="<?php echo INCLUDE_PATH_STATIC ?>img/logo/logo_transparent.svg" alt="">
            </a>

            <div class="hidden border-solid w-[350px] border-2 border-opacity-40 border-gray-600 md:flex ">
                <input class=" ml-2 outline-none w-[340px]" type="text">
                <box-icon name='search-alt' color='#717171' size="md"></box-icon>
            </div>

            <div class="hidden justify-center gap-3 mr-6 md:flex">

                <?php
                if ($_SESSION['login'] == 'admin@gmail.com') : ?>
                    <a href="<?php echo INCLUDE_PATH ?>produto"><box-icon name='package' color='#717171' size="md"></box-icon></a>
                <?php endif; ?>

                <a href="<?php echo INCLUDE_PATH ?>carrinho"> <box-icon name='cart-add' type='solid' color='#717171' size="md"></box-icon> </a>

                <a href="<?php echo INCLUDE_PATH ?>perfil">
                    <div class="flex justify-center items-center ">
                        <box-icon name='user-circle' color='#717171' size="md"></box-icon>
                        <p class=" text-[#717171] "> <?php echo $_SESSION['nome']; ?></p>

                    </div>
                </a>

                <form action="<?php echo INCLUDE_PATH ?>sair" method="post">
                    <button id="sair" type="submit"> <box-icon name='log-out' color='#717171' size="md"></box-icon></button>
                </form>

            </div>

            <div onclick="dropdown()" class="flex justify-center mr-[10px] cursor-pointer md:hidden">

                <box-icon id="menuIcon" name='menu' color='#717171' size="lg"></box-icon>
            </div>

        </nav>

        <nav class=" hidden justify-center w-[100%] bg-blue-600 lg:flex">
            <ul class="flex  text-white ">
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="<?php echo INCLUDE_PATH ?>smartphones"> Smartphones</a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="<?php echo INCLUDE_PATH ?>tvs"> TVs </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Monitores </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Computadores </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="<?php echo INCLUDE_PATH ?>fones"> Fones </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Teclados </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Mouses </a>
            </ul>
        </nav>

        <nav id="menuResponsivo" class="hidden justify-center w-[100%] bg-blue-600 md:hidden">
            <ul class=" flex flex-col w-[100%] text-center text-white text-sm ">
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="<?php echo INCLUDE_PATH ?>perfil"> Perfil</a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="<?php echo INCLUDE_PATH ?>carrinho"> Carrinho</a>
                <?php
                if ($_SESSION['login'] == 'admin@gmail.com') : ?>
                    <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="<?php echo INCLUDE_PATH ?>produto"> Carrinho</a>
                <?php endif; ?>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="<?php echo INCLUDE_PATH ?>smartphones"> Smartphones</a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="tvs"> TVs </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Monitores </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Computadores </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="<?php echo INCLUDE_PATH ?>fones"> Fones </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Teclados </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Mouses </a>
            </ul>
        </nav>

    </head>

    <a class="text-[9px] underline decoration-solid decoration-gray-400 hover:decoration-black p-8 sm:text-sm " href="<?php echo INCLUDE_PATH ?>home">Voltar à página inicial</a>

    <article class="flex justify-center items-center">

        <div class="flex justify-center items-center w-[120px] sm:w-[250px] md:w-[500px]">

            <?php foreach ($produtos as $key => $value) : ?>

                <?php if ($value['id_produto'] == $parameter) : ?>

                    <img class="" src="<?= INCLUDE_PATH_STATIC ?><?= $value['imagem'] ?>" alt="">

                    <div class="flex flex-col items-start pt-[7%] gap-5 sm:gap-28">

                        <div class="flex flex-col gap-10">
                            <p class="text-md sm:text-2xl "><?= $value['nome'] ?></p>
                            <p class="font-bold text-md sm:text-3xl "> R$<?php echo number_format($value['preco'], 2, ',', '.') ?> </p>
                        </div>

                        <div class="flex flex-col gap-2 ">

                            <form class="form-adicionar" method="post">
                                <input type="hidden" name="acao" class="btnAdicionar" value="adicionar">
                                <input type="hidden" name="produtoID" class="produtoID" value="<?php echo $parameter ?>">
                                <input onclick="up()" value="Adicionar ao carrinho " type="submit" class=" text-[9px] font-semibold rounded-2xl hover:bg-blue-500  bg-blue-400 p-[4px] px-2 cursor-pointer text-center sm:px-7 sm:text-sm">
                            </form>

                            <a class=" font-semibold text-center rounded-2xl bg-yellow-400 p-[4px] hover:bg-yellow-500 text-[9px] px-2 sm:px-7 sm:text-sm" href="">Comprar agora</a>
                        </div>

                    </div>

                <?php endif; ?>

            <?php endforeach; ?>

        </div>
    </article>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.js" integrity="sha512-Dm5UxqUSgNd93XG7eseoOrScyM1BVs65GrwmavP0D0DujOA8mjiBfyj71wmI2VQZKnnZQsSWWsxDKNiQIqk8sQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/jquery-3.7.1.js"></script>
    <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/menu.js"></script>
    <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/Carrinho.js"></script>

</body>

</html>