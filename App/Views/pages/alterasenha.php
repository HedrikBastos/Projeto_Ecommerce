<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_STATIC ?>styles/output.css">
    <link rel="stylesheet" href=" <?php echo INCLUDE_PATH_STATIC ?>styles/estilo.css">

    <title>Cadastro</title>
</head>

<body class="flex justify-center items-center h-[100vh] ">

    <div class="containerpaginacao">
        <div class="rounded-3xl shadow-[0_2px_10px_-5px_rgba(0,0,0,0.1)] shadow-slate-900">
            <div class=" flex flex-col justify-center items-center py-[60px] px-[60px] gap-5 lg:px-[80px] lg:py-[80px] ">
                <form class=" flex flex-col justify-center items-center gap-4" action="alterasenha" method="post">
                    <h1 class=" text-3xl font-bold">Alterar Senha</h1>

                    <input type="password" name="senha" placeholder="Nova Senha" id="senha" class="campo-obrigatorio rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none" minlength="4" maxlength="8" required>
                    <input type="password" name="confirmarSenha" placeholder="Confirmar senha" id="confirmaSenha" class="campo-obrigatorio rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none" minlength="4" maxlength="8" required>
                    <div id="mensagemErroSenhas" class="erro p-1"></div>
                    <div class="left">
                        <input type="submit" name="acao" id="btnAcao" value="Salvar" class=" w-[140px] text-center rounded-md p-1 bg-blue-600  text-white">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="App/assets/scripts/ValidaForms.js" type="text/javascript"></script>
</body>

</html>