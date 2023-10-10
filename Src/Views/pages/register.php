<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_STATIC?>/styles/style.css">
    <title>Registro</title>
</head>

<body>

    <div class="box-login centralizar">
        <form action="" method="post">
            <h5>Cadastro para testar sistema</h5>
            <h1>Cadastre-se</h1>
            <input type="text" name="name" placeholder="Nome" class="inputs">
            <input type="text" name="surname" placeholder="Sobrenome" class="inputs">
            <input type="email" name="email" placeholder="Email" class="inputs">
            <input type="password" name="password" placeholder="Senha" class="inputs">
            <input type="password" name="passwordConfirm" placeholder="Confirmar senha" class="inputs">
            <div class="left">
                <input type="submit" name="acao" id="" value="logar">
            </div>

        </form>
        <a href="<?php echo INCLUDE_PATH ?>">Tenho conta</a>
    </div>

</body>

</html>