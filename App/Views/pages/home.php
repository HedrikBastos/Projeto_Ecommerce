<!DOCTYPE html>
<html lang="pt-br">
<!--npx tailwindcss -i ./app/assets/styles/input.css -o ./app/assets/styles/output.css --watch
<?php
// echo INCLUDE_PATH_STATIC
?>style.css 
-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_STATIC ?>styles/output.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.js" integrity="sha512-Dm5UxqUSgNd93XG7eseoOrScyM1BVs65GrwmavP0D0DujOA8mjiBfyj71wmI2VQZKnnZQsSWWsxDKNiQIqk8sQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class=" bg-[#F7F7F7] ">

    <head class="">

        <nav class=" flex justify-between items-center p-1 bg-[#F7F7F7] border-solid border-b-2 border-blue-600 ">

            <a class=" flex items-center gap-2 justify-center font-bold text-4xl text-blue-600 ml-6" href="home">
                <img src="<?php echo INCLUDE_PATH_STATIC ?>img/logo/logo_transparent_formato.svg" alt="">
                <img class="hidden sm:flex" src="<?php echo INCLUDE_PATH_STATIC ?>img/logo/logo_transparent.svg" alt="">
            </a>

            <div class="hidden border-solid w-[350px] border-2 border-opacity-40 border-gray-600 md:flex ">
                <input class=" ml-2 outline-none w-[340px]" type="search">
                <box-icon name='search-alt' color='#717171' size="md"></box-icon>
            </div>

            <div class="hidden justify-center items-center gap-3 mr-6 md:flex">
                <a href="carrinho"> <box-icon name='cart-add' type='solid' color='#717171' size="md"></box-icon> </a>

                <a href="perfil">
                    <div class="flex flex-col justify-center items-center ">
                        <box-icon name='user-circle' color='#717171' size="md"></box-icon>
                        <p class=" text-[#717171] "> <?php echo $_SESSION['nome']; ?></p>

                    </div>
                </a>

                <form action="sair" method="post">
                    <button id="sair" type="submit"> <box-icon name='log-out' color='#717171' size="md"></box-icon></button>
                </form>
            </div>

        </nav>
        <div id="bemvindo-mensagem" class="hidden">Seja bem-vindo!</div>

        <nav class=" hidden justify-center w-[100%] bg-blue-600 md:flex">
            <ul class="flex  text-white ">
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Smartphones</a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> TVs </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Monitors </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Computadores </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Fones </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Teclados </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-800" href=""> Mouses </a>
            </ul>
        </nav>

    </head>

    <div>

        <?php foreach ($produtos as $key => $valor) : ?>

            <a href="show/<?= $key ?>">
                <img src="<?= INCLUDE_PATH_STATIC ?><?= $valor['path'] ?>" alt="">
                <a href="?add=<?= $key ?>"> <?= $valor['nome'] ?> </a>
            </a>

        <?php endforeach; ?>

        <script src="App/assets/scripts/ValidaForms.js" type="text/javascript"></script>

</body>

</html>