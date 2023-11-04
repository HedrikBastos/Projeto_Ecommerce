<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_STATIC ?>styles/output.css">
    <link rel="stylesheet" href=" <?php echo INCLUDE_PATH_STATIC?>styles/estilo.css">

    <link rel="shortcut icon" href="<?php echo INCLUDE_PATH_STATIC ?>img/favicon/logo_transparent_formato.svg" type="image/x-icon">
    <title>Registro</title>
</head>

<body class="flex justify-center items-center h-[100vh]">

    <div class="containerpaginacao">
        <div class="paginacao active flex rounded-3xl shadow-[0_5px_5px_-5px_rgba(0,0,0,0.3)] shadow-slate-900 " id="registro-usuario">
            <div class=" flex flex-col justify-center items-center py-[60px] px-[60px] gap-5 lg:px-[80px] lg:py-[80px] ">
                <form class=" flex flex-col justify-center items-center gap-4" action="cadastro" method="post">
                    <h1 class=" text-3xl font-bold">Cadastre-se</h1>
                    <input type="text" name="nome" id="nome" placeholder="Nome" class="campo-obrigatorio rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none">
                    <input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome" class="campo-obrigatorio rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none">
                    <select name="genero" id="genero" class="campo-obrigatorio rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none">
                    <option value="" disabled selected>Genero</option>
                        <option value="masculino">Masculino</option>
                        <option value="feminino">Feminino</option>
                        <option value="nao-binario">Não-binário</option>
                        <option value="prefiro-nao-dizer">Prefiro não dizer</option>
                    </select>
                    <input type="text" name="cpf" placeholder="CPF" id="cpf" class="campo-obrigatorio rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none" minlength="11" maxlength="11">
                    <input type="email" name="email" placeholder="Email" class="campo-obrigatorio rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none">
                    <input type="password" name="senha" placeholder="Senha" id="senha" class="campo-obrigatorio rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none" minlength="4" maxlength="8">
                    <input type="password" name="confirmarSenha" placeholder="Confirmar senha" id="confirmaSenha" class="campo-obrigatorio rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none" minlength="4" maxlength="8">
                    <div id="mensagemErroSenhas" class="erro p-1"></div>
                    <div id="mensagemErroEmail" class="erro p-1"></div>
                    <div class="left">
                        <a id="btnAcao" class=" cursor-pointer w-[140px] text-center rounded-md p-2 bg-blue-400 text-white">Próximo</a>
                    </div>
                    <a class="font-bold text-xs" href="login">Tenho conta</a>
            
            </div>
        </div>
        <div class="paginacao flex rounded-3xl shadow-[0_5px_5px_-5px_rgba(0,0,0,0.3)] shadow-slate-900 " id="registro-endereco">
            <div class=" flex flex-col justify-center items-center py-[60px] px-[60px] gap-5 lg:px-[80px] lg:py-[80px] ">
               
                    <h1 class=" text-3xl font-bold">Endereço</h1>
                    <input type="text" name="cep" placeholder="Cep" class=" rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none">
                    <input type="text" name="cidade" placeholder="Cidade" class=" rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none">
                    <select name="uf" id="uf" class=" rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none" required>
                        <option value="" disabled selected>Estado</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>
                    <input type="text" name="rua" placeholder="Rua" id="cpf" class=" rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none" required>
                    <input type="text" name="numero" placeholder="Nº" class=" rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none" required>
                    <input type="text" name="bairro" placeholder="Bairro" id="bairro" class=" rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none" required>
                    <input type="text" name="complemento" placeholder="Complemento" class=" rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none" required>
                    <input type="text" name="telefone" placeholder="Telefone" id="telefone" class=" rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none" minlength="11" maxlength="11" required>
                    <div class="left">
                        <input type="submit" name="acao" id="" value="Cadastrar" class=" w-[140px] text-center rounded-md p-1 bg-blue-600  text-white">
                    </div>
                    <a class="font-bold text-xs" href="login">Tenho conta</a>
                </form>
            </div>
        </div>
    </div> 
    <script src="App/assets/scripts/ValidaForms.js" type="text/javascript"></script>
</body>

</html>