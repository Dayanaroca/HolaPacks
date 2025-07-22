<section class="w-full bg-white py-12">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col md:flex-row gap-8 md:gap-[2.125rem] mb-8">
      <!-- Columna izquierda - Foto grande (60% del ancho) -->
      <div class="md:w-[60%]">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/aboutUs/our-history-image1.jpg" 
             alt="Historia de nuestra empresa" 
             class="w-full h-full max-h-[700px] object-cover rounded-lg"
             loading="lazy"
             width="600"
             height="700">
      </div>
      
      <!-- Columna derecha - Dos fotos verticales (40% del ancho) -->
      <div class="md:w-[40%] flex flex-col gap-[2.125rem]">
        <!-- Imagen superior más pequeña (30% del alto total) -->
        <div class="h-[30%]">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/aboutUs/our-history-image1.jpg" 
               alt="Fundación de la compañía" 
               class="w-full h-full object-cover rounded-lg"
               loading="lazy"
               width="400"
               height="210">
        </div>
        <!-- Imagen inferior más grande (70% del alto total) -->
        <div class="h-[70%]">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/aboutUs/our-history-image1.jpg" 
               alt="Crecimiento de nuestra organización" 
               class="w-full h-full object-cover rounded-lg"
               loading="lazy"
               width="400"
               height="490">
        </div>
      </div>
    </div>
    
    <!-- Texto centrado debajo -->
    <div class="text-center max-w-3xl mx-auto mt-12">
      <h2 class="text-3xl font-bold mb-4">Nuestra Historia</h2>
      <p class="text-lg">Desde nuestros humildes comienzos hasta convertirnos en líderes del sector, cada paso ha sido una lección de perseverancia y dedicación al servicio.</p>
    </div>
  </div>
</section>