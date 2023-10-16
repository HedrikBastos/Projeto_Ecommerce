<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_STATIC ?>styles/output.css">
   
    <title>Registro</title>
</head>

<body  class="flex justify-center items-center h-[100vh] ">

    <div class="flex rounded-3xl shadow-[0_5px_40px_-5px_rgba(0,0,0,0.3)] shadow-slate-900  ">
        <div class=" flex flex-col justify-center items-center py-[60px] px-[60px] gap-5 lg:px-[80px] lg:py-[80px] ">
            <form class=" flex flex-col justify-center items-center gap-4" action="cadastro" method="post">
                <h1 class=" text-3xl font-bold">Cadastre-se</h1>
                <input type="text" name="nome" placeholder="Nome" class=" rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none">
                <input type="text" name="sobrenome" placeholder="Sobrenome" class=" rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none">
                <select name="genero" id="genero" class=" rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none">
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                    <option value="nao-binario">Não-binário</option>
                    <option value="prefiro-nao-dizer">Prefiro não dizer</option>
                </select>
                <input type="text" name="cpf" placeholder="CPF" id="cpf" class=" rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none" minlength="11" maxlength="11">
                <input type="email" name="email" placeholder="Email" class="inputs">
                <input type="password" name="senha" placeholder="Senha"  id="senha" class=" rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none"  minlength="4" maxlength="8">
                <input type="password" name="confirmarSenha" placeholder="Confirmar senha" id="confirmaSenha" class=" rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none" minlength="4" maxlength="8">

                <div id="mensagemErro" class="bg-red-200"></div>

                <div class="left">
                <input type="submit" name="acao" id="" value="Cadastrar" class=" w-[140px] text-center rounded-md p-1 bg-blue-600  text-white">
                </div>
                <a class=" text-xs lg:hidden" href="login">Tenho conta</a>
            </form>
           
        </div>
    </div>
    <script src="App/assets/scripts/ValidaForms.js" type="text/javascript"></script>
</body>

</html>
