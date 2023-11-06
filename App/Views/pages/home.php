<!DOCTYPE html>
<html lang="pt-br">
<!--  npx tailwindcss -i ./app/assets/styles/input.css -o ./app/assets/styles/output.css --watch  -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_STATIC ?>styles/output.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_STATIC ?>styles/estilo.css">
    <link rel="shortcut icon" href="<?php echo INCLUDE_PATH_STATIC ?>img/favicon/logo_transparent_formato.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body class="bg-[#F7F7F7] overflow-x-hidden">

    <head>

        <nav class="flex justify-between items-center p-1 bg-[#F7F7F7] border-solid border-b-2 border-blue-600 ">

            <a class="flex items-center gap-2 justify-center font-bold text-4xl text-blue-600 ml-6" href="home">
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

        <nav class="hidden justify-center w-[100%] bg-blue-600 lg:flex">
            <ul class="flex text-white ">
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="smartphones"> Smartphones</a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="tvs"> TVs </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Monitores </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Notebooks </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="fones"> Fones </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Teclados </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Mouses </a>
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
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Monitores </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Computadores </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="fones"> Fones </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Teclados </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Mouses </a>
            </ul>
        </nav>

    </head>

    <!-- Swiper -->
    <div class="hidden lg:flex ">
        <div class="swiper mySwiper" style=" height: 280px; ">
            <div class="swiper-wrapper" style="  align-items: center;">
                <div class="swiper-slide " class="slideP" style="height: 260px;"> <img src="<?php echo INCLUDE_PATH_STATIC ?>img/carousel/slideOne.png" alt=""> </div>
                <div class="swiper-slide " class="slideP" style="height: 260px;"> <img src="<?php echo INCLUDE_PATH_STATIC ?>img/carousel/slideTwo.png" alt=""> </div>
                <div class="swiper-slide " class="slideP" style="height: 260px;"> <img src="<?php echo INCLUDE_PATH_STATIC ?>img/carousel/slideThree.png" alt=""> </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
            <div class="autoplay-progress">
                <svg style="display:none;" viewBox="0 0 48 48">
                    <circle style="display:none;" cx="24" cy="24" r="20"></circle>
                </svg>
                <span style="display:none;"></span>
            </div>
        </div>
    </div>



    <div id="bemvindo-mensagem" class="hidden">Seja bem-vindo!</div>

    <article class="flex justify-center items-center ">

        <div class="flex flex-wrap justify-center w-[1300px] p-[10px] gap-1 ">
            <?php foreach ($produtos as $key => $valor) : ?>

                <a class="produtos flex flex-col items-center justify-center text-center relative border-hidden border-[1px] border-black  hover:border-solid w-[90px] sm:w-[200px] " href="show/<?= $valor['id_produto'] ?>">
                    <img class="w-[200px]" src="<?= INCLUDE_PATH_STATIC ?><?= $valor['imagem'] ?>" alt="">
                    <p class="text-[9px] w-[150px] sm:text-xs "> <?= $valor['nome'] ?></p>
                    <p class="text-xs font-semibold text-[#E01D25] sm:text-sm"> R$<?php echo number_format($valor['preco'], 2, ',', '.') ?></p>
                </a>

            <?php endforeach; ?>

        </div>

    </article>

    <div class="flex flex-col">
        <footer class="flex flex-col items-center rounded-lg bg-blue-800 m-8 py-24 sm:items-stretch">

            <article class="flex flex-col justify-around sm:items-start sm:flex-row">

                <div class="flex flex-col text-sm text-white p-2 gap-1 ">
                    <a href="#" class="mb-3 text-lg ">Empresa</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Sobre nós</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Confiança, Segurança e Proteção</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Contate-nos</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Trabalhe Conosco</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Comunidade</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Acessibilidade</a>
                </div>

                <div class="flex flex-col text-sm text-white p-2 gap-1 ">
                    <a href="#" class="mb-3 text-lg ">Pagamento</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Compre com Pontos</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Meios de Pagamento</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Cartão de Crédito</a>
                </div>

                <div class="flex flex-col text-sm text-white p-2 gap-1 ">
                    <a href="#" class="mb-3 text-lg "> Deixe-nos ajudar você</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Sua conta</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Meus Pedidos</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Frete e prazo de entrega</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Devoluções e reembolsos</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Gerencie seu conteúdo e dispositivos</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Ajuda</a>
                </div>

                <div class="flex flex-col text-sm text-white p-2 gap-1 ">
                    <a href="#" class="mb-3 text-lg ">Dúvidas</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Portal de Privacidade</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Termos e Condições de Uso</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Prepare-se para a BlackFriday</a>
                </div>

            </article>

            <hr class=" mt-10 ml-10 mr-10 text-lg bg-white ">

            <div class="flex flex-col justify-around ml-10 sm:flex-row text-sm text-white p-2">
                <p class="text-xs"> © 2023 Diogo, Hedrik e inc. Todos os direitos reservados para TechStore.</p>
                <div class="flex items-center">
                    <a href="#"> <box-icon size="md" name='instagram-alt' type='logo' color='#ffffff'></box-icon> </a>
                    <a href="#"> <box-icon size="md" name='linkedin-square' type='logo' color='#ffffff'></box-icon> </a>
                    <a href="#"> <box-icon size="md" name='facebook-circle' type='logo' color='#ffffff'></box-icon> </a>
                    <a href="#"> <box-icon size="md" name='youtube' type='logo' color='#ffffff'></box-icon> </a>
                </div>
            </div>

        </footer>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.js" integrity="sha512-Dm5UxqUSgNd93XG7eseoOrScyM1BVs65GrwmavP0D0DujOA8mjiBfyj71wmI2VQZKnnZQsSWWsxDKNiQIqk8sQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/carousel.js"></script>

</body>

</html>