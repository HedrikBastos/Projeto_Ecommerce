<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Store</title>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_STATIC ?>styles/output.css">
    <link rel="shortcut icon" href="<?php echo INCLUDE_PATH_STATIC ?>img/favicon/logo_transparent_formato.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<body class="flex flex-col justify-around">

    <?php
    $quantidadeTotal = 0;
    if (!empty($_SESSION['carrinho'])) {
        foreach ($_SESSION['carrinho'] as $value) {
            $quantidade = $value['quantidade'];
            $quantidadeTotal += $quantidade;
        }
    }
    ?>

    <head>

        <nav class="flex justify-around items-center p-1 bg-[#F7F7F7] ">

            <a class="flex items-center gap-2 justify-center font-bold text-4xl text-blue-600 ml-6" href="<?php echo INCLUDE_PATH ?>home">
                <img src="<?php echo INCLUDE_PATH_STATIC ?>img/logo/logo_transparent_formato.svg" alt="">
                <img class="hidden sm:flex" src="<?php echo INCLUDE_PATH_STATIC ?>img/logo/logo_transparent.svg" alt="">
            </a>


            <?php
            $quantidadeTotal = 0;
            if (!empty($_SESSION['carrinho'])) {
                foreach ($_SESSION['carrinho'] as $value) {
                    $quantidade = $value['quantidade'];
                    $quantidadeTotal += $quantidade;
                }
            }

            $precoTotal = 0;
            if (!empty($_SESSION['carrinho'])) {
                foreach ($_SESSION['carrinho'] as $value) {
                    $preco = $value['preco'];
                    $precoTotal += $preco;
                }
            }

            if (isset($produto)) {

                foreach ($produto as $value) {
                    $preco = $value['preco'];
                }
            }

            ?>

            <div class=" flex flex-col p-1  border-4 rounded-lg border-red-500 justify-center items-center sm:p-2 sm:flex-row ">
                <p class=" p-1 text-xs sm:text-lg font-semibold text-center "><?php echo $parameter == null ? $quantidadeTotal : '1' ?> itens por</p>
                <p class=" p-1 text-sm sm:text-2xl font-semibold  border-b-2 border-black"><?php echo $parameter == null ? 'R$ ' . number_format($precoTotal, 2, ',', '.') : 'R$ ' . number_format($preco, 2, ',', '.') ?> </p>
            </div>

        </nav>

    </head>

    <article class="flex flex-col justify-center items-center">

        <div>
            <p class=" text-xl sm:text-3xl font-semibold  ">Endereço</p>
            <p><?php echo $endereco->rua(); ?></p>
            <p><?php echo $endereco->bairro(); ?></p>
            <p><?php echo $endereco->Numero(); ?></p>
            <p><?php echo $endereco->cidade() . PHP_EOL . $endereco->uf(); ?> </p>
            <a class=" px-2 rounded-xl text-xs bg-blue-500 hover:bg-blue-400 font-semibold " href="<?php echo INCLUDE_PATH ?>perfil?value=alteraendereco">alterar endereço</a>
        </div>

    </article>

    <div class="flex items-center justify-center ">
        <hr class=" flex items-center justify-center w-[90%] bg-gray-500 h-[2px] m-6 ">

    </div>

    <p class="flex justify-center items-center text-xl sm:text-3xl font-semibold mb-[50px] "> Formas de pagamento </p>

    <article class="flex flex-col justify-around items-center gap-10 xl:flex-row ">

        <form action="" method="post" class="flex flex-col ">
            <div class="flex flex-col gap-4 ">
                <!--
                <p class="flex items-center gap-2 "><input class="scale-125" id="credito" type="radio" name="method"> <label for="credito"><i style="font-size: 35px; color: #005075ff " class="fa-regular fa-credit-card"></i></label> <span class=" xl:hidden"> Cartão de Crédito </span> <span class=" hidden xl:flex"> Pagamento com Cartão de Crédito: praticidade em cada transação. </span> </p>
                -->
                <p class="flex items-center gap-2 "><input class="scale-125" id="boleto" type="radio" name="method" value="boleto"> <label for="boleto"><i style="font-size: 35px; " class="fa-solid fa-barcode"></i></label> <span class=" xl:hidden"> Boleto </span> <span class=" hidden xl:flex"> Gere o boleto e efetue o pagamento em até 2 dias para concluir sua compra com sucesso. </span> </p>
                <p class="flex items-center gap-2 "><input class="scale-125" id="pix" type="radio" name="method" value="pix"> <label for="pix"><i style="font-size: 35px; color: #00bdaeff; " class="fa-brands fa-pix"></i></label> <span class=" xl:hidden"> Pix </span> <span class=" hidden xl:flex"> Gere um QR Code e não se esqueça de concluir a transação em até 30 minutos para garantir a confirmação da sua compra. </span> </p>
            </div>
            <button onsubmit="credito()" type="submit" name="submit" class="w-max text-xs bg-yellow-400 hover:bg-yellow-500 p-[6px] rounded-2xl font-semibold mt-6 sm:text-sm">Usar essa forma de pagamento</button>
        </form>
        <div>
            <!--
            <form action="" method="post"  class="flex flex-col items-center gap-1 border border-gray-700 p-6 rounded-lg ">
                <div class="flex flex-col gap-1">
                    <input type="text" name="publicKey" id="publicKey" value="<?php echo $key ?>">
                    <input type="text" name="encryptedCard" id="encryptedCard" value="">
                    <input class="py-2 px-4 w-[300px] border border-gray-600  rounded-[8px] outline-none " type="text" name="cardNumber" id="cardNumber" placeholder="Número do Cartão">
                    <input class="py-2 px-4 w-[300px] border border-gray-600  rounded-[8px] outline-none " type="text" name="cardHolder" id="cardHolder" placeholder="Nome do Cartão">
                    <input class="py-2 px-4 w-[150px] border border-gray-600 rounded-[8px] outline-none " minlength="1" maxlength="2" type="text" name="cardMonth" id="cardMonth" placeholder="Mês de Validade do Cartão">
                    <input class="py-2 px-4 w-[150px] border border-gray-600  rounded-[8px] outline-none " minlength="4" maxlength="4" type="text" name="cardYear" id="cardYear" placeholder="Ano do Validade">
                    <input class="py-2 px-4 w-[70px] border border-gray-600  rounded-[8px] outline-none " minlength="3" maxlength="3" type="text" name="cardCvv" id="cardCvv" placeholder="CVV">
                </div>
                <button id="btnSubmit" type="submit" name="pagar">Pagar</button>
            </form>
           -->

            <div class="flex flex-col justify-center items-center ">
                <?php if (isset($arrayResponse['qr_codes'][0]['links'][0]['href'])) : ?>
                    <img class=" w-[120px] sm:w-[220px] " src="<?php echo isset($arrayResponse['qr_codes'][0]['links'][0]['href']) ? $arrayResponse['qr_codes'][0]['links'][0]['href'] : "" ?>" alt="">
                <?php endif;    ?>


                <?php if (isset($arrayResponse['qr_codes'][0]['text'])) : ?>
                    <textarea class="border overflow-y-hidden border-black" id="meuTextarea" name="" id="" cols="28" rows="2"><?php echo isset($arrayResponse['qr_codes'][0]['text']) ? $arrayResponse['qr_codes'][0]['text'] : "" ?></textarea>
                    <button class=" mt-2 w-[208px] border border-black bg-green-500 font-semibold hover:bg-green-400 rounded-2xl " onclick="copiarTexto()"> Copiar </button>
                <?php endif; ?>

            </div>

            <div class="flex flex-col">
                <?php if (isset($arrayResponse['charges'][0]['liinks'])) : ?>
                    <textarea class="border overflow-y-hidden border-black" id="meuTextarea" name="" id="" cols="28" rows="2"><?php echo isset($arrayResponse['qr_codes'][0]['text']) ? $arrayResponse['qr_codes'][0]['text'] : "" ?></textarea>
                    <button class=" mt-2 w-[208px] border border-black bg-green-500 font-semibold hover:bg-green-400 rounded-2xl " onclick="copiarTexto()"> Copiar </button>
                <?php endif;    ?>

                <?php if (isset($arrayResponse['charges'][0]['links'][0]['href'])) : ?>

                    <form class=" relative w-[200px] sm:w-[300px] transition-opacity duration-800 " action="" method="get">
                        <a href="<?php echo isset($arrayResponse['charges'][0]['links'][0]['href']) ? $arrayResponse['charges'][0]['links'][1]['href'] : "" ?>" target="_blank"><img class="border border-black" src="<?php echo isset($arrayResponse['charges'][0]['links'][0]['href']) ? $arrayResponse['charges'][0]['links'][1]['href'] : "" ?>" alt="">
                            <input class="" type="hidden" name="pdf_url" value="https://boleto.sandbox.pagseguro.com.br/ea6a2552-739f-4eaa-80a9-7abc454d96fc.pdf"></a>
                        <button class=" absolute flex justify-center items-center py-1 left-0 right-0 bottom-0 bg-green-500 hover:bg-green-400 transition-opacity duration-800 " type="submit" name="dow">Download PDF</button>
                    </form>

                <?php endif; ?>

            </div>

        </div>

    </article>

    <script src="https://assets.pagseguro.com.br/checkout-sdk-js/rc/dist/browser/pagseguro.min.js"></script>
    <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/encrypted.js"></script>


    <script>
        function copiarTexto() {
            var textarea = document.getElementById("meuTextarea");
            textarea.select();
            document.execCommand('copy');
            alert("Texto copiado para a área de transferência!");
        }

        const formCard = document.querySelector('#formCard');
        const radio = document.querySelector('#credito');

        radio.addEventListener('change', (event) => {

            if (radio.checked) {
                formCard.classList.remove('hidden');
                formCard.classList.add('flex');
            }

        })
    </script>

</body>

</html>