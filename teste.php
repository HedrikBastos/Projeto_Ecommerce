<section class="pedidos">
     <h2>Seus Pedidos</h2>
     <div class="max-w-screen-xl mx-auto p-4">
         <?php 
           
            for($i = 1; $i < count($pedidos); $i++){

         ?>
         <form class="bg-white p-6 mb-4 rounded-lg shadow-md">
             <div class="flex items-center">
                 <div class="w-40">
                     <img src="<?php echo INCLUDE_PATH_STATIC ?>img/produtos/<?php echo $pedidos['produto']['path']?>" alt="" class="object-cover rounded-lg" loading="lazy" />
                 </div>
                 <div class="ml-4 flex flex-col">
                     <div class="flex items-center">
                         <h4 class="text-2xl leading-none text-slate-900">
                             Entregue dia 10/10
                         </h4>
                         <div class="ml-2 text-xs font-medium uppercase text-slate-500 ml-auto">
                             <?php echo 'Quantidade: ' . $pedidos['pedido']['quantidade'];
                             ?> 
                         </div>
                     </div>
                     <div class="text-lg font-medium text-slate-700">
                         <?php  echo 'Total: ' . $pedidos['pedido']['preco'];
                         ?> 
                     </div>
                     <div class="space-x-1 flex text-sm font-medium">
                         <p class="text-sm text-slate-900">
                             <?php echo $pedidos['produto']['descricao'] 
                             ?> Samsung tal modelo 2900 Samsung tal modelo 2900 Samsung tal modelo 2900 Samsung tal modelo 2900 Samsung tal modelo 2900
                         </p>
                     </div>
                     <div class="flex space-x-4 mb-5 text-sm font-medium">
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