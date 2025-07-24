<section aria-label="Precios Hola Packs" class="relative flex w-full mt-32 bg-secondary items-center justify-center mb-12 md:mb-16">
    <!-- SVG izquierda vertical centrado -->
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/green-ribbon.svg"
        alt=""
        class="hidden sm:block absolute left-0 -top-20 w-32 z-10 pointer-events-none" />

    <!-- SVG derecha, sobresaliendo arriba -->
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/green-ribbon-r.svg"
        alt=""
        class="block absolute right-0 -top-24 sm:-top-36 w-64 sm:w-96 h-auto z-10 pointer-events-none" />

  <div class="w-full xl:max-w-screen-lg mx-auto px-2.5 2xl:py-24 py-12 mb-2">
    <h2 class="text-primary w-4/5 uppercase mx-auto sm:w-full font-black text-2xl sm:text-4xl text-center pb-6">
      Todos Nuestros Precios Aquí
    </h2>
   <?php
        $servicios_query = new WP_Query([
        'post_type' => 'servicio',
        'posts_per_page' => -1,
        'order' => 'ASC',
        ]);

        $servicios = [];

        if ($servicios_query->have_posts()) :
        while ($servicios_query->have_posts()) :
            $servicios_query->the_post();
            $servicios[] = [
            'title' => get_the_title(),
            'precio' => get_post_meta(get_the_ID(), '_servicio_precio', true),
            'entrega' => get_post_meta(get_the_ID(), '_servicio_entrega', true),
            'detalles' => get_post_meta(get_the_ID(), '_servicio_detalles', true),
            ];
        endwhile;
        wp_reset_postdata();
        endif;
        ?>

        <?php if (!empty($servicios)) : ?>
        <!-- Tabla Desktop -->
        <table class="hidden lg:table w-full text-center">
        <thead class="bg-primary text-white text-normal text-bold text-base">
            <tr>
            <th class="px-4 py-2 rounded-tl-3xl rounded-bl-3xl">Servicio</th>
            <th class="px-4 py-2">Precio</th>
            <th class="px-4 py-2 whitespace-nowrap">Tiempo de Entrega</th>
            <th class="px-4 py-2 rounded-tr-3xl rounded-br-3xl whitespace-nowrap">Detalles Adicionales</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($servicios as $servicio) : ?>
            <tr class="h-16">
                <td class="border-b border-primary px-4 py-2 text-base text-black font-normal"><?php echo esc_html($servicio['title']); ?></td>
                <td class="border-b border-primary px-4 py-2 text-base text-black font-bold whitespace-nowrap"><?php echo esc_html($servicio['precio']); ?></td>
                <td class="border-b border-primary px-4 py-2 text-base text-black font-bold"><?php echo esc_html($servicio['entrega']); ?></td>
                <td class="border-b border-primary px-20 py-2 text-base text-black font-normal"><?php echo esc_html($servicio['detalles']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        </table>

        <!-- Mobile/Tablet -->
        <div class="block lg:hidden space-y-4">
            <span class="flex h-[37px] justify-center items-center gap-[62px] self-stretch w-full rounded-[20px] bg-primary text-white text-base font-black">
                Servicio
            </span>
        <?php foreach ($servicios as $servicio) : ?>
            <div class="border-b-2 border-primary p-4">
            <button onclick="toggleServicio(this)" class="flex justify-between items-center w-full text-left">
                <span class="font-normal text-lg"><?php echo esc_html($servicio['title']); ?></span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none" class="transition-transform duration-300">
                <mask id="mask0" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="25">
                    <rect y="0.50293" width="24" height="24" fill="#D9D9D9"/>
                </mask>
                <g mask="url(#mask0)">
                    <path d="M12 15.5029L7 10.5029H17L12 15.5029Z" fill="#0D6A68"/>
                </g>
                </svg>
            </button>
            <div class="toggle-content mt-3 hidden space-y-2 text-sm text-black">
                <p><strong class="text-black">Precio: <?php echo esc_html($servicio['precio']); ?></strong></p>
                <p><strong class="text-black">Tiempo de Entrega: <?php echo esc_html($servicio['entrega']); ?></strong></p>
                <p><strong class="text-black">Detalles Adicionales:</strong> <?php echo esc_html($servicio['detalles']); ?></p>
            </div>
            </div>
        <?php endforeach; ?>
        </div>
        <?php endif; ?>
  </div>
</section>