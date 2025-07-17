<section
  class="relative w-full h-[80vh] bg-cover bg-center"
  style="background-image: url('<?php echo get_theme_file_uri('/assets/image/fondo-hero.jpg'); ?>');"
>
  <div class="grid grid-cols-1 md:grid-cols-5 h-full items-end md:items-center">

    <!-- Columna izquierda: Persona (sin padding, pegada a la izquierda y abajo) -->
    <div class="relative h-full md:col-span-2 overflow-hidden">
      <img
        src="<?php echo get_theme_file_uri('/assets/image/persona-izquierda.png'); ?>"
        alt="Persona"
        class="absolute bottom-0 left-0 h-full max-h-[80vh] object-contain z-10"
      />
    </div>

    <!-- Columna derecha: Texto -->
    <div class="relative z-20 md:col-span-3 flex flex-col items-center justify-center text-[#0D6A68] text-left font-montserrat px-4 md:px-12">
      <h1 class="text-[40px] sm:text-[60px] leading-[60px] font-black uppercase drop-shadow-[0_0_2px_rgba(0,0,0,0.25)]">
        ¡Envía paquetes<br />
        a Cuba de manera<br />
        fácil y segura!
      </h1>

      <h2 class="mt-6 text-[24px] sm:text-[32px] leading-[40px] font-normal drop-shadow-[0_0_2px_rgba(0,0,0,0.25)]">
        Con opciones de envío aéreo y marítimo,<br />
        siempre en su puerta.
      </h2>

      <a
        href="#formulario-envio"
        class="inline-block mt-8 px-6 py-3 bg-[#0D6A68] text-white font-bold text-[16px] leading-[13px] rounded"
      >
        Envía ahora
      </a>
    </div>
  </div>
</section>