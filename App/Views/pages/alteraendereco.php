<?php
use App\Models\Repository\EnderecoRepository;

$dadosEndereco = new EnderecoRepository();
$endereco = $dadosEndereco->buscaEndereco($_SESSION['id_usuario']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_STATIC ?>styles/output.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_STATIC ?>styles/estilo.css">
    <title>Alterar Endereço</title>
</head>

<body class="flex justify-center items-center h-[100vh] ">
    <div class="containerpaginacao">
        <div class="rounded-3xl shadow-[0_2px_10px_-5px_rgba(0,0,0,0.1)] shadow-slate-900">
            <div class="flex flex-col justify-center items-center py-[60px] px-[60px] gap-5 lg:px-[80px] lg:py-[80px]">
                <form class="flex flex-col justify-center items-center gap-4" action="alteracadastro" method="post">
                    <h1 class="text-3xl font-bold">Endereço</h1>
                    <input type="text" name="cep" placeholder="Cep" class="rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none" value="<?php echo $endereco->Cep(); ?>">
                    <input type="text" name="cidade" placeholder="Cidade" class="rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none" value="<?php echo $endereco->Cidade(); ?>">
                    <select name="uf" id="uf" class="rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none">
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
                    <input type="text" name="rua" placeholder="Rua" id="cpf" class="rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none" value="<?php echo $endereco->Rua(); ?>" required>
                    <input type="text" name="numero" placeholder="Nº" class="rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none" value="<?php echo $endereco->Numero(); ?>" required>
                    <input type="text" name="bairro" placeholder="Bairro" id="bairro" class="rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none" value="<?php echo $endereco->Bairro(); ?>" required>
                    <input type="text" name="complemento" placeholder="Complemento" class="rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none" value="<?php echo $endereco->Complemento(); ?>" required>
                    <input type="text" name="telefone" placeholder="Telefone" id="telefone" class="rounded-md bg-slate-200 w-[220px] p-1 border-b-2 outline-none" minlength="11" maxlength="11" value="<?php echo $endereco->Telefone(); ?>" required>
                    <input type="hidden" name="alteraendereco">
                    <div class="left">
                        <input type="submit" name="acao" id="" value="Salvar" class="w-[140px] text-center rounded-md p-1 bg-blue-600 text-white">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="App/assets/scripts/ValidaForms.js" type="text/javascript"></script>
</body>
</html>
