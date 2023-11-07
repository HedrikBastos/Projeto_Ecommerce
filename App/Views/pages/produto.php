<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_STATIC ?>styles/output.css">
    <link rel="shortcut icon" href="<?php echo INCLUDE_PATH_STATIC ?>img/favicon/logo_transparent_formato.svg" type="image/x-icon">
    <link rel="stylesheet" href=" <?php echo INCLUDE_PATH_STATIC ?>styles/estilo.css">
</head>

<body>

    <head>

        <nav class="flex justify-between items-center p-1 bg-[#F7F7F7] border-solid border-b-2 border-blue-600 ">

            <a class="flex items-center gap-2 justify-center font-bold text-4xl text-blue-600 ml-6" href="<?php echo INCLUDE_PATH ?>home">
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
                    <a href="produto" onmouseout="colorOutIcon(this)" onmouseover="colorOverIcon(this)"><box-icon class="icon" name='package' color='#717171' size="md"></box-icon></a>
                <?php endif; ?>

                <?php
                $quantidadeTotal = 0;
                if (!empty($_SESSION['carrinho'])) {
                    foreach ($_SESSION['carrinho'] as $value) {
                        $quantidade = $value['quantidade'];
                        $quantidadeTotal += $quantidade;
                    }
                }
                ?>

                <a class="relative" href="<?php echo INCLUDE_PATH ?>carrinho" onmouseout="colorOutIcon(this)" onmouseover="colorOverIcon(this)"><span class="absolute text-sm text-center top-[-3px] right-[-3px] bg-orange-400 font-semibold text-white rounded-[50%] px-[6px] "> <?php echo $quantidadeTotal; ?></span> <box-icon class="icon" name='cart' color='#717171' size="md"> </box-icon> </a>

                <a href="<?php echo INCLUDE_PATH ?>perfil" onmouseout="colorOutIcon(this)" onmouseover="colorOverIcon(this)">
                    <div class="flex justify-center items-center ">
                        <box-icon class="icon" name='user-circle' color='#717171' size="md"></box-icon>
                        <p class=" text-[#717171] "> <?php echo $_SESSION['nome']; ?></p>

                    </div>
                </a>

                <form action="<?php echo INCLUDE_PATH ?>sair" method="post">
                    <button id="sair" type="submit" onmouseout="colorOutIcon(this)" onmouseover="colorOverIcon(this)"> <box-icon class="icon" name='log-out' color='#717171' size="md"></box-icon></button>
                </form>
            </div>

            <div onclick="dropdown()" class="flex justify-center mr-[10px] cursor-pointer md:hidden">

                <box-icon id="menuIcon" name='menu' color='#717171' size="lg"></box-icon>
            </div>

        </nav>
        <div id="bemvindo-mensagem" class="hidden bemvindo-mensagem">Seja bem-vindo!</div>

        <nav class="hidden justify-center w-[100%] bg-blue-600 lg:flex">
            <ul class="flex text-white ">
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="<?php echo INCLUDE_PATH ?>smartphones"> Smartphones</a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="<?php echo INCLUDE_PATH ?>tvs"> TVs </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="<?php echo INCLUDE_PATH ?>monitores"> Monitores </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="<?php echo INCLUDE_PATH ?>computadores"> Computadores </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="<?php echo INCLUDE_PATH ?>fones"> Fones </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="<?php echo INCLUDE_PATH ?>teclados"> Teclados </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="<?php echo INCLUDE_PATH ?>mouses"> Mouses </a>
            </ul>
        </nav>

        <nav id="menuResponsivo" class="hidden justify-center w-[100%] bg-blue-600 md:hidden">
            <ul class="flex flex-col w-[100%] text-center text-white text-sm ">
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="<?php echo INCLUDE_PATH ?>perfil"> Perfil</a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="<?php echo INCLUDE_PATH ?>carrinho"> Carrinho</a>
                <?php
                if ($_SESSION['login'] === 'admin@gmail.com') : ?>
                    <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="<?php echo INCLUDE_PATH ?>produto"> Produto</a>
                <?php endif; ?>
                <form action="sair" method="post">
                    <button class="p-3 px-7 cursor-pointer hover:bg-blue-800 w-[100%] " id="sair" type="submit" onmouseout="colorOutIcon(this)" onmouseover="colorOverIcon(this)"> Sair</box-icon></button>
                </form>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="<?php echo INCLUDE_PATH ?>smartphones"> Smartphones</a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="<?php echo INCLUDE_PATH ?>tvs"> TVs </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="<?php echo INCLUDE_PATH ?>monitores"> Monitores </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="<?php echo INCLUDE_PATH ?>computadores"> Computadores </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="<?php echo INCLUDE_PATH ?>fones"> Fones </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="<?php echo INCLUDE_PATH ?>teclados"> Teclados </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="<?php echo INCLUDE_PATH ?>mouses"> Mouses </a>
            </ul>
        </nav>

    </head>
    
    <div class=" flex flex-wrap gap-20 justify-evenly items-center mt-[150px]">

        <form class="flex flex-col justify-center items-center gap-1 " action="cadastraproduto" method="post" enctype="multipart/form-data">

            <h1 class="text-2xl font-bold">INSIRA UM PRODUTO</h1>
            <input class=" border-blue-600 border-b-2 w-[270px] p-1 outline-none" type="text" name="nome" placeholder="Nome do produto">
            <input class=" border-blue-600 border-b-2 w-[270px] p-1  outline-none" type="number" name="preco" placeholder="Preço do produto">
            <select class=" border-blue-600 border-b-2 w-[270px] p-1  outline-none" name="categoria" id="">
                <option value="Smartphones">Smartphones</option>
                <option value="TVs">TVs</option>
                <option value="Monitores">Monitores</option>
                <option value="Computadores">Computadores</option>
                <option value="Fones">Fones</option>
                <option value="Teclados">Teclados</option>
                <option value="Mouses">Mouses</option>
            </select>
            <input class=" border-blue-600 border-b-2 w-[270px] p-1 outline-none" type="text" name="descricao" placeholder="Descricao">
            <input class=" border-blue-600 border-b-2 w-[270px] p-1 outline-none" type="number" name="estoque" placeholder="Estoque">
            <label for="file[]" class="cursor-pointer w-[270px] text-center  hover:bg-blue-400 py-2">Escolher imagem</label>
            <input type="file" id="file[]" name="file[]" class="hidden">
            <button class=" border-blue-600 border-2 w-[270px] p-1  outline-none  hover:bg-blue-500" type="submit" name="cadastrar">Cadastrar</button>
        </form>


        <form class="flex flex-col justify-center items-center gap-1 " action="" method="post">
            <h1 class="text-2xl font-bold">ATUALIZE O ESTOQUE</h1>
            <input class=" border-blue-600 border-b-2 w-[270px] p-1 outline-none" type="text" name="nome" placeholder="Nome do produto" id="searchInput">
            <div class="none" id="autocomplete"></div>
            <input class=" border-blue-600 border-b-2 w-[270px] p-1 outline-none" type="number" name="estoque" placeholder="Diminua ou acrecente o estoque">
            <button class="  border-blue-600 border-2 w-[270px] p-1  outline-none  hover:bg-blue-500" type="submit" name="atualiza">Atualizar</button>
        </form>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.js" integrity="sha512-Dm5UxqUSgNd93XG7eseoOrScyM1BVs65GrwmavP0D0DujOA8mjiBfyj71wmI2VQZKnnZQsSWWsxDKNiQIqk8sQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.13.6/underscore-umd-min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/index.js"></script>
    <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/menu.js"></script>
    <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/notificador.js"></script>

</body>

</html>