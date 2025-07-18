<section aria-label="Formulario de contacto" class="w-full rounded-lg shadow-custom text-left xl:max-w-[70%] 2xl:max-w-[80%] mx-auto p-8 bg-white">
  <div class="px-2.5">
    <h2 class="font-black text-2xl sm:text-3xl">
      ¡Envía paquetes a Cuba de manera fácil y segura!
    </h2>
    <p class="text-base xl:max-w-[90%] pt-2 pb-8">
      Proporciona tu información en el siguiente formulario y nos pondremos en contacto lo antes posible.
    </p>

    <form id="contactForm" class="grid grid-cols-1 sm:grid-cols-2 gap-6">
      <!-- Nombre -->
      <div>
        <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
        <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required
          class="mt-1 block w-full border border-gray-300 rounded-md p-2.5 focus:ring-primary focus:border-primary" />
      </div>

      <!-- Apellidos -->
      <div>
        <label for="apellidos" class="block text-sm font-medium text-gray-700">Apellidos</label>
        <input type="text" id="apellidos" name="apellidos" placeholder="Ingresa tus apellidos" required
          class="mt-1 block w-full border border-gray-300 rounded-md p-2.5 focus:ring-primary focus:border-primary" />
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
        <input type="email" id="email" name="email" placeholder="ejemplo@correo.com" required
          class="mt-1 block w-full border border-gray-300 rounded-md p-2.5 focus:ring-primary focus:border-primary" />
      </div>

      <!-- Teléfono con prefijo -->
      <div>
        <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono</label>
          <input type="tel" id="telefono" name="telefono" placeholder="123456789"
            class="mt-1 block w-full border border-gray-300 rounded-md p-2.5 focus:ring-primary focus:border-primary" />
      </div>

      <!-- Comentarios (ocupa ambas columnas) -->
      <div class="sm:col-span-2">
        <label for="comentarios" class="block text-sm font-medium text-gray-700">Comentarios adicionales</label>
        <textarea id="comentarios" name="comentarios" placeholder="Escribe aquí tus comentarios..."
          class="mt-1 block w-full border border-gray-300 rounded-md p-2.5 focus:ring-primary focus:border-primary"
          rows="5"></textarea>
      </div>

      <!-- Aceptar privacidad + CTA -->
      <div class="sm:col-span-2 flex flex-col sm:flex-row items-start sm:items-center justify-between">
        <!-- Checkbox -->
        <div class="flex items-center space-x-2 mb-4 sm:mb-0">
          <input type="checkbox" id="privacidad" required class="accent-primary w-4 h-4" />
          <label for="privacidad" class="text-sm text-gray-700">
            He leído y acepto la <a href="/politica-de-privacidad" class="underline text-primary">política de privacidad</a>.
          </label>
        </div>

        <!-- Botón CTA -->
        <button type="submit"
          class="w-full sm:w-auto max-w-[14.25rem] text-center px-6 py-3 bg-primary text-white font-bold text-base leading-[1.2em] rounded">
          Enviar información
        </button>
      </div>
    </form>
  </div>
</section>
