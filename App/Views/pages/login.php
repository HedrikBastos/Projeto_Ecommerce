<?php
if (isset($_SESSION['mensagem'])) {
    \App\Views\Notificador::notificar($_SESSION['mensagem'], $_SESSION['condicao']);
    unset($_SESSION['mensagem']);
    unset($_SESSION['condicao']);
}
?>

<!DOCTYPE html>
<html lang="pr-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_STATIC ?>styles/output.css">
    <link rel="stylesheet" href=" <?php echo INCLUDE_PATH_STATIC ?>styles/estilo.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.js" integrity="sha512-Dm5UxqUSgNd93XG7eseoOrScyM1BVs65GrwmavP0D0DujOA8mjiBfyj71wmI2VQZKnnZQsSWWsxDKNiQIqk8sQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Tech Store</title>
    <link rel="shortcut icon" href="<?php echo INCLUDE_PATH_STATIC ?>img/favicon/logo_transparent_formato.svg" type="image/x-icon">
</head>

<body class="flex flex-col justify-center items-center h-[100vh] ">

    <div class="flex rounded-3xl shadow-[0_3px_20px_-7px_rgba(0,0,0,0.3)] shadow-slate-000">

        <div class=" flex flex-col justify-center items-center py-[60px] px-[60px] gap-5 lg:px-[80px] lg:py-[80px] ">

            <h1 class=" text-3xl font-bold">Fazer Login</h1>

            <div class="flex justify-center items-center gap-4 ">
                <a href="#"><box-icon type='logo' name='github'></box-icon></a>
                <a href="#"><box-icon type='logo' name='linkedin-square'></box-icon></a>
                <a href="#"><box-icon type='logo' name='facebook-circle'></box-icon></a>
                <a href="#"><box-icon type='logo' name='instagram-alt'></box-icon></a>
            </div>

            <form class=" flex flex-col justify-center items-center gap-4" action="login" method="post" id="">
                <input type="email" name="email" class=" rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none" placeholder="Email" required>
                <input type="password" name="senha" class=" rounded-md bg-slate-200 w-[220px] p-1 outline-none" placeholder="Senha" required minlength="4" maxlength="8">
                <a class="font-bold hidden text-xs lg:flex" href="recuperarsenha">Esqueceu sua senha?</a>
                <a class="font-bold hidden text-xs lg:hidden " href="register">Cria uma conta?</a>
                <button class=" w-[140px] text-center rounded-md p-1 bg-blue-600  text-white font-bold" type="submit" name="acao">Entrar</button>
                <a class="font-bold text-xs lg:hidden" href="recuperarsenha">Esquece sua senha ?</a>
                <a class="font-bold text-xs lg:hidden " href="register">Cria uma conta?</a>
            </form>

        </div>

        <div id="popup-modal" tabindex="-1" class="flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="p-4 md:p-5 text-center">
                        <svg width="50px" class="mx-auto mb-4 text-yellow-300 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400"> <span class="sm:hidden"> Este site é um projeto avaliativo de programação </span> <span class=" hidden sm:flex "> Este site é um projeto avaliativo de estudantes de programação</span></h3>
                        <button id="btnModal" onclick="fecharModal()" data-modal-hide="popup-modal" type="button" class="text-black bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                            Ok
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class=" hidden flex-col gap-5 justify-center items-center text-center rounded-e-3xl rounded-tl-[120px] rounded-bl-[100px] w-[300px] bg-blue-600 lg:flex ">
            <p class="text-white font-bold text-2xl ">HELLO, FRIEND!</p>
            <p class="text-white text-xs mx-4 ">Registre-se com seus dados pessoais para usar todos os recursos do site</p>
            <a class="w-[140px] text-center rounded-md p-1 bg-transparent border-solid border-2 border-white text-white" href="register">Criar conta</a>
        </div>

    </div>
    <p class="text-[8px] sm:text-[13px] mt-6 ">© 2023 Diogo, Hedrik e inc. Todos os direitos reservados para TechStore.</p>
    <script src="App/assets/scripts/notificador.js" type="text/javascript"></script>
    <script src="App/assets/scripts/verificaLogin.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</body>

</html>