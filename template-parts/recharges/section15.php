<?php
  global $drdev_assets;
  if (!is_array($drdev_assets)) {
    $drdev_assets = drdev_get_assets_data(); 
  }
?>
<section aria-label="Hero principal recargas" class=" w-full h-[60vh] lg:h-[75vh] overflow-hidden pb-12 lg:pb-16">  
    <div class="flex flex-col md:flex-row gap-0 items--stretch h-full">
        <div class="w-full sm:w-3/5 text-left flex flex-col justify-center gap-9 bg-primary p-11">
            <h1 class="text-2xl md:text-4xl font-black uppercase drop-shadow-[0_0_2px_rgba(0,0,0,0.25)] text-white">
              RECARGA A CUBA CON INTERNET ILIMITADO LAS 24H  
            </h1>
            <p class="drop-shadow-[0_0_2px_rgba(0,0,0,0.25)] text-white font-bold">
                Recarga 500, 750 o 900 CUP y en Cuba reciben el monto de dinero recargado de Saldo Principal + Internet ilimitado 24 horas.
            </p>
            <p class="drop-shadow-[0_0_2px_rgba(0,0,0,0.25)] text-white text-base">
                El Saldo Principal estará <strong class="text-white">vigentepor 330 días</strong> , el Bono de Internet Ilimitado estará vigente por <strong class="text-white">10, 20 o 30 días en correspondencia con el monto recargado</strong>. La oferta es válida hasta el 10 de julio de 2025 a las 11:59 pm (hora de Cuba).
            </p>
            <a href="https://wa.me/<?php echo esc_attr($drdev_assets['whatsapp_clean']); ?>" class="inline-block px-6 py-3 bg-secondary text-white font-bold text-base leading-[1.2em] rounded w-auto max-w-max">
                Contacta para Recargar Ahora
            </a>
        </div>
        <div class="w-full sm:w-2/5 bg-cover bg-center hero-recharges-bg flex items-center justify-end h-full min-h-[300px] relative" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="286" height="417" viewBox="0 0 286 417" fill="none">
                <path d="M283.996 1.01895L306.731 0.320145C305.315 46.6101 294.178 93.877 272.677 144.81C255.211 186.192 230.985 229.529 198.617 277.301C196.098 281.018 193.534 284.756 190.913 288.508C244.496 296.212 294.27 326.776 325.788 371.856L306.688 384.886C276.414 341.588 227.566 313.25 176.022 309.077C145.113 350.126 107.011 389.782 56.6398 411.054C35.7065 419.894 17.9114 418.791 7.81869 408.034C-6.28531 393.004 2.88549 370.312 15.0239 355.446C33.9609 332.25 59.6479 313.603 89.3003 301.519C113.806 291.533 139.886 286.452 165.492 286.608C170.446 279.742 175.208 272.873 179.807 266.091C248.463 164.779 281.564 80.5472 283.996 1.01895ZM148.383 309.191C103.417 313.096 59.9451 334.833 32.5637 368.372C25.717 376.754 20.7766 388.156 25.104 392.763C29.1694 397.097 40.3215 394.535 48.6346 391.028C89.0582 373.964 121.399 342.889 148.388 309.188L148.383 309.191Z" fill="#F7B11D"/>
            </svg>
        </div>
    </div>
</section>