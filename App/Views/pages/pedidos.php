<section class="pedidos">
     <h2>Seus Pedidos</h2>
     <div class="max-w-screen-xl mx-auto p-4">
         <?php 
                 
         foreach ($pedidos as $pedido){

         ?>
         <form class="bg-white p-6 mb-4 rounded-lg shadow-md">
             <div class="flex items-center">
                 <div class="w-40">
                     <img src="<?php echo INCLUDE_PATH_STATIC . 'img/produtos/' . $pedido['produto']['path'];?>" alt="" class="object-cover rounded-lg" loading="lazy" />
                 </div>
                 <div class="ml-4 flex flex-col">
                     <div class="flex items-center">
                         <h4 class="text-2xl leading-none text-slate-900">
                             Entregue dia 10/10
                         </h4>
                         <div class="ml-2 text-xs font-medium uppercase text-slate-500 ml-auto">
                             <?php echo 'Quantidade: ' . $pedido['pedido']['quantidade'];
                             ?> 
                         </div>
                     </div>
                     <div class="text-lg font-medium text-slate-700">
                         <?php  echo 'Total: ' . $pedido['pedido']['preco'];
                         ?> 
                     </div>
                     <div class="space-x-1 flex text-sm font-medium">
                         <p class="text-sm text-slate-900">
                             <?php echo $pedido['produto']['descricao'];
                             ?> 
                         </p>
                     </div>
                     <div class "flex space-x-4 mb-5 text-sm font-medium">
                         <button class="flex-none w-1/1 h-8 uppercase font-small tracking-wider bg-blue-700 text-white" type="submit">
                             Comprar Novamente
                         </button>
                     </div>
                 </div>
             </div>
         </form>
         <?php } 
         ?>
     </div>
</section>
