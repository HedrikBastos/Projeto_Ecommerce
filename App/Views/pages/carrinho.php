<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_STATIC ?>styles/output.css">
    <link rel="shortcut icon" href="<?php echo INCLUDE_PATH_STATIC ?>img/favicon/logo_transparent_formato.svg" type="image/x-icon">
    <style>
        .finalizar-pedido {
            float: right;
            margin-left: 100px;
        }
    </style>
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
                <a href="carrinho"> <box-icon name='cart-add' type='solid' color='#717171' size="md"></box-icon> </a>

                <a href="perfil">
                    <div class="flex justify-center items-center ">
                        <box-icon name='user-circle' color='#717171' size="md"></box-icon>
                        <p class=" text-[#717171] "> <?php echo $_SESSION['nome']; ?></p>
                    </div>
                </a>

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
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Perfil</a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href="<?php echo INCLUDE_PATH ?>carrinho"> Carrinho</a>
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

    <article class="main flex flex-col items-center justify-center mt-[35px] sm:mt-[70px] ">

        <div class="flex items-center justify-center">
            <div class="carrinho flex flex-col gap-10 " style="margin-bottom: 20px;">

            </div>
        </div>


        <div class="totalDiv flex flex-col items-center justify-center text-[8px] sm:text-2xl ">

        </div>

        <form action="pedido" method="post" class=" flex justify-center items-center p-2">
            <button class="float-right ml-[40px] text-[8px] font-semibold rounded-2xl hover:bg-green-500  bg-green-400 p-[4px] px-2 text-center sm:px-7 sm:ml-[150px]  sm:text-sm">Finalizar Pedido</button>
        </form>

    </article>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.js" integrity="sha512-Dm5UxqUSgNd93XG7eseoOrScyM1BVs65GrwmavP0D0DujOA8mjiBfyj71wmI2VQZKnnZQsSWWsxDKNiQIqk8sQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/jquery-3.7.1.js"></script>
    <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/Carrinho.js"></script>
    <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/menu.js"></script>
    <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/RecebeCarrinho.js"></script>

</body>

</html>