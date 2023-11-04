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

<body class=" bg-[#F7F7F7] ">

    <head>

        <nav class=" flex justify-between items-center p-1 bg-[#F7F7F7] border-solid border-b-2 border-blue-600 ">

            <a class=" flex items-center gap-2 justify-center font-bold text-4xl text-blue-600 ml-6" href="home">
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
                    <a href="produto"><box-icon name='package' color='#717171' size="md"></box-icon></a>
                <?php endif; ?>
                <a href="carrinho"> <box-icon name='cart-add' type='solid' color='#717171' size="md"></box-icon> </a>

                <a href="perfil">
                    <div class="flex justify-center items-center ">
                        <box-icon name='user-circle' color='#717171' size="md"></box-icon>
                        <p class=" text-[#717171] "> <?php echo $_SESSION['nome']; ?></p>

                    </div>
                </a>

                <form action="sair" method="post">
                    <button id="sair" type="submit"> <box-icon name='log-out' color='#717171' size="md"></box-icon></button>
                </form>

            </div>

            <div onclick="dropdown()" class="flex justify-center mr-[10px] cursor-pointer md:hidden">

                <box-icon id="menuIcon" name='menu' color='#717171' size="lg"></box-icon>
            </div>

        </nav>

        <nav class=" hidden justify-center w-[100%] bg-blue-600 lg:flex">
            <ul class="flex  text-white ">
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="smartphones"> Smartphones</a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="tvs"> TVs </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Monitores </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Computadores </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="fones"> Fones </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Teclados </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Mouses </a>
            </ul>
        </nav>

        <nav id="menuResponsivo" class="hidden justify-center w-[100%] bg-blue-600 md:hidden">
            <ul class=" flex flex-col w-[100%] text-center text-white text-sm ">
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="perfil"> Perfil</a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="carrinho"> Carrinho</a>
                <?php
                if ($_SESSION['login'] == 'admin@gmail.com') : ?>
                    <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="produto"> Carrinho</a>
                <?php endif; ?>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="smartphones"> Smartphones</a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="tvs"> TVs </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Monitores </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Computadores </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="fones"> Fones </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Teclados </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Mouses </a>
            </ul>
        </nav>

    </head>

    <div id="bemvindo-mensagem" class="hidden">Seja bem-vindo!</div>

    <article class=" flex justify-center items-center ">

        <div class=" flex flex-wrap justify-center w-[1300px] p-[10px] gap-1 ">
            <?php foreach ($produtos as $key => $value) : ?>

                <?php if ($value['categoria'] == 'TVs') : ?>

                    <a class=" produtos flex flex-col items-center justify-center text-center relative border-hidden border-[1px] border-black  hover:border-solid w-[90px] sm:w-[200px] " href="show/<?= $value['id_produto'] ?>">
                        <img class="w-[200px]" src="<?= INCLUDE_PATH_STATIC ?><?= $value['imagem'] ?>" alt="">
                        <p class="text-xs w-[150px]"> <?= $value['nome'] ?></p>
                        <p class="text-xs font-semibold text-[#E01D25] sm:text-sm"> R$<?php echo number_format($value['preco'], 2, ',', '.') ?></p>
                    </a>

                <?php endif; ?>

            <?php endforeach; ?>

        </div>

    </article>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.js" integrity="sha512-Dm5UxqUSgNd93XG7eseoOrScyM1BVs65GrwmavP0D0DujOA8mjiBfyj71wmI2VQZKnnZQsSWWsxDKNiQIqk8sQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/ValidaForms.js" type="text/javascript"></script>
    <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/menu.js"></script>

</body>

</html>