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
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_STATIC ?>styles/estilo.css">
    <title>Tech Store</title>
</head>

<body class="flex justify-center items-center h-[100vh] ">
    <div class="containerpaginacao">
    <div class="rounded-3xl shadow-[0_2px_10px_-5px_rgba(0,0,0,0.1)] shadow-slate-900">
            <div class="flex flex-col justify-center items-center py-[60px] px-[60px] gap-5 lg:px-[80px] lg:py-[80px]">
                <form class="flex flex-col gap-2" action="alteracadastro" method="post">
                    <h1 class="text-3xl font-bold">Endereço</h1>
                    
                    <div class="flex flex-col lg:flex-row gap-4">
                    <label class="block">
                        <span class="block text-sm font-medium text-slate-700">CEP</span>
                        <input type="text" name="cep" placeholder="Cep" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" value="<?php echo $endereco->Cep(); ?>">
                    </label>

                    <label class="block">
                    <span class="block text-sm font-medium text-slate-700">CIDADE</span>
                        
                            <input type="text" name="cidade" placeholder="Cidade" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" value="<?php echo $endereco->Cidade(); ?>" required>
                    </label>
                        
                            <label class="block">
                            <span class="block text-sm font-medium text-slate-700">ESTADO</span>
                                <select name="uf" id="uf" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                                <option value="<?php echo $endereco->Uf(); ?>" selected><?php echo $endereco->Uf(); ?></option>
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
                            <input type="text" name="rua" placeholder="Rua" id="cpf" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" value="<?php echo $endereco->Rua(); ?>" required>
                        </label>

                        <label class="block">
                        <span class="block text-sm font-medium text-slate-700">NUMERO</span>
                            <input type="text" name="numero" placeholder="Nº" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" value="<?php echo $endereco->Numero(); ?>" required>
                        </label>
                    
                    <label class="block">
                    <span class="block text-sm font-medium text-slate-700">BAIRRO</span>
                        <input type="text" name="bairro" placeholder="Bairro" id="bairro" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" value="<?php echo $endereco->Bairro(); ?>" required>
                    </label>

                    </div>
                    <div class="flex flex-col lg:flex-row gap-4">
                        <label class="block">
                        <span class="block text-sm font-medium text-slate-700">COMPLEMENTO</span>
                            <input type="text" name="complemento" placeholder="Complemento" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" value="<?php echo $endereco->Complemento(); ?>" required>
                        </label>

                        <label class="block">
                        <span class="block text-sm font-medium text-slate-700">TELEFONE</span>
                            <input type="text" name="telefone" placeholder="Telefone" id="telefone" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" minlength="11" maxlength="11" value="<?php echo $endereco->Telefone(); ?>" required>
                        </label>
                    </div>

                    <input type="hidden" name="alteraendereco">

                    <div class="relative">
                        <input type="submit" name="acao" id="" value="Salvar" class="w-[140px] text-center rounded-md p-1 bg-blue-600 text-white">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="App/assets/scripts/ValidaForms.js" type="text/javascript"></script>
</body>

</html>

