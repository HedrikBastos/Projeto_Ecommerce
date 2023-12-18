<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_STATIC ?>styles/output.css">
    <link rel="stylesheet" href=" <?php echo INCLUDE_PATH_STATIC ?>styles/estilo.css">

    <link rel="shortcut icon" href="<?php echo INCLUDE_PATH_STATIC ?>img/favicon/logo_transparent_formato.svg" type="image/x-icon">
    <title>Tech Store</title>
</head>

<body>
    <div class="containerpaginacao grid justify-center items-center h-[100vh]">
        <div class="paginacao active flex rounded-3xl shadow-[0_5px_5px_-5px_rgba(0,0,0,0.3)] shadow-slate-900 " id="registro-usuario">
            <div class=" flex flex-col justify-center items-center py-[60px] px-[60px] gap-5 lg:px-[80px] lg:py-[80px] ">
                <form class=" flex flex-col justify-center items-center gap-4" action="contrasenha" method="post">
                    <h1 class=" text-3xl font-bold">Verificar contra Senha</h1>
                    <input type="email" name="email" placeholder="Email" class="campo-obrigatorio mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                    <input type="text" name="contraSenha" id="recuperaSenha" placeholder=" Nome animal de estimação" class="campo-obrigatorio mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                    <input type="hidden" name="redefinicaoSenha" value="true">

                    <div class="left">
                        <input type="submit" name="acao" id="" value="Verificar" class=" w-[140px] text-center rounded-md p-1 bg-blue-600  text-white">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="App/assets/scripts/notificador.js" type="text/javascript"></script>
    <script src="App/assets/scripts/verificaLogin.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</body>

</html>