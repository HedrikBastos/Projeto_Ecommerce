<section class="pedidos">
    <h2>Seus Pedidos</h2>
    <div class="max-w-screen-xl mx-auto p-4">
        <?php
        $pedidoAnterior = null;
        foreach ($pedidos as $pedido) {
            if ($pedido['pedido']['id_pedido'] !== $pedidoAnterior) {
        ?>
                <form class="bg-white p-6 mb-4 rounded-lg shadow-md relative">
                    <div class="flex items-center ">
                        <div class="w-40">
                            <img src="<?php echo INCLUDE_PATH_STATIC . 'img/produtos/' . $pedido['produto']['path']; ?>" alt="" class="object-cover rounded-lg" loading="lazy" />
                        </div>
                        <div class="ml-4 flex flex-col ">
                            <div class="flex  items-center ">
                                <h6 class="text-2xl leading-none text-slate-900">
                                    <?php echo 'Pedido ' . $pedido['pedido']['status']?>
                                </h6>
                                
                                <div class="absolute ml-auto right-10 text-sm font-medium uppercase text-slate-600 text-center">
                                    <?php echo 'Quantidade: </br> ' . $pedido['pedido']['quantidade'];
                                    ?>
                                </div>
                               
                            </div>
                            <div class="ml-2 right-10 text-sm font-medium uppercase text-slate-600">
                                    <?php echo 'Compra realizada no dia: ' . $data =date('d/m/Y',strtotime($pedido['pedido']['data']));
                                    ?>
                                </div>
                            <div class="text-lg p-1 font-medium text-slate-700">
                                <?php echo 'Total: ' . $pedido['pedido']['preco'];
                                ?>
                            </div>
                            <div class="space-x-1 p-1 flex text-sm font-medium">
                                <p class="text-base text-slate-900">
                                <?php echo $pedido['produto']['nome'];?>
                                </p>
                            </div>
                            <div class="flex space-x-5 mb-5 text-sm font-medium ">
                                <button class="flex w-1/1 uppercase font-small tracking-wider bg-blue-700 text-white rounded-lg p-1" type="submit">
                                    Comprar Novamente
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
        <?php
                $pedidoAnterior = $pedido['pedido']['id_pedido'];
            }
        }
        ?>
    </div>
</section>