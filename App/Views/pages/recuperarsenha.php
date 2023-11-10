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

<body class="">
<head >
        <nav class=" flex justify-between items-center p-1 bg-[#F7F7F7] border-solid border-b-2 border-blue-600 ">

            <a class=" flex items-center gap-2 justify-center font-bold text-4xl text-blue-600 ml-6" href="login">
                <img src="<?php echo INCLUDE_PATH_STATIC ?>img/logo/logo_transparent_formato.svg" alt="">
                <img class="hidden sm:flex" src="<?php echo INCLUDE_PATH_STATIC ?>img/logo/logo_transparent.svg" alt="">
            </a>
        </nav>
</head>
    <div class="containerpaginacao grid justify-center items-center h-[100vh]">
        <div class="paginacao active flex rounded-3xl shadow-[0_5px_5px_-5px_rgba(0,0,0,0.3)] shadow-slate-900 " id="registro-usuario">
            <div class=" flex flex-col justify-center items-center py-[60px] px-[60px] gap-5 lg:px-[80px] lg:py-[80px] ">
                <form class=" flex flex-col justify-center items-center gap-4" action="contrasenha" method="post">
                    <h1 class=" text-3xl font-bold">Verificar contra Senha</h1>
                    <input type="email" name="email" placeholder="Email" class="campo-obrigatorio rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none">
                    <input type="text" name="contraSenha" id="recuperaSenha" placeholder=" Nome animal de estimação" class="campo-obrigatorio rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none">
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