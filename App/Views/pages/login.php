<!DOCTYPE html>
<html lang="pr-br">
<!--  npx tailwindcss -i ./app/assets/styles/input.css -o ./app/assets/styles/output.css --watch  -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_STATIC ?>styles/output.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.js" integrity="sha512-Dm5UxqUSgNd93XG7eseoOrScyM1BVs65GrwmavP0D0DujOA8mjiBfyj71wmI2VQZKnnZQsSWWsxDKNiQIqk8sQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Login</title>
    <link rel="shortcut icon" href="<?php echo INCLUDE_PATH_STATIC ?>img/favicon/logo_transparent_formato.svg" type="image/x-icon">
</head>

<body class="flex justify-center items-center h-[100vh] ">

    <div class="flex rounded-3xl shadow-[0_5px_40px_-5px_rgba(0,0,0,0.3)] shadow-slate-900  ">

        <div class=" flex flex-col justify-center items-center py-[60px] px-[60px] gap-5 lg:px-[80px] lg:py-[80px] ">

            <h1 class=" text-3xl font-bold">Fazer Login</h1>

            <div class="flex justify-center items-center gap-4 ">
                <box-icon type='logo' name='instagram'></box-icon>
                <box-icon type='logo' name='instagram'></box-icon>
                <box-icon type='logo' name='instagram'></box-icon>
                <box-icon type='logo' name='instagram'></box-icon>
            </div>

            <form class=" flex flex-col justify-center items-center gap-4" action="login" method="post" id="">
                <input type="email" name="email" class=" rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none" placeholder="Email" required>
                <input type="password" name="senha" class=" rounded-md bg-slate-200 w-[220px] p-1 outline-none" placeholder="Senha" required minlength="4" maxlength="8">
                <a class=" hidden text-xs lg:flex" href="">Esqueceu sua senha?</a>
                <a class=" hidden text-xs lg:hidden " href="">Cria uma conta?</a>
                <button class=" w-[140px] text-center rounded-md p-1 bg-blue-600  text-white " type="submit" name="acao">Entrar</button>
                <a class=" text-xs lg:hidden" href="">Esqueceu sua senha?</a>
                <a class=" text-xs lg:hidden " href="register">Cria uma conta?</a>
            </form>

        </div>

        <div class=" hidden flex-col gap-5 justify-center items-center text-center rounded-e-3xl rounded-tl-[120px] rounded-bl-[100px] w-[300px] bg-blue-600 lg:flex ">
            <p class="text-white font-bold text-2xl ">HELLO, FRIEND!</p>
            <p class="text-white text-xs mx-4 ">Registre-se com seus dados pessoais para usar todos os recursos do site</p>
            <a class="w-[140px] text-center rounded-md p-1 bg-transparent border-solid border-2 border-white text-white" href="register">Criar conta</a>
        </div>

    </div>

 <?php echo $mesage??'';?>

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</body>

</html>