<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_STATIC ?>/styles/style.css">
    <title>Registro</title>
</head>

<body>

    <div class="box-login centralizar">
        <form action="Cadastro" method="post">
            <h5>Cadastro para testar sistema</h5>
            <h1>Cadastre-se</h1>
            <input type="text" name="nome" placeholder="Nome" class="inputs">
            <input type="text" name="sobrenome" placeholder="Sobrenome" class="inputs">
            <select name="genero" id="genero">
                <option value="masculino">Masculino</option>
                <option value="feminino">Feminino</option>
                <option value="nao-binario">Não-binário</option>
                <option value="prefiro-nao-dizer">Prefiro não dizer</option>
            </select>
            <input type="text" name="cpf" placeholder="CPF" class="inputs">
            <input type="email" name="email" placeholder="Email" class="inputs">
            <input type="password" name="senha" placeholder="Senha" class="inputs">
            <input type="password" name="confirmarSenha" placeholder="Confirmar senha" class="inputs">


            <div class="left">
                <input type="submit" name="acao" id="" value="logar">
            </div>

        </form>
        <a href="<?php echo INCLUDE_PATH ?>">Tenho conta</a>
    </div>

</body>

</html>