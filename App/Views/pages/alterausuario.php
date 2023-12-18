<?php
if (isset($_SESSION['mensagem'])) {
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
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_STATIC ?>styles/output.css">
    <link rel="stylesheet" href=" <?php echo INCLUDE_PATH_STATIC ?>styles/estilo.css">
    <title>Tech Store</title>
</head>

<body class="flex justify-center items-center h-[100vh] ">

    <div class="containerpaginacao">
        <div class="rounded-3xl shadow-[0_2px_10px_-5px_rgba(0,0,0,0.1)] shadow-slate-900">
            <div class=" flex flex-col justify-center items-center py-[60px] px-[60px] gap-5 lg:px-[80px] lg:py-[80px] ">
                <form class=" flex flex-col gap-2" action="alteracadastro" method="post">
                    <h1 class=" text-3xl font-bold">Cadastro</h1>

                    <div class="flex flex-col lg:flex-row gap-4">
                        <label class="block">
                            <span class="block text-sm font-medium text-slate-700">NOME</span>
                            <input type="text" name="nome" placeholder="Nome" class="campo-obrigatorio mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" value="<?php echo $usuario->nome(); ?>" required>
                        </label>

                        <label class="block">
                            <span class="block text-sm font-medium text-slate-700">SOBRENOME</span>
                            <input type="text" name="sobrenome" placeholder="Sobrenome" class="campo-obrigatorio mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" value="<?php echo $usuario->sobrenome(); ?>" required>
                        </label>
                        <label class="block">
                            <span class="block text-sm font-medium text-slate-700">GENERO</span>
                            <select name="genero" id="genero" class="campo-obrigatorio mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" required>
                                <option value="<?php echo ucfirst($usuario->genero()); ?>" selected>
                                    <?php echo ucfirst($usuario->genero()); ?></option>
                                <option value="masculino">Masculino</option>
                                <option value="feminino">Feminino</option>
                                <option value="nao-binario">Não-binário</option>
                                <option value="prefiro-nao-dizer">Prefiro não dizer</option>
                            </select>
                        </label>
                    </div>

                    <div class="flex flex-col lg:flex-row gap-4">

                        <label class="block">
                            <span class="block text-sm font-medium text-slate-700">CPF</span>
                            <input type="text" name="cpf" placeholder="CPF" id="cpf" class="campo-obrigatorio mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" minlength="11" value="<?php echo $usuario->cpf(); ?>" required>
                        </label>

                        <label class="block">
                            <span class="block text-sm font-medium text-slate-700">EMAIL</span>
                            <input type="email" name="email" placeholder="Email" class="campo-obrigatorio mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" value="<?php echo $usuario->email(); ?>" required>
                        </label>

                        <label class="block">
                            <span class="block text-sm font-medium text-slate-700">NOME ANIMAL DE ESTIMAÇÃO</span>
                            <input type="text" name="contraSenha" placeholder=" Nome animal de estimação" id="contraSenha" class="campo-obrigatorio mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" maxlength="15">
                        </label>
                    </div>

                    <div class="flex flex-col lg:flex-row gap-4">
                        <label class="block">
                            <span class="block text-sm font-medium text-slate-700">NOVA SENHA</span>
                            <input type="password" name="senha" placeholder="Nova Senha" id="senha" class="campo-obrigatorio mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" minlength="4" maxlength="8" required>
                        </label>

                        <label class="block">
                            <span class="block text-sm font-medium text-slate-700">CONFIRMAR SENHA</span>
                            <input type="password" name="confirmarSenha" placeholder="Confirmar senha" id="confirmaSenha" class="campo-obrigatorio mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" minlength="4" maxlength="8" required>
                        </label>
                    </div>

                    <input type="hidden" name="alterausuario">

                    <div id="mensagemErroSenhas" class="erro p-1 w-[220px]"></div>
                    <div id="mensagemErroEmail" class="erro p-1 w-[220px]"></div>
                    <div id="mensagemErroCPF" class="erro p-1 w-[220px]"></div>

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