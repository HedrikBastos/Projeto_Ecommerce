<?php
if(isset($_SESSION['mensagem'])){
    \App\Views\Notificador::notificar($_SESSION['mensagem'], $_SESSION['condicao']);
    unset($_SESSION['mensagem']);
    unset($_SESSION['condicao']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Cliente</title>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_STATIC ?>styles/output.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_STATIC ?>styles/estilo.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.js"
        integrity="sha512-Dm5UxqUSgNd93XG7eseoOrScyM1BVs65GrwmavP0D0DujOA8mjiBfyj71wmI2VQZKnnZQsSWWsxDKNiQIqk8sQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="min-h-screen flex flex-col">
    <header>
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

        <nav class=" hidden justify-center w-[100%] bg-blue-600 md:flex">
            <ul class="flex  text-white ">
                <a class="p-3 px-7 cursor-pointer hover-bg-blue-900" href="home"> Home</a>

                <a class="p-3 px-7 cursor-pointer hover-bg-blue-900" href="perfil?value=alterausuario"> Alterar Cadastro </a>
                <a class="p-3 px-7 cursor-pointer hover-bg-blue-900" href="perfil?value=alteraendereco"> Alterar Endereço </a>
                <a class="p-3 px-7 cursor-pointer hover-bg-blue-900" href="perfil?value=pedidos"> Pedidos </a>

            </ul>
        </nav>

        <nav id="menuResponsivo" class="hidden justify-center w-[100%] bg-blue-600 md:hidden">
            <ul class=" flex flex-col w-[100%] text-center text-white text-sm ">
                <a class="p-3 px-7 cursor-pointer hover-bg-blue-800" href="perfil"> Perfil</a>
                <a class="p-3 px-7 cursor-pointer hover-bg-blue-800" href="carrinho"> Carrinho</a>
                <?php
                if ($_SESSION['login'] === 'admin@gmail.com') : ?>
                    <a class="p-3 px-7 cursor-pointer hover-bg-blue-800" href="produto"> Produto</a>
                <?php endif; ?>
                <a class="p-3 px-7 cursor-pointer hover-bg-blue-900" href="home"> Home</a>

                <a class="p-3 px-7 cursor-pointer hover-bg-blue-900" href="perfil?value=alterausuario"> Alterar Cadastro </a>
                <a class="p-3 px-7 cursor-pointer hover-bg-blue-900" href="perfil?value=alteraendereco"> Alterar Endereço </a>
                <a class="p-3 px-7 cursor-pointer hover-bg-blue-900" href="perfil?value=pedidos"> Pedidos </a>
            </ul>
        </nav>

    </header>

    <main class="flex-1 p-4">

        <?php include(INCLUDE_PATH_PAGES . $opcaoMenu . '.php') ?>
    </main>

    <div class="footer p-4">
        <a id="" href="home">Voltar para o Home</a>
        <a id="logout">Logout</a>
    </div>
    <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/notificador.js" type="text/javascript"></script>
    <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/menu.js"></script>
</body>

</html>

