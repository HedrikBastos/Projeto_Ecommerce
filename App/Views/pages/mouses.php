<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Store</title>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_STATIC ?>styles/output.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_STATIC ?>styles/estilo.css">
    <link rel="shortcut icon" href="<?php echo INCLUDE_PATH_STATIC ?>img/favicon/logo_transparent_formato.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body class="bg-[#F7F7F7] overflow-x-hidden">

<?php
include_once('head.php');
?>

    <div class="hidden sm:flex ">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper" style="align-items: center;">
                <div class="swiper-slide " class="slideP" style="width: 100%; object-fit: cover; "> <img src="<?php echo INCLUDE_PATH_STATIC ?>img/carousel/slideOne.png" alt=""> </div>
                <div class="swiper-slide " class="slideP" style="width: 100%; object-fit: cover; "> <img src="<?php echo INCLUDE_PATH_STATIC ?>img/carousel/slideTwo.png" alt=""> </div>
                <div class="swiper-slide " class="slideP" style="width: 100%; object-fit: cover; "> <img src="<?php echo INCLUDE_PATH_STATIC ?>img/carousel/slideThree.png" alt=""> </div>
            </div>
            <div class="swiper-button-next buttonSlide bg-white rounded-[1px]"></div>
            <div class="swiper-button-prev buttonSlide bg-white rounded-[1px]"></div>
            <div class="swiper-pagination"></div>
            <div class="autoplay-progress">
                <svg style="display:none;" viewBox="0 0 48 48">
                    <circle style="display:none;" cx="24" cy="24" r="20"></circle>
                </svg>
                <span style="display:none;"></span>
            </div>
        </div>
    </div>

    <h1 class="flex justify-center font-semibold text-sm sm:text-2xl mt-6 ">Produtos em falta!</h1>

    <article class=" flex justify-center items-center ">

        <div class=" flex flex-wrap justify-center w-[1300px] p-[10px] gap-1 ">
            <?php foreach ($produtos as $key => $value) : ?>

                <?php if ($value['categoria'] == 'Mouses') : ?>

                    <a class=" produtos flex flex-col items-center justify-center text-center relative border-hidden border-[1px] border-black  hover:border-solid w-[125px] sm:w-[200px] " href="show/<?= $value['id_produto'] ?>">
                        <img class="w-[200px]" src="<?= INCLUDE_PATH_STATIC ?><?= $value['imagem'] ?>" alt="">
                        <p class="text-[9px] whitespace-pre-wrap max-w-[150px] overflow-ellipsis sm:text-xs"> <?= $value['nome'] ?></p>
                        <p class="text-xs font-semibold text-[#E01D25] sm:text-sm"> R$<?php echo number_format($value['preco'], 2, ',', '.') ?></p>
                    </a>

                <?php endif; ?>

            <?php endforeach; ?>

        </div>

    </article>

    <div class="flex flex-col mt-[400px] ">
        <footer class="flex flex-col items-center rounded-lg bg-blue-800 m-8 py-24 sm:items-stretch">

            <article class="flex flex-col justify-around sm:items-start sm:flex-row">

                <div class="flex flex-col text-sm text-white p-2 gap-1 ">
                    <a href="#" class="mb-3 text-lg ">Empresa</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Sobre nós</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Confiança, Segurança e Proteção</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Contate-nos</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Trabalhe Conosco</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Comunidade</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Acessibilidade</a>
                </div>

                <div class="flex flex-col text-sm text-white p-2 gap-1 ">
                    <a href="#" class="mb-3 text-lg ">Pagamento</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Compre com Pontos</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Meios de Pagamento</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Cartão de Crédito</a>
                </div>

                <div class="flex flex-col text-sm text-white p-2 gap-1 ">
                    <a href="#" class="mb-3 text-lg "> Deixe-nos ajudar você</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Sua conta</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Meus Pedidos</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Frete e prazo de entrega</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Devoluções e reembolsos</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Gerencie seu conteúdo e dispositivos</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Ajuda</a>
                </div>

                <div class="flex flex-col text-sm text-white p-2 gap-1 ">
                    <a href="#" class="mb-3 text-lg ">Dúvidas</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Portal de Privacidade</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Termos e Condições de Uso</a>
                    <a class=" max-w-max decoration-solid decoration-white hover:underline " href="#">Prepare-se para a BlackFriday</a>
                </div>

            </article>

            <hr class=" mt-10 ml-10 mr-10 text-lg bg-white ">

            <div class="flex flex-col justify-around ml-10 sm:flex-row text-sm text-white p-2">
                <p class="text-xs"> © 2023 Diogo, Hedrik e inc. Todos os direitos reservados para TechStore.</p>
                <div class="flex items-center">
                    <a href="#"> <box-icon size="md" name='instagram-alt' type='logo' color='#ffffff'></box-icon> </a>
                    <a href="#"> <box-icon size="md" name='linkedin-square' type='logo' color='#ffffff'></box-icon> </a>
                    <a href="#"> <box-icon size="md" name='facebook-circle' type='logo' color='#ffffff'></box-icon> </a>
                    <a href="#"> <box-icon size="md" name='youtube' type='logo' color='#ffffff'></box-icon> </a>
                </div>
            </div>

        </footer>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.js" integrity="sha512-Dm5UxqUSgNd93XG7eseoOrScyM1BVs65GrwmavP0D0DujOA8mjiBfyj71wmI2VQZKnnZQsSWWsxDKNiQIqk8sQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/jquery-3.7.1.js"></script
    <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/carousel.js"></script>
    <script src="<?php echo INCLUDE_PATH_STATIC ?>scripts/pesquisarProduto.js"></script>

</body>

</html>