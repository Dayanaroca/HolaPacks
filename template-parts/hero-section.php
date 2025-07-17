<section class="relative w-full h-[80vh]">
  <!-- Slider Container -->
  <div class="swiper hero-slider h-full">
    <div class="swiper-wrapper">
      <!-- Slide 1 (Imagen original) -->
      <div class="swiper-slide">
        <div class="relative w-full h-full bg-cover bg-center" style="background-image: url('<?php echo get_theme_file_uri('/assets/image/fondo-hero.jpg'); ?>');">
          <div class="grid grid-cols-1 md:grid-cols-5 h-full items-end md:items-center">
            <div class="relative h-full md:col-span-2 overflow-hidden">
              <img
                src="<?php echo get_theme_file_uri('/assets/image/persona-izquierda.png'); ?>"
                alt="Persona"
                class="absolute bottom-0 left-0 h-full max-h-[80vh] object-contain z-10"
              />
            </div>
            <div class="relative z-20 md:col-span-3 flex flex-col items-center justify-center text-primary text-center font-montserrat px-4 md:px-12">
              <h1 class="text-[40px] sm:text-[60px] leading-[60px] font-black uppercase drop-shadow-[0_0_2px_rgba(0,0,0,0.25)]">
                ¡Envía paquetes<br />a Cuba de manera<br />fácil y segura!
              </h1>
              <h2 class="mt-6 text-[24px] sm:text-[32px] leading-[40px] font-normal drop-shadow-[0_0_2px_rgba(0,0,0,0.25)]">
                Con opciones de envío aéreo y marítimo,<br />siempre en su puerta.
              </h2>
              <a href="#formulario-envio" class="inline-block mt-8 px-6 py-3 bg-primary text-white font-bold text-[16px] leading-[13px] rounded">
                Envía ahora
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Slide 2  -->
      <div class="swiper-slide">
        <div class="relative w-full h-full bg-cover bg-center" style="background-image: url('<?php echo get_theme_file_uri('/assets/image/fondo-hero.jpg'); ?>');">
          <div class="grid grid-cols-1 md:grid-cols-5 h-full items-end md:items-center">
            <!-- Columna izquierda vacía -->
            <div class="md:col-span-2"></div>
            
            <!-- Columna derecha con texto -->
            <div class="relative z-20 md:col-span-3 flex flex-col items-center justify-center text-center font-montserrat px-4 md:px-12">
              <h1 class="text-white text-[40px] sm:text-[60px] leading-[60px] font-black uppercase drop-shadow-[0_0_2px_rgba(0,0,0,0.25)]">
                OFERTA Recarga<br />Internacional<br />Cubacel<br />Datos ilimitados<br />desde 500 CUP
              </h1>
              <h2 class="text-secondary mt-6 text-[24px] sm:text-[32px] leading-[40px] font-normal drop-shadow-[0_0_2px_rgba(0,0,0,0.25)]">
                Hasta (fecha de culminación)
              </h2>
              <a href="#ofertas" class="inline-block mt-8 px-6 py-3 bg-secondary text-white font-bold text-[16px] leading-[13px] rounded">
                Contacta para Recargar Ahora
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Paginación (puntos) -->
    <div class="swiper-pagination !bottom-8"></div>
  </div>
</section>