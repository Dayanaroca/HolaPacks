<?php
  global $drdev_assets;
  if (!is_array($drdev_assets)) {
    $drdev_assets = drdev_get_assets_data(); 
  }
?>
<section aria-label="Hero principal recargas" class="w-full overflow-hidden pb-12 lg:pb-16">
  <div class="flex flex-col md:flex-row items-stretch h-full min-h-full lg:min-h-[85vh] 2xl:min-h-[65vh]">
    
    <!-- Columna izquierda -->
    <div class="flex-1 text-left flex flex-col justify-center gap-9 bg-primary p-8 md:p-11">
      <h1 class="text-2xl md:text-4xl font-black uppercase drop-shadow text-white">
        <?php echo esc_html(get_post_meta(get_the_ID(), 'hero_titulo', true)); ?>
      </h1>
      <p class="drop-shadow text-white font-bold">
        <?php echo esc_html(get_post_meta(get_the_ID(), 'hero_intro', true)); ?>
      </p>
      <p class="drop-shadow text-white text-base">
        <?php echo wp_kses_post( get_post_meta(get_the_ID(), 'hero_detalles', true) ); ?>
      </p>
      <a href="https://wa.me/<?php echo esc_attr($drdev_assets['whatsapp_clean']); ?>" class="inline-block px-6 py-3 bg-secondary text-white font-bold text-base leading-[1.2em] rounded w-auto max-w-max">
        Contacta para Recargar Ahora
      </a>
    </div>

    <!-- Columna derecha -->
    <div class="flex-1 relative flex items-center justify-end bg-cover bg-center hero-recharges-bg min-h-[500px]">
      <div class="absolute inset-0 flex items-center justify-end  pointer-events-none" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="286" height="417" viewBox="0 0 286 417" fill="none">
                <path d="M283.996 1.01895L306.731 0.320145C305.315 46.6101 294.178 93.877 272.677 144.81C255.211 186.192 230.985 229.529 198.617 277.301C196.098 281.018 193.534 284.756 190.913 288.508C244.496 296.212 294.27 326.776 325.788 371.856L306.688 384.886C276.414 341.588 227.566 313.25 176.022 309.077C145.113 350.126 107.011 389.782 56.6398 411.054C35.7065 419.894 17.9114 418.791 7.81869 408.034C-6.28531 393.004 2.88549 370.312 15.0239 355.446C33.9609 332.25 59.6479 313.603 89.3003 301.519C113.806 291.533 139.886 286.452 165.492 286.608C170.446 279.742 175.208 272.873 179.807 266.091C248.463 164.779 281.564 80.5472 283.996 1.01895ZM148.383 309.191C103.417 313.096 59.9451 334.833 32.5637 368.372C25.717 376.754 20.7766 388.156 25.104 392.763C29.1694 397.097 40.3215 394.535 48.6346 391.028C89.0582 373.964 121.399 342.889 148.388 309.188L148.383 309.191Z" fill="#F7B11D"/>
            </svg>
      </div>
    </div>
  </div>
</section>