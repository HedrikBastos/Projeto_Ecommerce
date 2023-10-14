<!DOCTYPE html>
<html lang="pr-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_STATIC ?>styles/style.css">
    <title>Login</title>
</head>

<body>

    <div class="box-login centralizar">
        <h2>Faça login</h2>
        <form action="Login" method="post">
            <input type="email" name="email" id="" class="inputs" placeholder="Seu Email" required>
            <input type="password" name="senha" id="" class="inputs" placeholder="Senha" required>
            <input type="hidden" name="login">
            <div class="left">
                <input type="submit" name="acao" id="" value="Entrar">
            </div>
        </form>
   <a href="<?php echo INCLUDE_PATH?>register"> <p>Criar Conta</p>
   </a>
    </div>
  

</body>

</html>