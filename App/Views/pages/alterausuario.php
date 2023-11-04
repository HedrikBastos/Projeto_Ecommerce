<?php

use App\Models\Repository\UserRepository;

$dadosUsuario = new UserRepository();
$usuario = $dadosUsuario->buscaUsuario($_SESSION['id_usuario']);
?>
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
                <form class=" flex flex-col justify-center items-center gap-4" action="alteracadastro" method="post">
                    <h1 class=" text-3xl font-bold">Cadastro</h1>
                    <input type="text" name="nome" placeholder="Nome" class="campo-obrigatorio rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none" value="<?php echo $usuario->nome(); ?>" required>
                    <input type="text" name="sobrenome" placeholder="Sobrenome" class="campo-obrigatorio rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none" value="<?php echo $usuario->sobrenome(); ?>" required>
                    <select name="genero" id="genero" class="campo-obrigatorio rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none" required>
                        <option value="<?php echo ucfirst($usuario->genero()); ?>" selected><?php echo ucfirst($usuario->genero()); ?></option>
                        <option value="masculino">Masculino</option>
                        <option value="feminino">Feminino</option>
                        <option value="nao-binario">Não-binário</option>
                        <option value="prefiro-nao-dizer">Prefiro não dizer</option>
                    </select>
                    <input type="text" name="cpf" placeholder="CPF" id="cpf" class="campo-obrigatorio rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none" minlength="11" value="<?php echo $usuario->cpf(); ?>" required>
                    <input type="email" name="email" placeholder="Email" class="campo-obrigatorio rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none" value="<?php echo $usuario->email(); ?>" required>
                    <input type="password" name="senha" placeholder="Nova Senha" id="senha" class="campo-obrigatorio rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none" minlength="4" maxlength="8" required>
                    <input type="password" name="confirmarSenha" placeholder="Confirmar senha" id="confirmaSenha" class="campo-obrigatorio rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none" minlength="4" maxlength="8" required>
                    
                    <input type="hidden" name="alterausuario">
                    <div id="mensagemErroSenhas" class="erro p-1"></div>
                    <div id="mensagemErroEmail" class="erro p-1"></div>
                    <div class="left">
                        <input type="submit" name="acao" id="btnAcao" value="Salvar" class=" w-[140px] text-center rounded-md p-1 bg-blue-600  text-white">
                    </div>



            </div>
        </div>
        </form>
        
        <script src="App/assets/scripts/ValidaForms.js" type="text/javascript"></script>
</body>

</html>