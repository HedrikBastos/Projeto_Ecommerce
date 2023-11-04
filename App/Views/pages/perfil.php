<?php

use App\Controllers\BuscaPedidoController;

$opcaoMenu = 'pedidos';
if (isset($_GET['value'])) {
    if ($_GET['value'] != 'pedidos' && $_GET['value'] != 'alterausuario' && $_GET['value'] != 'alteraendereco') {
        include('erro404.php');
        die();
    }
    $opcaoMenu = $_GET['value'];
}
if ($opcaoMenu == 'pedidos') {
    $buscaPedidos = new BuscaPedidoController();
    $pedidos = $buscaPedidos->execute();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Cliente</title>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_STATIC ?>styles/output.css">
    <link rel="stylesheet" href=" <?php echo INCLUDE_PATH_STATIC ?>styles/estilo.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.js" integrity="sha512-Dm5UxqUSgNd93XG7eseoOrScyM1BVs65GrwmavP0D0DujOA8mjiBfyj71wmI2VQZKnnZQsSWWsxDKNiQIqk8sQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="min-h-screen flex flex-col">
    <header>
        <nav class=" flex justify-between items-center p-1 bg-[#F7F7F7] border-solid border-b-2 border-blue-600 ">

            <a class=" flex items-center gap-2 justify-center font-bold text-4xl text-blue-600 ml-6" href="home">
                <img src="<?php echo INCLUDE_PATH_STATIC ?>img/logo/logo_transparent_formato.svg" alt="">
                <img class="hidden sm:flex" src="<?php echo INCLUDE_PATH_STATIC ?>img/logo/logo_transparent.svg" alt="">
            </a>

            <div class="hidden justify-center items-center gap-3 mr-6 md:flex">
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

        </nav>

        <nav class=" hidden justify-center w-[100%] bg-blue-800 md:flex">
            <ul class="flex  text-white ">
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-900" href="home"> Home</a>

                <a class="p-3 px-7 cursor-pointer hover:bg-blue-900" href="perfil?value=alterausuario"> Alterar Cadastro </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-900" href="perfil?value=alteraendereco"> Alterar Endereço </a>
                <a class="p-3 px-7 cursor-pointer hover:bg-blue-900" href="perfil?value=pedidos"> Pedidos </a>

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
    <script src="App/assets/scripts/notificador.js" type="text/javascript"></script>
</body>

</html>