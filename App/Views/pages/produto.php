<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.js" integrity="sha512-Dm5UxqUSgNd93XG7eseoOrScyM1BVs65GrwmavP0D0DujOA8mjiBfyj71wmI2VQZKnnZQsSWWsxDKNiQIqk8sQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_STATIC ?>styles/output.css">
</head>

<body>

    <head class="">

        <nav class=" flex justify-between items-center p-1 bg-[#F7F7F7] border-solid border-b-2 border-blue-600 ">

            <a class=" flex items-center gap-2 justify-center font-bold text-4xl text-blue-600 ml-6" href="<?php echo INCLUDE_PATH ?>home">
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

    <div class=" flex justify-center items-center mt-[150px]">
        <form class="flex flex-col justify-center items-center gap-1 " action="" method="post" enctype="multipart/form-data">

            <h1 class="text-2xl font-bold">INSIRA PRODUTOS</h1>
            <input class=" border-blue-600 border-b-2 w-[270px] p-1 outline-none" type="text" name="nome" placeholder="Nome do produto" type="text" id="searchInput">
            <div class=""  id="autocomplete"></div>
            <input class=" border-blue-600 border-b-2 w-[270px] p-1  outline-none" type="number" name="preco" placeholder="Preço do produto">
            <select class=" border-blue-600 border-b-2 w-[270px] p-1  outline-none" name="categoria" id="">
                <option value="Smarthphones">Smarthphones</option>
                <option value="TVs">TVs</option>
                <option value="Monitores">Monitores</option>
                <option value="Computadores">Computadores</option>
                <option value="Fones">Fones</option>
                <option value="Teclados">Teclados</option>
                <option value="Mouses">Mouses</option>
            </select>

            <label for="file[]" class="cursor-pointer w-[270px] text-center  hover:bg-blue-400 py-2">Escolher imagem</label>
            <input type="file" id="file[]" name="file[]" class="hidden">
            <button class="  border-blue-600 border-2 w-[270px] p-1  outline-none  hover:bg-blue-500" type="submit" name="submit">Upload</button>
        </form>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.13.6/underscore-umd-min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/index.js"></script>

</body>

</html>