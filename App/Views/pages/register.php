<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_STATIC ?>styles/output.css">
    <link rel="stylesheet" href=" <?php echo INCLUDE_PATH_STATIC ?>styles/estilo.css">

    <link rel="shortcut icon" href="<?php echo INCLUDE_PATH_STATIC ?>img/favicon/logo_transparent_formato.svg" type="image/x-icon">
    <title>Registro</title>
</head>

<body class="flex flex-col justify-center items-center h-[100vh] ">

    <div class="container mt-[-70px] grid justify-center items-center h-[100vh]">
        <div class="paginacao active flex justify-center item-center rounded-3xl shadow-[0_5px_5px_-5px_rgba(0,0,0,0.3)] shadow-slate-900 " id="registro-usuario">
            <div class="flex flex-col justify-center items-center py-[60px] px-[60px] gap-5 lg:px-[80px] lg:py-[80px] ">
                <form class=" flex flex-col gap-2" action="cadastro" method="post">
                    <a class=" flex mb-4 mr-7 items-center gap-2 justify-center font-bold text-4xl text-blue-600 ml-6" href="">
                        <img src="<?php echo INCLUDE_PATH_STATIC ?>img/logo/logo_transparent_formato.svg" alt="">
                        <img class="hidden sm:flex" src="<?php echo INCLUDE_PATH_STATIC ?>img/logo/logo_transparent.svg" alt="">
                    </a>
                    <h1 class=" text-3xl font-bold">Cadastre-se</h1>

                    <div class="flex flex-col lg:flex-row gap-4">
                        <label class="block">
                            <span class="block text-sm font-medium text-slate-700">NOME</span>
                            <input type="text" name="nome" id="nome" placeholder="Nome" class="campo-obrigatorio mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" required>
                        </label>

                        <label class="block">
                            <span class="block text-sm font-medium text-slate-700">SOBRENOME</span>
                            <input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome" class="campo-obrigatorio mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" required>
                        </label>

                        <label class="block">
                            <span class="block text-sm font-medium text-slate-700">GENERO</span>
                            <select name="genero" id="genero" class="campo-obrigatorio mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                                <option value="" disabled selected>Genero</option>
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
                            <input type="text" name="cpf" placeholder="CPF" id="cpf" class="campo-obrigatorio mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" minlength="11" maxlength="11" pattern="[0-9]{3}[0-9]{3}[0-9]{3}[0-9]{2}">
                        </label>

                        <label class="block">
                            <span class="block text-sm font-medium text-slate-700">EMAIL</span>
                            <input type="email" name="email" placeholder="Email" class="campo-obrigatorio mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                        </label>

                        <label class="block">
                            <span class="block text-sm font-medium text-slate-700">NOME ANIMAL DE ESTIMAÇÃO</span>
                            <input type="text" name="contraSenha" placeholder=" Nome animal de estimação" id="contraSenha" class="campo-obrigatorio mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" maxlength="15" required>
                        </label>
                    </div>

                    <div class="flex flex-col lg:flex-row gap-4">
                        <label class="block">
                            <span class="block text-sm font-medium text-slate-700">SENHA</span>
                            <input type="password" name="senha" placeholder="Senha" id="senha" class="campo-obrigatorio mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" minlength="4" maxlength="8">
                        </label>

                        <label class="block">
                            <span class="block text-sm font-medium text-slate-700">CONFIRMAR SENHA</span>
                            <input type="password" name="confirmarSenha" placeholder="Confirmar senha" id="confirmaSenha" class="campo-obrigatorio mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" minlength="4" maxlength="8">
                        </label>
                    </div>

                    <div id="mensagemErroSenhas" class="erro p-1 w-[220px]"></div>
                    <div id="mensagemErroEmail" class="erro p-1 w-[220px]"></div>
                    <div id="mensagemErroCPF" class="erro p-1 w-[220px]"></div>
                    <div class="left">
                        <a id="btnAcao" class=" cursor-pointer w-[140px] text-center rounded-md p-2 bg-blue-400 text-white">Próximo</a>
                    </div>
                    <a class="font-bold text-xs" href="login">Tenho conta</a>

            </div>
        </div>
        <div class="paginacao flex rounded-3xl shadow-[0_5px_5px_-5px_rgba(0,0,0,0.3)] shadow-slate-900 " id="registro-endereco">
            <div class=" flex flex-col py-[60px] px-[60px] gap-5 lg:px-[80px] lg:py-[80px] ">
                <a class=" flex mb-4 mr-7 items-center gap-2 justify-center font-bold text-4xl text-blue-600 ml-6" href="">
                    <img src="<?php echo INCLUDE_PATH_STATIC ?>img/logo/logo_transparent_formato.svg" alt="">
                    <img class="hidden sm:flex" src="<?php echo INCLUDE_PATH_STATIC ?>img/logo/logo_transparent.svg" alt="">
                </a>
                <h1 class=" text-3xl font-bold">Endereço</h1>

                <div class="flex flex-col lg:flex-row gap-4">
                    <label class="block">
                        <span class="block text-sm font-medium text-slate-700">CEP</span>
                        <input type="text" name="cep" placeholder="Cep" class=" mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" minlength="8" maxlength="8">
                    </label>

                    <label class="block">
                        <span class="block text-sm font-medium text-slate-700">CIDADE</span>
                        <input type="text" name="cidade" placeholder="Cidade" class=" mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" required>
                    </label>

                    <label class="block">
                        <span class="block text-sm font-medium text-slate-700">BAIRRO</span>
                        <select name="uf" id="uf" class=" mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" required>
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
                    </label>
                </div>

                <div class="flex flex-col lg:flex-row gap-4">
                    <label class="block">
                        <span class="block text-sm font-medium text-slate-700">RUA</span>
                        <input type="text" name="rua" placeholder="Rua" id="cpf" class=" mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" required>
                    </label>

                    <label class="block">
                        <span class="block text-sm font-medium text-slate-700">NUMERO</span>
                        <input type="text" name="numero" placeholder="Nº" class=" mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" required>
                    </label>

                    <label class="block">
                        <span class="block text-sm font-medium text-slate-700">BAIRRO</span>
                        <input type="text" name="bairro" placeholder="Bairro" id="bairro" class=" mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" required>
                    </label>
                </div>

                <div class="flex flex-col lg:flex-row gap-4">
                    <label class="block">
                        <span class="block text-sm font-medium text-slate-700">COMPLEMENTO</span>
                        <input type="text" name="complemento" placeholder="Complemento" class=" mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" required>
                    </label>

                    <label class="block">
                        <span class="block text-sm font-medium text-slate-700">TELEFONE</span>
                        <input type="text" name="telefone" id="telefone" class=" mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" minlength="11" maxlength="11" pattern="[0-9]{2}[0-9]{5}[0-9]{4}" placeholder="dd-xxxxx-xxxx" required>
                    </label>
                </div>

                <div class="left">
                    <input type="submit" name="acao" id="" value="Cadastrar" class=" w-[140px] text-center rounded-md p-1 bg-blue-600  text-white" required>
                </div>
                <a class="font-bold text-xs" href="login">Tenho conta</a>

                </form>
            </div>
        </div>
    </div>
    <p class="text-[8px] sm:text-[13px]">© 2023 Diogo, Hedrik e inc. Todos os direitos reservados para TechStore.</p>
    <script src="App/assets/scripts/ValidaForms.js" type="text/javascript"></script>
</body>

</html>