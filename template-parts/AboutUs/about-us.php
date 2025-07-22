<?php
  global $drdev_assets;
  if (!is_array($drdev_assets)) {
    $drdev_assets = drdev_get_assets_data(); 
  }
?>
<section aria-label="Información sobre Hola Packs - Agencia de paquetería entre Estados Unidos y Cuba" class="w-full">
  <!-- Contenedor principal full-width -->
  <div class="flex flex-col lg:flex-row items-stretch w-full">
    
    <!-- Columna izquierda con SVG - Decoración -->
    <div class="w-[55%] lg:w-[18%] flex items-center justify-start lg:justify-end" aria-hidden="true">
      <img src="<?php echo esc_url($drdev_assets['yellow-ribbon-left']); ?>" 
           alt="" 
           class="hidden lg:block h-full max-h-[600px] w-auto object-contain"
           loading="lazy"
           width="120" 
           height="600">
      <img src="<?php echo esc_url($drdev_assets['yellow-ribbon-left-mobile']); ?>" 
           alt="" 
           class="block lg:hidden h-full max-h-[600px] w-auto object-contain mb-6"
           loading="lazy"
           width="120" 
           height="600">
    </div>
   
    <!-- Columna central con contenido principal -->
    <div class="flex-1 py-0 md:py-12 flex items-center justify-center bg-white max-w-screen-lg">
      <div class="w-full lg:w-[80%] mx-auto px-4">
        <h2 class="sr-only">Nuestro servicio de paquetería a Cuba</h2>
        <p class="text-center">
          <strong class="text-primary">Somos una agencia de paquetería diseñada para facilitar los envíos desde Estados Unidos a Cuba</strong> con un servicio confiable, eficiente y accesible. <strong class="text-primary">Nuestra misión es ofrecer una experiencia de envío práctica y transparente</strong>, asegurando que tus paquetes lleguen directamente a las manos de tus seres queridos en Cuba. <strong class="text-primary">Nos enfocamos en hacer que cada envío sea sencillo y significativo, como un saludo a los tuyos</strong>.
        </p>
      </div>
    </div>

    <!-- Columna derecha con SVG - Decoración -->
    <div class="lg:w-[18%] flex items-center justify-end lg:justify-start" aria-hidden="true">
      <img src="<?php echo esc_url($drdev_assets['yellow-ribbon-right']); ?>" 
           alt="" 
           class="hidden lg:block h-full max-h-[600px] w-auto object-contain"
           loading="lazy"
           width="120" 
           height="600">
      <img src="<?php echo esc_url($drdev_assets['yellow-ribbon-right-mobile']); ?>" 
           alt="" 
           class="block lg:hidden h-full max-h-[600px] w-auto object-contain"
           loading="lazy"
           width="120" 
           height="600">
    </div>

  </div>
</section>