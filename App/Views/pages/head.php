<head>
    <nav class="flex justify-between items-center p-1 bg-[#F7F7F7] border-solid border-b-2 border-blue-600 ">

        <a class="flex items-center gap-2 justify-center font-bold text-4xl text-blue-600 ml-6" href="home">
            <img src="<?php echo INCLUDE_PATH_STATIC ?>img/logo/logo_transparent_formato.svg" alt="">
            <img class="hidden sm:flex" src="<?php echo INCLUDE_PATH_STATIC ?>img/logo/logo_transparent.svg" alt="">
        </a>

        <div class="hidden border-solid w-[350px] border-2 border-opacity-40 border-gray-600 md:flex ">
            <input id="procuraProduto" class=" ml-2 outline-none w-[340px]" type="text" placeholder="Digite o produto que procura">
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

            <a class="relative" href="carrinho" onmouseout="colorOutIcon(this)" onmouseover="colorOverIcon(this)"><span class="absolute text-sm text-center top-[-3px] right-[-3px] bg-orange-400 font-semibold text-white rounded-[50%] px-[6px] "> <?php echo $quantidadeTotal; ?></span> <box-icon class="icon" name='cart' color='#717171' size="md"> </box-icon> </a>

            <a href="perfil" onmouseout="colorOutIcon(this)" onmouseover="colorOverIcon(this)">
                <div class="flex justify-center items-center ">
                    <box-icon class="icon" name='user-circle' color='#717171' size="md"></box-icon>
                    <p class=" text-[#717171] "> <?php echo $_SESSION['nome']; ?></p>

                </div>
            </a>

            <form action="sair" method="post">
                <button id="sair" type="submit" onmouseout="colorOutIcon(this)" onmouseover="colorOverIcon(this)"> <box-icon class="icon" name='log-out' color='#717171' size="md"></box-icon></button>
            </form>
        </div>

        <div onclick="dropdown()" class="flex justify-center mr-[10px] cursor-pointer md:hidden">

            <box-icon id="menuIcon" name='menu' color='#717171' size="lg"></box-icon>
        </div>

    </nav>

    <div id="bemvindo-mensagem" class="hidden bemvindo-mensagem">Seja bem-vindo!</div>

    <div id="resultsContainer"></div>

    <nav class="hidden justify-center w-[100%] bg-blue-600 lg:flex">
        <ul class="flex text-white ">
            <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="smartphones"> Smartphones</a>
            <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="tvs"> TVs </a>
            <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="monitores"> Monitores </a>
            <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="computadores"> Computadores </a>
            <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="fones"> Fones </a>
            <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="teclados"> Teclados </a>
            <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="mouses"> Mouses </a>
        </ul>
    </nav>

    <nav id="menuResponsivo" class="hidden justify-center w-[100%] bg-blue-600 md:hidden">
        <ul class="flex flex-col w-[100%] text-center text-white text-sm ">
            <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="perfil"> Perfil</a>
            <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="carrinho"> Carrinho</a>
            <?php
            if ($_SESSION['login'] === 'admin@gmail.com') : ?>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="produto"> Produto</a>
            <?php endif; ?>
            <form action="sair" method="post">
                <button class="p-3 px-7 cursor-pointer hover:bg-blue-800 w-[100%] " id="sair" type="submit" onmouseout="colorOutIcon(this)" onmouseover="colorOverIcon(this)"> Sair</box-icon></button>
            </form>
            <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="smartphones"> Smartphones</a>
            <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="tvs"> TVs </a>
            <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="monitores"> Monitores </a>
            <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="computadores"> Computadores </a>
            <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="fones"> Fones </a>
            <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="teclados"> Teclados </a>
            <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="mouses"> Mouses </a>
        </ul>
    </nav>

</head>