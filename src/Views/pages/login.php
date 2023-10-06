<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }
        form{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
        }
        form input{
            width: 250px;
            padding: 6px;
        }
        form button{
            width: 250px;
            padding: 6px;
        }
        form button:hover{
            border: 2px solid black;
            cursor: pointer;
            background-color: #1F487E ;
            color:white;
        }
    </style>
</head>
<body>

    <form action="../../Controllers/LoginController.php" method="post">
        <h5>Login para testar sistema</h5>
        <h1>Fazer Login</h1>
        <input type="email" name="email" placeholder="Email" >
        <input type="text" name="password" placeholder="Senha" >
        <button type="submit" name="submit" >LOGAR</button>
        <a href="register.php">Não tenho conta</a>
    </form>
    
</body>
</html>